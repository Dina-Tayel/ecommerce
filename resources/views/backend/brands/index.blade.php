@extends('backend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">All Brands</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">Brands Count is {{ App\Models\Brand::count()}} </p>
                    <div class="live-preview">
                        <div class="">
                            {!! $dataTable->table([
                                'class' => 'table dataTable  table-striped table-hover  table-bordered',
                            ]) !!}
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>
    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush
@endsection
