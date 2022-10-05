@extends('backend.layouts.master')
@section('styles')
<!-- bootstrap toogle-->
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">All Users</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">Banners Count is </p>
                    <div class="live-preview">
                        <div class="">
                       
                            {{ $dataTable->table([
                                'class' => 'table dataTable  table-striped table-hover  table-bordered'
                            ])}}
                        
                        </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    </div>
    @push('scripts')

        {!! $dataTable->scripts() !!}
        <script>
            $(document).ready(function () {
        $('#example').DataTable({
            order: [[0, 'asc']],
        });
    });
        </script>
    @endpush

@endsection

@push('scripts')

@endpush
