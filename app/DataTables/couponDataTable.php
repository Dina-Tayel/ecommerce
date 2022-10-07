<?php

namespace App\DataTables;

use App\Models\coupon;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class couponDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($query) {
                return $query->created_at ? with(new Carbon($query->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($query) {
                return $query->updated_at ? (new Carbon($query->updated_at))->format('d/m/Y') : '';
            })
            ->addColumn('status',function($query){
                return $query->status == 'active' ? 
                '<a href="'.route('coupon.toggle',$query->id).'" class="btn btn-outline-info btn-sm"><i class="ri-toggle-line"></i></a>':
                 '<a href="'.route('coupon.toggle',$query->id).'" class="btn btn-outline-info btn-sm"><i class="ri-toggle-fill"></i></a>'  ;
            })
            ->addColumn('action', 'backend.coupon.actions')
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\coupon $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(coupon $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('coupon-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
           
            Column::make('id'),
            Column::make('code'),
            Column::make('value'),
            Column::make('status'),
            Column::make('type'),
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
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() :String
    {
        return 'coupon_' . date('YmdHis');
    }
}
