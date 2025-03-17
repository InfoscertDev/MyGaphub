@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Market Opportunity</div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('market-opportunities.update', $marketOpportunity) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text"
                                       class="form-control @error('title') is-invalid @enderror"
                                       id="title"
                                       name="title"
                                       value="{{ old('title', $marketOpportunity->title) }}"
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="banner_image" class="form-label">Banner Image</label>
                                <div class="small text-muted mb-2">
                                    Required dimensions: 343px × 142px with 18px corner radius
                                </div>
                                @if($marketOpportunity->banner_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $marketOpportunity->banner_image) }}"
                                             alt="{{ $marketOpportunity->title }}"
                                             class="img-thumbnail"
                                             style="max-width: 200px;">
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
                                <label for="button_text" class="form-label">Button Text</label>
                                <select class="form-select @error('button_text') is-invalid @enderror"
                                        id="button_text"
                                        name="button_text"
                                        required>
                                    <option value="">Select Button Text</option>
                                    @foreach($buttonOptions as $option)
                                        <option value="{{ $option }}" {{ old('button_text', $marketOpportunity->button_text) == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="destination_link" class="form-label">Destination Link</label>
                                <input type="url"
                                       class="form-control @error('destination_link') is-invalid @enderror"
                                       id="destination_link"
                                       name="destination_link"
                                       value="{{ old('destination_link', $marketOpportunity->destination_link) }}"
                                       required>
                                @error('destination_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="is_published"
                                       name="is_published"
                                       value="1"
                                       {{ old('is_published', $marketOpportunity->is_published) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_published">Published</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('market-opportunities.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-pry">Update Banner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
