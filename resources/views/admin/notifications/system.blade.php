@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <i class="fa fa-exclamation-triangle"></i> Send System/Maintenance Notification
                    </div>

                    <div class="card-body">
                        <div class="alert alert-warning">
                            <strong>Warning:</strong> This notification will be sent to <strong>ALL USERS</strong> in the system.
                            Use this for system announcements, maintenance alerts, or critical updates.
                        </div>

                        <form action="{{ route('notifications.system.send') }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to send this notification to ALL users?');">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">
                                    Notification Title
                                    <small class="text-muted">(Character count: <span id="titleCount">0</span>)</small>
                                </label>
                                <input type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    placeholder="e.g., Scheduled Maintenance"
                                    maxlength="255"
                                    required>
                                <div class="form-text">Keep it concise - max 50 characters recommended</div>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">
                                    Notification Message
                                    <small class="text-muted">(Character count: <span id="messageCount">0</span>)</small>
                                </label>
                                <textarea class="form-control @error('message') is-invalid @enderror"
                                    id="message"
                                    name="message"
                                    rows="4"
                                    placeholder="e.g., MyGAPhub will be undergoing scheduled maintenance on Jan 20, 2025 from 2:00 AM to 4:00 AM. Some features may be temporarily unavailable."
                                    required>{{ old('message') }}</textarea>
                                <div class="form-text">Clear and informative - max 200 characters recommended</div>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category/Priority</label>
                                <select class="form-control @error('category') is-invalid @enderror"
                                        id="category"
                                        name="category"
                                        required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                                            {{ ucfirst($cat) }}
                                            @if($cat == 'danger') - Critical/Urgent @endif
                                            @if($cat == 'warning') - Important @endif
                                            @if($cat == 'info') - Informational @endif
                                            @if($cat == 'success') - Good News @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="action" class="form-label">Action/Deep Link (Optional)</label>
                                <input type="text"
                                    class="form-control @error('action') is-invalid @enderror"
                                    id="action"
                                    name="action"
                                    value="{{ old('action') }}"
                                    placeholder="e.g., settings, support, dashboard">
                                <div class="form-text">
                                    Screen to open when user taps the notification (leave empty for no action)
                                </div>
                                @error('action')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="label" class="form-label">Label (Optional)</label>
                                <input type="text"
                                    class="form-control @error('label') is-invalid @enderror"
                                    id="label"
                                    name="label"
                                    value="{{ old('label') }}"
                                    placeholder="e.g., Register Now, Open SEED">
                                <div class="form-text">
                                    Label on the notification button
                                </div>
                                @error('label')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Preview Box -->
                            <div class="card bg-light mb-3">
                                <div class="card-header">
                                    <strong>Preview</strong>
                                </div>
                                <div class="card-body">
                                    <div class="notification-preview border rounded p-3 bg-white">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fa fa-bell text-warning fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1" id="previewTitle">Notification Title</h6>
                                                <p class="mb-0 text-muted small" id="previewMessage">Notification message will appear here...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('notifications.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-paper-plane"></i> Send to All Users
                                </button>
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
        const messageInput = document.getElementById('message');
        const titleCount = document.getElementById('titleCount');
        const messageCount = document.getElementById('messageCount');
        const previewTitle = document.getElementById('previewTitle');
        const previewMessage = document.getElementById('previewMessage');

        function updatePreview() {
            titleCount.textContent = titleInput.value.length;
            messageCount.textContent = messageInput.value.length;
            previewTitle.textContent = titleInput.value || 'Notification Title';
            previewMessage.textContent = messageInput.value || 'Notification message will appear here...';
        }

        titleInput.addEventListener('input', updatePreview);
        messageInput.addEventListener('input', updatePreview);

        // Initial update
        updatePreview();
    });
</script>
@endpush