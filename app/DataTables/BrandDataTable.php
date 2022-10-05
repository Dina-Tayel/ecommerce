<?php

namespace App\DataTables;

use App\Models\Brand;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('img', function ($query) {
                return ' <img src=" ' .   asset('uploads/brands/' . $query->img)  . '" width="50px"> ';
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 'inactive') {
                    return '<a href="' . route('brands.toggle', $query->id) . '" class="btn btn-outline-info btn-sm text-center"> <i class="ri-toggle-fill"></i> </a>';
                } else {
                    return '<a href="' . route('brands.toggle', $query->id) . '" class="btn btn-outline-info btn-sm text-center"> <i class="ri-toggle-line"></i> </a>';
                }
            })
            ->addColumn('action', 'backend.brands.actions')
            ->editColumn('created_at', function($query){
               return $query->created_at ? with(new Carbon($query->created_at))->format('d/m/y') : '';
            })
            ->editColumn('updated_at' , function($query){
               return $query->updated_at ? with(new Carbon($query->updated_at))->format('d/m/y') : '' ;
            })
            ->rawColumns(['img', 'action', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Brand $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Brand $model)
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
            ->setTableId('brand-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0,'asc')
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
            Column::make('title'),
            Column::computed('img')
                ->title('photo')
                ->exportable(false)
                ->printable(false),
            Column::make([
                'name' => 'status',
                'data' => 'status',
                'title' => 'Status',
            ]),
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
        return 'Brand_' . date('YmdHis');
    }
}
