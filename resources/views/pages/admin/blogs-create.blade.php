@extends('pages.layouts.panel')
@section('title', 'New Article - Dashboard Panel')
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
                                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                                </ol>
                            </nav>
                            <h3>New Article</h3>    
                        </div>
                    </div>
                </div>
                <livewire:admin.blog-create-form />
            </div>
        </div>
        <x-panel.footer />
    </div>
@endsection
