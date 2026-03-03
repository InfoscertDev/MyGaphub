@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Edit Notification Template</span>
                        <span class="badge bg-{{ $template->platform == 'ios' ? 'dark' : 'success' }}">
                            {{ strtoupper($template->platform) }}
                        </span>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-info">
                            <strong>Template:</strong> {{ str_replace('_', ' ', ucfirst($template->slug)) }}
                        </div>

                        <form action="{{ route('notifications.update', $template->id) }}"
                              method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">
                                    Title <small class="text-muted">(Character count: <span id="titleCount">0</span>)</small>
                                </label>
                                <input type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $template->title) }}"
                                    maxlength="255"
                                    required>
                                <div class="form-text">
                                    Recommended: {{ $template->platform == 'ios' ? '32' : '38' }} characters max for {{ $template->platform }}
                                </div>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">
                                    Message Body <small class="text-muted">(Character count: <span id="bodyCount">0</span>)</small>
                                </label>
                                <textarea class="form-control @error('body') is-invalid @enderror"
                                    id="body"
                                    name="body"
                                    rows="4"
                                    required>{{ old('body', $template->body) }}</textarea>
                                <div class="form-text">
                                    Recommended: {{ $template->platform == 'ios' ? '104-120' : '132-150' }} characters max for {{ $template->platform }}
                                </div>
                                @error('body')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control @error('category') is-invalid @enderror"
                                            id="category"
                                            name="category"
                                            required>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat }}"
                                                {{ old('category', $template->category) == $cat ? 'selected' : '' }}>
                                                {{ ucfirst($cat) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-control @error('type') is-invalid @enderror"
                                            id="type"
                                            name="type"
                                            required>
                                        @foreach($types as $typeOption)
                                            <option value="{{ $typeOption }}"
                                                {{ old('type', $template->type) == $typeOption ? 'selected' : '' }}>
                                                {{ ucfirst($typeOption) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="action" class="form-label">Action/Route (Optional)</label>
                                <input type="text"
                                    class="form-control @error('action') is-invalid @enderror"
                                    id="action"
                                    name="action"
                                    value="{{ old('action', $template->action) }}"
                                    placeholder="e.g., dashboard, analytics, financial_calculator">
                                <div class="form-text">
                                    Specify the screen/route to navigate when notification is tapped
                                </div>
                                @error('action')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox"
                                    class="form-check-input"
                                    id="is_active"
                                    name="is_active"
                                    value="1"
                                    {{ old('is_active', $template->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Template is active (notifications will be sent)
                                </label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('notifications.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-pry">Update Template</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('title');
        const bodyInput = document.getElementById('body');
        const titleCount = document.getElementById('titleCount');
        const bodyCount = document.getElementById('bodyCount');

        function updateCount() {
            titleCount.textContent = titleInput.value.length;
            bodyCount.textContent = bodyInput.value.length;
        }

        titleInput.addEventListener('input', updateCount);
        bodyInput.addEventListener('input', updateCount);

        // Initial count
        updateCount();
    });
</script>
@endpush