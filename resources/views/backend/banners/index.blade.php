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
                    <h4 class="card-title mb-0 flex-grow-1">All Banners</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">Banners Count is {{ App\Models\Banner::count()}}</p>
                    <div class="live-preview">
                        <div class="">
                            {{-- <input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger"> --}}
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
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"> --}}
        {{-- <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
        <script src="/vendor/datatables/buttons.server-side.js"></script> --}}
        {!! $dataTable->scripts() !!}
        
    @endpush

@endsection

@push('scripts')
<!-- bootstrap toogle-->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
    "fnDrawCallback": function() {
            $('#toggle-demo').bootstrapToggle();
        },
</script>

@endpush