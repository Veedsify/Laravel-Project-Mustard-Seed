@extends('pages.layouts.panel')
@section('title', 'Admin - Dashboard Panel')
@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-separator-1">
                                    <li class="breadcrumb-item"><a href="#">Articles</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl">
                        <div class="card">
                            <div class="card-body">
                                <livewire:admin.blogs-table-component />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-panel.footer />
    </div>
@endsection
