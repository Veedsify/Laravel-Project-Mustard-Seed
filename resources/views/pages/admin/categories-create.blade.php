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
                            <h3>Create Categories</h3>
                        </div>
                    </div>
                </div>
                <from class="row">
                    <div class="col-md-6">
                        {{-- CARD CONTENTS HERE --}}
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Create a Blog Category </h5>
                                <p>
                                    Create a new blog category.
                                </p>
                                <div class="form-group">
                                    <label for="exampleName1">Name</label>
                                    <input wire:model="title" type="text" name="name" class="form-control"
                                        id="exampleName1" aria-describedby="name" placeholder="Name">
                                    @if ($errors->has('name'))
                                        <small id="name" class="form-text text-danger">
                                            {{ $errors->first('name') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">
                                        Description
                                    </label>
                                    <textarea rows="4" class="form-control" id="exampleTextarea1" aria-describedby="description"
                                        placeholder="Description" name="description"></textarea>
                                    @if ($errors->has('description'))
                                        <small id="description" class="form-text text-danger">
                                            {{ $errors->first('description') }}
                                        </small>
                                    @endif
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <button type="submit" class="btn btn-outline-primary">Create & Create Another</button>
                                    <button type="submit" class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- CARD CONTENTS HERE --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleImage1">Image</label>
                                    <form class="dropzone" id="my-dropzone" action="{{ route('admin.categories.upload') }}">
                                        @csrf
                                        <input type="hidden" name="image" id="image">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </from>
            </div>
        </div>
        <x-panel.footer />
    </div>
@endsection
