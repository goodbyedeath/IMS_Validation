@extends('admin.layout.master')

    @section('main_content')

       
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Dashboard</h1>
                </div>
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="bi-building" style="font-size: 2rem; color: white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Registered Companies</h4>
                                </div>
                                <div class="card-body">
                                    {{ $allCompaniesCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="bi-building-check" style="font-size: 2rem; color: white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Certificate Active</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalCompaniesLast3Years }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="bi-building-fill-slash" style="font-size: 2rem; color: white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Certificate Expired</h4>
                                </div>
                                <div class="card-body">
                                    {{ $olderCompaniesCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endsection
