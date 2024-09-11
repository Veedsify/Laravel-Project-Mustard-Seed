<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create a Blog </h5>
                <p>
                    Create a new blog post.
                </p>
                <form>
                    <div class="form-group">
                        <label for="exampleTitle1">Title</label>
                        <input wire:model="title" type="text" class="form-control" id="exampleTitle1"
                            aria-describedby="title" placeholder="Title">
                        @if ($errors->has('title'))
                            <small id="title" class="form-text text-danger">
                                {{ $errors->first('title') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleEditor1">Editor</label>
                        @if ($errors->has('editor'))
                            <small id="editor" class="form-text text-danger">
                                {{ $errors->first('editor') }}
                            </small>
                        @endif
                        <div wire:model="editor"
                        type="text" class="form-control" id="exampleEditor1" aria-describedby="editor"
                            placeholder="Enter your post here"></div>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create</button>
            <button type="submit" class="btn btn-outline-primary">Create & Create Another</button>
            <button type="submit" class="btn btn-outline-danger">Cancel</button>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Image</h5>
                <p>
                    Upload an image for your blog post.
                </p>
                <form>
                    <div class="form-group">
                        <input type="file" class="form-control-file" aria-describedby="image" wire:model="image">
                        @if ($errors->has('image'))
                            <small id="image" class="form-text text-danger">
                                {{ $errors->first('image') }}
                            </small>
                        @endif
                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="Image"
                                class="img-fluid p-2 {{ $errors->has('image') ? 'border-danger' : '' }}">
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category</h5>
                <p>
                    Select a category for your blog post.
                </p>
                <form>
                    <div class="form-group">
                        <select wire:model="category" id="category" aria-describedby="category" placeholder="Category"
                            class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                            <option value="" disabled selected>SELECT</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <small id="category" class="form-text text-danger">
                                {{ $errors->first('category') }}
                            </small>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
