<?php

namespace App\DataTables;

use App\Models\Banner;
use App\Repositories\Contracts\BannerRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BannerDataTable extends DataTable
{
    protected $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item){
                return view('admins.banner.action',compact('item'));
            })
            ->editColumn('created_at',function ($item){
                return Carbon::parse($item->created_at)->format('d/m/Y');
            })
            ->editColumn('updated_at',function ($item){
                return Carbon::parse($item->updated_at)->format('d/m/Y');
            })
            ->addColumn('image_path', function ($item) {
                return '<img src="' . asset($item->image_path) . '" alt="' . $item->alt_text . '" width="50px">';

            })
            ->addColumn('active',function ($item){
                $checked = $item->is_active ? 'checked' : '';
                return view('admins.banner.change-status',compact('item','checked'));
            })
            ->rawColumns(['image_path','is_active'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Request $request): QueryBuilder
    {
        return $this->bannerRepository->queryList($request->all());
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('banner-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'drawCallback' => "function (settings,data) {
                            $('.change-status-banner').bootstrapSwitch('state', $(this).prop('checked'));
                        }",
                    ])
                    //->dom('Bfrtip')
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
            Column::make('order'),
            Column::make('alt_text'),
            Column::make('image_path')
            ->width(200),
            Column::make('active'),
            Column::make('created_at'),
            Column::make('updated_at'),
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
        return 'Banner_' . date('YmdHis');
    }
}
