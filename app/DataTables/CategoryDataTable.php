<?php

namespace App\DataTables;

use App\Models\Category;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
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
            ->addColumn('img', function ($query) {
                if ($query->img) {
                    return '<img src=" ' . asset('uploads/categories/' . $query->img) . ' " width="50px" >';
                } else {

                    return '<p class="text-center">--- </p>';
                }
            })
            ->addColumn('is_parent', function ($query) {
                if ($query->is_parent == true) {
                    return '<span class="badge rounded-pill badge-soft-secondary">Yes</span>';
                } elseif ($query->is_parent == false) {
                    return '<span class="badge rounded-pill badge-soft-warning">No</span>';
                }
            })
            ->addColumn('parents', function($query){
                $parent= Category::where('id', $query->parent_id)->value('title');
                return $parent ? "<p> $parent</p>"  : '---';
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 'inactive') {
                    return '<a href="' . route('categories.toggle', $query->id) . '" class="btn btn-outline-info btn-sm text-center"><i class="ri-toggle-fill"></i></a>';
                } elseif ($query->status == 'active') {
                    return '<a href="' . route('categories.toggle', $query->id) . '" class="btn btn-outline-info btn-sm text-center"><i class="ri-toggle-line"></i></a>';
                }
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at ? with(new Carbon($query->created_at))->format('y-m-d') : '';
            })
            ->editColumn('updated_at', function ($query) {
                return $query->updated_at ? (new Carbon($query->updated_at))->format('y-m-d') : '';
            })
            ->addColumn('action', 'backend.categories.actions')
            ->rawColumns(['action', 'img', 'status', 'is_parent','parents']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
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
            ->setTableId('category-table')
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
                ->exportable(false)
                ->printable(false)
                ->title('image')
                ->width(60),

            Column::make([
                'name' => 'status',
                'data' => 'status',
                'title' => 'Status',
            ]),
            Column::computed('is_parent')
                ->title('Parent')
                ->exportable(false)
                ->printable(false),

            Column::computed('parents')
            ->title('Parents'),

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
        return 'Banner_' . date('YmdHis');
    }
}
