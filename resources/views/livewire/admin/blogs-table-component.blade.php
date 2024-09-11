<div>
    <div class="flex align-items-center justify-content-between">
        <div>
            <h5 class="card-title">Articles</h5>
            <p>
                Here are all the articles that have been published on the website.
            </p>
        </div>
        <input placeholder="Search for articles" type="text" class="form-control" id="search" wire:model.live="search">
    </div>
    <table class="table" wire.poll.5000ms>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ $blog->image }}" alt="" class="img-fluid" style="max-width: 40px;">
                    </td>
                    <td>{{ Str::limit($blog->title, 40) }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="text-info">
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="{{ route('blog.details', $blog->slug) }}" target="_blank">
                            <i class="material-icons">visibility</i>
                        </a>
                        <a href="javascript:void(0)" class="text-danger" onclick="confirmDelete({{ $blog->id }})">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    {{ $blogs->links('vendor/livewire/bootstrap') }}
                </td>
            </tr>
        </tfoot>
    </table>
</div>
