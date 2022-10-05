<?php

namespace App\DataTables;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($query) {
                return $query->created_at ? with(new Carbon($query->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($query) {
                return $query->updated_at ? with(new Carbon($query->updated_at))->format('d/m/Y') : '';
            })
            //  ->editColumn('price' , function($query){
            //     return  '$' . number_format($query->price, 2);
            //  })
            //  ->editColumn('offer_price' , function($query){
            //     return number_format($query->offer_price, 2) . '%';
            //  })
            // ->editColumn('category', function ($query, Category $category) {
            //     return $query->category_id ? with($category->where('id', $query->category_id)->select('title')->value('title')) : '--';
            // })
            ->addColumn('category', function ($query, Category $category) {
                return $query->category_id ? with($category->where('id', $query->category_id)->select('title')->value('title')) : '--';
            })
            // ->addColumn('category' , function(Product $product){
            //     return  $product->category->title  ?  $product->category->title  : '--';
            // })
            ->addColumn('fullname', function ($product) {
                return $product->vendor->fullname ? $product->vendor->fullname : '';
            })
            
            ->editColumn('child', function ($query, Category $category) {
                return $query->child_cat_id ? with($category->where('id', $query->child_cat_id)->select('title')->value('title')) : '--';
            })

            ->addColumn('status', function ($query) {
                if ($query->status == 'inactive') {
                    return '<a href="' . route('products.toggle', $query->id) . '" class="btn btn-outline-info btn-sm text-center"> <i class="ri-toggle-fill"></i> </a>';
                } else {
                    return '<a href="' . route('products.toggle', $query->id) . '" class="btn btn-outline-info btn-sm text-center"> <i class="ri-toggle-line"></i> </a>';
                }
            })
            ->addColumn('condition', function ($query) {
                if ($query->condition == 'new') {
                    return '<span class="badge bg-info">new</span>';
                } elseif ($query->condition  == 'winter') {
                    return '<span class="badge bg-success">winter</span>';
                } else {
                    return '<span class="badge bg-warning">popular</span>';
                }
            })
            ->addColumn('action', 'backend.products.actions')
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
            })
            ->rawColumns(['action', 'category', 'status', 'condition','fullname']);
    }


    public function query(Product $model)
    {
        // $data = Product::select('*')->with(['brand','vendor','category','child_ctas']);
        // return $data->newQuery();
        return $model->newQuery()->with(['brand', 'vendor', 'category', 'child_ctas']);
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('product-table')
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


    protected function getColumns()
    {
        return [

            Column::make('id'),
            Column::make('title')
                ->addClass('text-center'),
            Column::computed('brand.title')
                ->title('brand'),
            Column::computed('fullname')
                ->title('vendor'),
            Column::computed('category')
                ->title('category'),
            Column::computed('child')
                ->title('child'),
            // Column::computed('category.title')
            // ->title('category'),
            // Column::computed('child_ctas.title')
            // ->title('child'),
            Column::make('status'),
            Column::make('condition'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }


    protected function filename(): String
    {
        return 'Product_' . date('YmdHis');
    }
}
