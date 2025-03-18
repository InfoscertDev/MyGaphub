@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Video</div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('financial-hub.update', $video) }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Video Title</label>
                                <input type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $video->title) }}"
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
                                        <option value="{{ $category }}" {{ old('category', $video->category) == $category ? 'selected' : '' }}>
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
                                @if($video->banner_image)
                                    <div class="mb-3">
                                        <div style="position: relative; width: 253px; height: 142px; border-radius: 8px; overflow: hidden;">
                                            <img src="{{ asset('storage/' . $video->banner_image) }}"
                                                alt="{{ $video->title }}"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;">
                                                <span class="material-icons text-white">play_circle</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <input type="file"
                                    class="form-control @error('banner_image') is-invalid @enderror"
                                    id="banner_image"
                                    name="banner_image"
                                    accept="image/jpeg,image/png,image/jpg">
                                <div class="form-text">Leave empty to keep the current image.</div>
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
                                    value="{{ old('video_link', $video->video_link) }}"
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
                                    {{ old('is_published', $video->is_published) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">Published</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('financial-hub.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-pry">Update Video</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
