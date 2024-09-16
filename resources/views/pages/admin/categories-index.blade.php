@extends('pages.layouts.panel')
@section('title', 'New Category - Dashboard Panel')
@section('content')
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-separator-1">
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                </ol>
                            </nav>
                            <h3>Blog Categories</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="card">
                            <livewire:admin.blog-category-table />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-panel.footer />
    </div>
@endsection