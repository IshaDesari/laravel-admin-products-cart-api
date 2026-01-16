@extends('admin.main')

@section('head')
@endsection

@section('main-container')
    <div class="body d-flex pb-3">
        <div class="container-fluid container-xxl=">
            <div class="row clearfix g-3">

                <div class="col-xl-12 col-lg-12 col-md-12 flex-column">
                    <div class="row g-3">
                        <div class="col-md-12 p-0=">

                            @include('admin.messages')

                            <div class="card">
                                <div
                                    class="card-header py-2 d-flex align-items-center justify-content-between bg-transparent border-bottom flex-wrap">
                                    <h5 class="mb-0 fw-bold">Admin Dashboard</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div><!-- Row End -->
        </div>
    </div>
@endsection

