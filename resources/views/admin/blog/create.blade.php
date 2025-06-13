@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Blog</div>

                    <div class="card-body">

                        <form action="{{ route('financial-hub.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content', $post->content ?? '') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" class="form-control" rows="3" required>{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $post->author ?? '') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="published_date">Published Date</label>
                                <input type="date" name="published_date" id="published_date" class="form-control" value="{{ old('published_date', isset($post) ? $post->published_date->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="reading_time">Reading Time (minutes)</label>
                                <input type="number" name="reading_time" id="reading_time" class="form-control" value="{{ old('reading_time', $post->reading_time ?? 5) }}" required>
                            </div>
                            {{-- {{ (old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }} --}}
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="featured_image">Featured Image</label>
                                <input type="file" name="featured_image" id="featured_image" class="form-control-file">
                                @if(isset($post) && $post->featured_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Featured Image" width="200">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input" value="1" {{ old('is_featured', $post->is_featured ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">Featured Post</label>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox"
                                    class="form-check-input"
                                    id="is_published"
                                    name="is_published"
                                    value="1"
                                    {{ old('is_published') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">Publish immediately</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('financial-hub.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-pry">Add Video</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
