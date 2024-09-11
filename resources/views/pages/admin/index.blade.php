@extends('pages.layouts.panel')
@section('title', 'Admin - Dashboard Panel')
@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert text-white bg-success m-b-lg" role="alert">
                            Data has been updated 5 sec ago.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="dashboard-info row">
                                    <div class="info-text col-md-6">
                                        <h5 class="card-title">Welcome back Anna!</h5>
                                        <p>Get familiar with dashboard, here are some ways to get started.</p>
                                        <ul>
                                            <li>Check some stats for your website bellow</li>
                                            <li>Sync content to other devices</li>
                                            <li>You now have access to File Manager app.</li>
                                        </ul>
                                        <a href="#" class="btn btn-info fw-bold m-t-xs">Learn More</a>
                                    </div>
                                    <div class="info-image col-md-6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="">
                                        <h5 class="card-title">Daily Visitors</h5>
                                        <canvas id="visitorsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <livewire:admin.dash-board-user-stats />
                <livewire:admin.dash-board-blog-stats />
                <livewire:admin.dash-board-recent-donations />
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Popular Products</h5>
                                <div class="popular-products">
                                    <canvas id="productsChart">Your browser does not support the canvas
                                        element.</canvas>
                                    <div class="popular-product-list">
                                        <ul class="list-unstyled">
                                            <li id="popular-product1">
                                                <span>Alpha - Material Design</span>
                                                <span class="badge badge-pill badge-success">59%</span>
                                            </li>
                                            <li id="popular-product2">
                                                <span>Space - Light Theme</span>
                                                <span class="badge badge-pill badge-warning">15%</span>
                                            </li>
                                            <li id="popular-product3">
                                                <span>Modern - Admin Dashboard</span>
                                                <span class="badge badge-pill badge-secondary">26%</span>
                                            </li>
                                        </ul>
                                        <div class="alert alert-info" role="alert">
                                            Based on last week's earnings.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Earnings</h5>
                                <div id="apex1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- PANEL FOOTER --}}
        <x-panel.footer />
    </div>
@endsection
