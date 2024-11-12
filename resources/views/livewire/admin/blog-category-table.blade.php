<div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <form action="">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for category" wire:model.live="search">
            </div>
        </form>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create New
            Category</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">
                        {{ $category->id }}
                    </th>
                    <td>
                        <img src="{{ $category->image }}" alt="{{ $category->name }}" class="img-fluid"
                            style="max-width: 50px">
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->slug }}
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger"
                            onclick="confirmDelete({{ $category->id }}, 'Category')">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    {{ $categories->links('vendor/livewire/bootstrap') }}
                </td>
            </tr>
        </tfoot>
    </table>
</div>
