<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\Shipping;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippingDataTable extends DataTable
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
            ->addColumn('action', 'backend.shipping.actions')
            ->addColumn('status', function($query) {
                 if($query->status == 'inactive'){
                     return'<a href="'.route('shipping.toggle',$query->id).'" class="btn btn-outline-info btn-sm"><i class="ri-toggle-fill"></i></a>' ;
                }elseif($query->status == 'active')
                {
                    return'<a href="'.route('shipping.toggle',$query->id).'" class="btn btn-outline-info btn-sm"><i class="ri-toggle-line"></i></a>' ;
                }
            
            })
            ->editColumn('created_at', function ($query) {

                return $query->created_at ? with(new Carbon($query->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($query) {
                return $query->updated_at ? with(new Carbon($query->updated_at))->format('m/d/Y') : '';;
            })
            ->editColumn('shipping_charge', function ($query) {

                return  '$ ' . $query->shipping_charge;
            })
            ->rawColumns(['status','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Shipping $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Shipping $model)
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
                    ->setTableId('shipping-table')
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
            Column::make('shipping_address'),
            Column::make('shipping_charge'),
            Column::make('shipping_time'),
            Column::computed('status')
            ->exportable(false)
            ->printable(false),
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
        return 'Shipping_' . date('YmdHis');
    }
}
