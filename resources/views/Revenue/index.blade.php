@extends("layouts.app")


@section("content")


    <div class="row ">
        <div class="col-xl-3 col-lg-6 ">
            <div class="card l-bg-orange-dark " style="border-radius: 10px">
                <div class="card-statistic-3 p-4 " style=" background: linear-gradient(to right, #a86008, #ffba56) !important; color: #fff;  border-radius: 10px; border: none; background-color: #fff">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Revenue</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                $11.61k
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>2.5% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection