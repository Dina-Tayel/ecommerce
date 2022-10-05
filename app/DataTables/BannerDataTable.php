<?php

namespace App\DataTables;

use URL;
use Carbon\Carbon;
use App\Models\Banner;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class BannerDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', 'backend.banners.actions')
            ->addColumn('img', function ($query) {
                return '<img src=" ' . asset("uploads/banners/$query->img") . ' " width="50px">';
            })
            ->addColumn('conditions' , function($query) {
                return $query->conditions  == 'banner' ? '<span class="badge bg-primary">banner</span>' : '<span class="badge bg-success">promte</span>';
            })

            ->addColumn('active', function($query) {
                // return '<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked />';
                 if($query->status == 'inactive'){
                     return'<a href="'.route('banners.toggle',$query->id).'" class="btn btn-outline-info btn-sm"><i class="ri-toggle-fill"></i></a>' ;
                }elseif($query->status == 'active')
                {
                    return'<a href="'.route('banners.toggle',$query->id).'" class="btn btn-outline-info btn-sm"><i class="ri-toggle-line"></i></a>' ;
                }
                
                //  '<input type="checkbox" checked data-toggle="toggle" data-on="'. $query->status .' == "active" ? "active" : "" " data-off="'. $query->status .' == "inactive" ? "inactive" : "" " data-onstyle="success" data-offstyle="danger">' ;
            })
            ->editColumn('created_at', function ($user) {

                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';;
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
            })
            // ->editColumn('title', '{!! str_limit($title, 60) !!}')
            // ->setRowClass(function ($query) {
            //     return $query->conditions  == 'banner' ? 'bage bg-primary' : 'alert-warning';
            // })

            ->rawColumns(['action', 'img', 'conditions' , 'active','checkbox']);
            
    }


    public function query(Banner $model): QueryBuilder
    {
        return $model->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('banner-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0,'asc')
            // ->buttons(
            //     Button::make('create'),
            //     Button::make('export'),
            //     Button::make('print'),
            //     Button::make('reset'),
            //     Button::make('reload')
            // );
            ->parameters([
                'dom'          => 'Blfrtip',
                'buttons'      => [
                    [
                        'text'      => '<i class="fa fa-plus"> </i> Add New  ',
                        'className' => 'btn btn-info',
                        'action'    => "function(){
                                    window.location.href = '" . URL::current() . "/create ';
                                }",

                        // 'action' => "function(){
                        //             window.location.href=' " . URL::current() . "/create    ' ;
                        //         }"
                    ],

                    ['extend' => 'reload', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-retweet"> </li> Reload'],
                    ['extend' => 'excel', 'className' => 'btn brn-success', 'text' => 'Export in Excel'],

                ],
            ]);
    }


    protected function getColumns(): array
    {
        return [

            Column::make([
                'name'              => 'id',
                'data'              => 'id',
                'title'             => '#',
            ]),
            Column::make([

                'name'              => 'title',
                'data'              => 'title',
                'title'             => 'title',

            ]),
            Column::make([
                'name' => 'img',
                'data' => 'img',
                'title' => 'image',
            ]),
            Column::make([
                'name'=>'conditions',
                'data'=>'conditions',
                'title'=>'Condition',
                
            ]),
            Column::make([
                'name'=>'active',
                'data'=>'active',
                'title'=>'Status',
                
                
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


    protected function filename(): string
    {
        return 'Banner_' . date('YmdHis');
    }
}
