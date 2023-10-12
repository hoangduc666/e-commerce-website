<?php

namespace App\DataTables;

use App\Models\Admin;
use App\Repositories\Contracts\AdminRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
{
    protected $adminRepository;
    protected $user;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->user = Auth::guard('admin')->user();
    }


    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $adminLogin = $this->user;
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item) {
                return view('admins.admin.action', compact('item'));
            })
            ->editColumn('is_active', function ($item) use ($adminLogin) {
                $checked = $item->is_active ? 'checked' : '';
                return view('admins.admin.change-status', compact('item', 'adminLogin', 'checked'));
            })
            ->editColumn('created_at',function ($item){
                return Carbon::parse($item->created_at)->format('d/m/Y');
            })
            ->editColumn('updated_at',function ($item){
                return Carbon::parse($item->updated_at)->format('d/m/Y')
;            })
            ->rawColumns(['action', 'is_active'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Request $request): QueryBuilder
    {
        return $this->adminRepository->queryList($request->all());
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('admin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'drawCallback' => "function (settings,data) {
                    $('.change-status-admin').bootstrapSwitch('state', $(this).prop('checked'));
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
            Column::make('id')->orderable(true),
            Column::make('name')->orderable(true),
            Column::make('email')->orderable(true),
            Column::make('created_at')->orderable(true),
            Column::make('updated_at')->orderable(true),
            Column::make('is_active')->orderable(true),
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
        return 'Admin_' . date('YmdHis');
    }
}
