@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-bullhorn"></i> Send Promotional Notification
                    </div>

                    <div class="card-body">
                        <div class="alert alert-info">
                            <strong>Info:</strong> Send promotional messages, feature announcements, or marketing campaigns to targeted user groups.
                        </div>

                        <form action="{{ route('notifications.promotional.send') }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to send this promotional notification?');">
                            @csrf

                            <div class="mb-3">
                                <label for="target_audience" class="form-label">Target Audience</label>
                                <select class="form-control @error('target_audience') is-invalid @enderror"
                                        id="target_audience"
                                        name="target_audience"
                                        required>
                                    <option value="">Select Target Audience</option>
                                    <option value="all" {{ old('target_audience') == 'all' ? 'selected' : '' }}>
                                        All Users
                                    </option>
                                    <option value="active" {{ old('target_audience') == 'active' ? 'selected' : '' }}>
                                        Active Users (Opened app in last 7 days)
                                    </option>
                                    <option value="inactive" {{ old('target_audience') == 'inactive' ? 'selected' : '' }}>
                                        Inactive Users (Haven't opened app in 7+ days)
                                    </option>
                                </select>
                                <div class="form-text">Choose which users should receive this notification</div>
                                @error('target_audience')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

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
                                    placeholder="e.g., New Feature: Portfolio Tracker"
                                    maxlength="255"
                                    required>
                                <div class="form-text">Max 50 characters recommended</div>
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
                                    placeholder="e.g., Track your investment portfolio in real-time! Our new Portfolio Tracker helps you monitor all your assets in one place. Try it now!"
                                    required>{{ old('message') }}</textarea>
                                <div class="form-text">Clear, compelling, and actionable - max 200 characters recommended</div>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category/Style</label>
                                <select class="form-control @error('category') is-invalid @enderror"
                                        id="category"
                                        name="category"
                                        required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                                            {{ ucfirst($cat) }}
                                            @if($cat == 'success') - Positive/Achievement @endif
                                            @if($cat == 'primary') - General/Feature @endif
                                            @if($cat == 'info') - Informational @endif
                                            @if($cat == 'warning') - Limited Time @endif
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
                                    placeholder="e.g., seed, financial_calculator">
                                <div class="form-text">
                                    Where to direct users when they tap the notification
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
                                                <i class="fa fa-bullhorn text-primary fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h6 class="mb-1" id="previewTitle">Notification Title</h6>
                                                        <p class="mb-0 text-muted small" id="previewMessage">Notification message will appear here...</p>
                                                    </div>
                                                    <span class="badge bg-secondary" id="audienceBadge">All Users</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('notifications.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-pry">
                                    <i class="fa fa-paper-plane"></i> Send Promotional Notification
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
        const audienceSelect = document.getElementById('target_audience');
        const titleCount = document.getElementById('titleCount');
        const messageCount = document.getElementById('messageCount');
        const previewTitle = document.getElementById('previewTitle');
        const previewMessage = document.getElementById('previewMessage');
        const audienceBadge = document.getElementById('audienceBadge');

        function updatePreview() {
            titleCount.textContent = titleInput.value.length;
            messageCount.textContent = messageInput.value.length;
            previewTitle.textContent = titleInput.value || 'Notification Title';
            previewMessage.textContent = messageInput.value || 'Notification message will appear here...';

            // Update audience badge
            const selectedOption = audienceSelect.options[audienceSelect.selectedIndex];
            audienceBadge.textContent = selectedOption.text || 'Select Audience';
        }

        titleInput.addEventListener('input', updatePreview);
        messageInput.addEventListener('input', updatePreview);
        audienceSelect.addEventListener('change', updatePreview);

        // Initial update
        updatePreview();
    });
</script>
@endpush