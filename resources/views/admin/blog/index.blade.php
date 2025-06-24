@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Blog Management</h1>
        <a href="{{ route('admin.post.create') }}" class="btn btn-pry">
            <i class="fa fa-plus me-1"></i> Create New Blog
        </a>
    </div>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.post.index') }}" class="row g-3">
                <div class="col-md-5">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control " id="search" name="search" style="width: 90%"
                           value="{{ request('search') }}" placeholder="Search posts...">
                </div>
                <div class="col-md-7 row justify-content-end">
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">All Status</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 spaxe-x-4">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" class="btn btn-outline-primary mr-3">
                                <i class="fa fa-search me-1"></i>Filter
                            </button>
                            <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-times me-1"></i>Clear
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Posts Table -->
    <div class="card">
        <div class="card-body">
            @if($posts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Featured Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Published At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>
                                    @if($post->featured_image)
                                        <img src="{{  $post->featured_image_url }}"
                                             alt="Featured Image" class="rounded"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                             style="width: 60px; height: 60px;">
                                            <i class="fa fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <strong>{{ $post->title }}</strong>
                                        @if($post->is_featured)
                                            <span class="badge bg-warning ms-1">Featured</span>
                                        @endif
                                    </div>
                                    <small class="text-muted">By {{ $post->author }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $post->category->name }}</span>
                                </td>
                                <td>
                                    <span class="post-status status-{{ $post->status }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </td>
                                <td>{{ number_format($post->views) }}</td>
                                <td>
                                    @if($post->published_at)
                                        {{ $post->published_at->format('M d, Y') }}
                                    @else
                                        <span class="text-muted">Not published</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group gap-4" role="group">
                                        <a href="{{ route('admin.post.show', $post) }}"
                                           class="btn btn-sm btn-outline-info mr-3" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.post.edit', $post) }}"
                                           class="btn btn-sm btn-outline-primary mr-3" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.post.destroy', $post) }}"
                                              style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                    onclick="confirmDelete(this.form)" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fa fa-file-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No blog found</h5>
                    <p class="text-muted">Create your first blog to get started.</p>
                    <a href="{{ route('admin.post.create') }}" class="btn btn-pry">
                        <i class="fa fa-plus me-1"></i>Create New Blog
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
