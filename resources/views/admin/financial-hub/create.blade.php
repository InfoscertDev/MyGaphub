@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Video</div>

                    <div class="card-body">

                        <form action="{{ route('financial-hub.store') }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Video Title</label>
                                <input type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Video Category</label>
                                <select class="form-select @error('category') is-invalid @enderror"
                                        id="category"
                                        name="category"
                                        required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="banner_image" class="form-label">Video Banner Image</label>
                                <div class="small text-muted mb-2">
                                    Required dimensions: 253px × 142px with 8px corner radius
                                </div>
                                <input type="file"
                                    class="form-control @error('banner_image') is-invalid @enderror"
                                    id="banner_image"
                                    name="banner_image"
                                    accept="image/jpeg,image/png,image/jpg"
                                    required>
                                @error('banner_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="video_link" class="form-label">Video Link</label>
                                <input type="url"
                                    class="form-control @error('video_link') is-invalid @enderror"
                                    id="video_link"
                                    name="video_link"
                                    value="{{ old('video_link') }}"
                                    placeholder="https://www.youtube.com/watch?v=VIDEO_ID"
                                    required>
                                <div class="form-text">YouTube links are recommended for best in-app playback experience.</div>
                                @error('video_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
