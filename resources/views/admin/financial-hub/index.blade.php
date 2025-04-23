@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Financial Intelligence Hub Videos</h1>
        <a href="{{ route('financial-hub.create') }}" class="btn btn-pry">
            Add New Video
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-light">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <strong>Video Status: </strong>
                    <span class="badge bg-primary">{{ $publishedCount }} Published</span>
                    <span class="badge bg-secondary">{{ $videos->count() - $publishedCount }} Unpublished</span>
                    <small class="text-muted ms-2">(Min: 4, Max: 8 published videos)</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-light">
            <strong>YouTube Playlist Link</strong> <small>(For "View All" button)</small>
        </div>
        <div class="card-body">
            <form action="{{ route('financial-hub.update-playlist-link') }}" method="POST" class="d-flex align-items-center">
                @csrf
                <div class="flex-grow-1 me-2">
                    <input type="url"
                           name="youtube_playlist_link"
                           class="form-control"
                           value="{{ $youtubePlaylistLink }}"
                           placeholder="https://www.youtube.com/playlist?list=YOUR_PLAYLIST_ID"
                           required>
                </div>
                <button type="submit" class="btn btn-pry">Update Link</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Banner</th>
                    <th>Video Link</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="videos-table-body">
                @foreach($videos as $video)
                    <tr data-id="{{ $video->id }}">
                        <td>{{ $video->display_order }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{ $video->category }}</td>
                        <td>
                            <div style="position: relative; width: 120px; height: 67px; border-radius: 8px; overflow: hidden;">
                                <img src="{{ $video->banner_url }}"
                                     alt="{{ $video->title }}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;">
                                    <span class="material-icons text-white"></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ $video->video_link }}" target="_blank" class="text-truncate d-inline-block" style="max-width: 150px;">
                                {{ $video->video_link }}
                            </a>
                        </td>
                        <td>
                            <span class="badge {{ $video->is_published ? 'bg-success' : 'bg-warning' }}">
                                {{ $video->is_published ? 'Published' : 'Unpublished' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" style="display: flex; gap: 8px;">
                                <a href="{{ route('financial-hub.edit', $video) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Edit
                                </a>

                                <form action="{{ route('financial-hub.toggle-publish', $video) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-outline-{{ $video->is_published ? 'warning' : 'success' }}">
                                        {{ $video->is_published ? 'Unpublish' : 'Publish' }}
                                    </button>
                                </form>

                                <form action="{{ route('financial-hub.destroy', $video) }}"
                                      method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add link to Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
    // Initialize drag and drop for reordering
    document.addEventListener('DOMContentLoaded', function() {
        const tableBody = document.getElementById('videos-table-body');

        if (tableBody) {
            new Sortable(tableBody, {
                animation: 150,
                handle: 'tr',
                onEnd: function() {
                    updateOrder();
                }
            });
        }

        // Handle delete confirmation
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Are you sure you want to delete this video banner?')) {
                    e.preventDefault();
                }
            });
        });

        // Update order after drag and drop
        function updateOrder() {
            const rows = document.querySelectorAll('#videos-table-body tr');
            const ids = Array.from(rows).map(row => row.dataset.id);

            fetch('{{ route("financial-hub.update-order") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ orders: ids })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Refresh the order numbers
                    rows.forEach((row, index) => {
                        row.querySelector('td:first-child').textContent = index + 1;
                    });
                }
            });
        }
    });
</script>
@endpush
@endsection
