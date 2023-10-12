<?php

namespace App\DataTables;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use function Sodium\add;

class ProductDataTable extends DataTable
{
    protected $productRepository;


    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item) {
                return view('admins.product.action', compact('item'));
            })
            ->editColumn('category_id', function ($product) {
                return $product->getCategoryName();
            })
            ->editColumn('parent_id', function ($product) {
                return $product->parent_name;
            })
            ->editColumn('is_active', function ($item) {
                $checked = $item->is_active ? 'checked' : '';
                return view('admins.product.change-status', compact('item', 'checked'));
            })
            ->editColumn('description',function ($item){
                return strip_tags(Str::limit($item->description,100,'...'));
            })
            ->addColumn('attributes', function ($item) {
                $string = '';
                if (count($item->attributes)) {
                    foreach ($item->attributes as $attribute) {
                        $string .= '<span class="badge badge-warning">' . $attribute->name . '-' . $attribute->value . ', ' . '</span>';
                    }

                    if (!empty($string)) {
                        // Loại bỏ dấu phẩy và khoảng trắng cuối cùng
                        $string = rtrim($string, ', ');
                    }
                }

                // Hiển thị chuỗi HTML mà không escape
                return new HtmlString($string);
            })


            ->addColumn('discounts',function ($item){
                $string = '';
                if (count($item->discounts)) {
                    foreach ($item->discounts as $discount) {
                        $string = $string . $discount->coupon_code . ', ';
                    }
                    // Tìm vị trí của dấu phẩy cuối cùng trong chuỗi
                    $lastCommaPosition = strrpos($string, ', ');
                    // Kiểm tra nếu tìm thấy dấu phẩy cuối cùng
                    if ($lastCommaPosition !== false) {
                        // Cắt chuỗi từ đầu đến vị trí dấu phẩy cuối cùng bằng cách sử dụng substr
                        $string = substr($string, 0, $lastCommaPosition);
                    }
                }
                return $string;
            })


//            ->addColumn('expiration_date', function ($item) {
//                $expirationDates = $item->discounts->pluck('pivot.expiration_date');
//                $formattedDates = [];
//
//                foreach ($expirationDates as $date) {
//                    // Kiểm tra xem ngày có hợp lệ không trước khi định dạng
//                    if (Carbon::parse($date)->isValid()) {
//                        $formattedDates[] = Carbon::parse($date)->format('m/d/Y');
//                    }
//                }
//
//                return implode(', ', $formattedDates);
//            })


            ->rawColumns(['description', 'is_active'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Request $request): QueryBuilder
    {
        return $this->productRepository->queryList($request->all());
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->parameters([
                'drawCallback' => "function (settings,data) {
                    $('.change-status-product').bootstrapSwitch('state', $(this).prop('checked'));
                }",
            ])
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::computed('category_id', 'Category'),
            Column::computed('parent_id', 'Parent Product'),
            Column::make('name'),
            Column::make('price'),
            Column::make('quantity'),
            Column::make('quantity_in_stock'),
            Column::make('quantity_sold'),
            Column::make('description'),
            Column::make('attributes'),
            Column::make('discounts'),
            Column::make('is_active'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
