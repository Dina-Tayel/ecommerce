<?php

namespace App\DataTables;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
                return $query->created_at ? with(new Carbon($query->creatd_at))->format('d/m/Y')  : '--';
            })
            ->editColumn('updated_at', function ($query) {
                return $query->updated_at ? with(new Carbon($query->updated_at))->format('d/m/Y') : '--';
            })

            ->editColumn('phone', function ($query) {
                return $query->phone ? $query->phone : 'Not Found';
            })

            ->editColumn('address', function ($query) {
                return $query->address ? $query->address : 'Not Found';
            })

            ->addColumn('product_title', function (User $user) {
                if ($user->role == 'vendor') {
                    return $user->whereHas('products') ?
                        $user->products->map(function ($product) {
                            return $product->title;
                        })->implode(',') :  '---';
                } else {
                    return '---';
                }
            })

            ->addColumn('status', function ($query) {
                if ($query->status == 'inactive') {
                    return '<a href="' . route('users.toggle', $query->id) . '" class="btn btn-outline-info btn-sm text-center"><i class="ri-toggle-fill"></i></a>';
                } elseif ($query->status == 'active') {
                    return '<a href="' . route('users.toggle', $query->id) . '" class="btn btn-outline-info btn-sm text-center"><i class="ri-toggle-line"></i></a>';
                }
            })

            ->addColumn('action', 'backend.users.actions')
            ->rawColumns(['action', 'product_title', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $users = $model->where('id', '<>', auth()->id())->with(['products']);
        return $users->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
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
            Column::make('fullname'),
            // Column::make('username'),
            Column::make('email'),
            // Column::make('phone'),
            // Column::make('address'),
            Column::make('role'),
            Column::make('status'),
            Column::computed('product_title')
                ->title('pro-product_title'),
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
    protected function filename(): String
    {
        return 'User_' . date('YmdHis');
    }
}
