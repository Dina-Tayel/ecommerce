<?php

namespace App\DataTables;

use App\Models\Order;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
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

            ->editColumn('total_amount', function ($q) {
                return number_format($q->total_amount, 2);
            })
            ->editColumn('created_at', function ($q) {
                return $q->created_at ? Carbon::parse($q->created_at)->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($q) {
                return $q->updated_at ? Carbon::parse($q->updated_at)->format('d/m/Y') : '';
            })
            ->addColumn('name', function ($q) {
                return $q->first_name . $q->last_name;
            })
            ->addColumn('payment_method', function ($q) {
                return $q->payment_method  == 'cod' ? '<span class="badge bg-primary">cash on delivery</span>' : '<span class="badge bg-success">"' . $q->patment_method . '"</span>';
            })
            ->addColumn('status', function ($query) {
                if ($query->condition  == 'pending') {
                    return '<span class="badge bg-info">pending</span>';
                } elseif ($query->condition  == 'processing') {
                    return '<span class="badge bg-primary">processing</span>';
                } elseif ($query->condition  == 'delivered') {
                    return '<span class="badge bg-success">delivered</span>';
                } else {
                    return '<span class="badge bg-danger">cancelled</span>';
                }
            })
            ->addColumn('user' , function($q) {
                return $q->user->fullname ;
            })
            ->addColumn('action', 'backend.orders.actions')
            ->rawColumns(['action', 'name', 'payment_method', 'status' ,'user']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return Order::with('user')->newQuery();
        // return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('order-table')
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
            Column::make('user'),
            Column::make('name'),
            Column::make('email'),
            Column::make('payment_method'),
            Column::make('payment_status'),
            Column::make('total_amount')->title('total'),
            Column::make('status'),
            Column::make('created_at'),
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
    protected function filename(): String
    {
        return 'Order_' . date('YmdHis');
    }
}
