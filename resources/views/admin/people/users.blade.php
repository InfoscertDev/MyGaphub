@extends('layouts.admin')

@section('content')
    <div class="wd-f my-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Users</h4>
                <div class="d-flex">
                    <button class="btn btn-sm btn-outline-secondary" type="button" data-toggle="modal" data-target="#filterModal">
                        <i class="fa fa-filter"></i> Filters
                        @if(request()->hasAny(['status', 'verification', 'search']))
                            <span class="badge bg-primary ms-1">{{ collect([request('status'), request('verification'), request('search')])->filter()->count() }}</span>
                        @endif
                    </button>
                </div>
            </div>

            <div class="card-body">
                <!-- Active Filters Display -->
                @if(request()->hasAny(['status', 'verification', 'search']))
                    <div class="alert alert-info alert-dismissible fade show mb-3">
                        <small>
                            <strong>Active Filters:</strong>
                            @if(request('status')) <span class="badge bg-secondary me-1">Status: {{ ucfirst(request('status')) }}</span> @endif
                            @if(request('verification')) <span class="badge bg-secondary me-1">Verification: {{ ucfirst(request('verification')) }}</span> @endif
                            @if(request('search')) <span class="badge bg-secondary me-1">Search: "{{ request('search') }}"</span> @endif
                            <span class="text-muted">({{ $users->total() }} results)</span>
                        </small>
                        <button type="button" class="btn-close" data-dismiss="alert"></button>
                    </div>
                @endif

                @if (count($users))
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th scope="col">
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'firstname', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">
                                            Firstname
                                            @if(request('sort') == 'firstname')
                                                <i class="fa fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }}"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Verification</th>
                                    <th scope="col">
                                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark">
                                            Joined
                                            @if(request('sort') == 'created_at')
                                                <i class="fa fa-sort-{{ request('order') == 'asc' ? 'up' : 'down' }}"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @php
                                        $profile = $user->profile;
                                        $isDeleted = $user->deleted_at !== null;
                                        $deletionReason = $isDeleted ? $user->accountDeletion : null;
                                    @endphp
                                    <tr class="{{ $isDeleted ? 'table-secondary' : '' }}">
                                        <th>
                                            @if (isset($profile->image))
                                                <img src="{{asset('/assets/'. str_replace('public', 'storage', $profile->image) ) }}"
                                                     style="width: 50px; height: 50px; {{ $isDeleted ? 'opacity: 0.6;' : '' }}"
                                                     class="profile img img-responsive rounded-circle" alt="">
                                            @else
                                                <img src="{{asset('/assets/storage/avatar/default.png') }}"
                                                     style="width: 50px; height: 50px; {{ $isDeleted ? 'opacity: 0.6;' : '' }}"
                                                     class="profile img img-responsive rounded-circle">
                                            @endif
                                        </th>
                                        <th scope="row">
                                            {{ $user->firstname }}
                                            @if($isDeleted)
                                                <small class="text-danger">(Deleted)</small>
                                            @endif
                                        </th>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->email_verified_at)
                                                <span class="badge bg-success">Verified</span>
                                            @else
                                                <span class="badge bg-warning">Unverified</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $user->created_at->format('M d, Y') }}</small>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-primary btn-sm" onclick="viewUser({{ $user->id }})" title="View Details">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                @if($isDeleted)
                                                    @if($deletionReason)
                                                        <button class="btn btn-outline-info btn-sm" onclick="showDeletionReason('{{ addslashes($deletionReason->reason) }}', '{{ $deletionReason->created_at->format('M d, Y H:i') }}')" title="View Deletion Reason">
                                                            <i class="fa fa-info-circle"></i>
                                                        </button>
                                                    @endif
                                                    <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#restoreModal"
                                                            onclick="prepareRestore({{ $user->id }}, '{{ addslashes($deletionReason->reason) }}', '{{ $deletionReason->created_at->format('M d, Y H:i') }}')" title="Restore User">
                                                        <i class="fa fa-undo"></i>
                                                    </button>
                                                @else
                                                    <!-- Remove delete button as per requirements -->
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p class="text-muted">
                                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                {{ $users->appends(request()->query())->onEachSide(1)->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fa fa-users fa-3x text-muted"></i>
                        </div>
                        <h5 class="text-muted">No Users Found</h5>
                        @if(request()->hasAny(['status', 'verification', 'search']))
                            <p class="text-muted">Try adjusting your filters</p>
                            <a href="{{ route('gap.users') }}" class="btn btn-outline-primary">Clear Filters</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Users</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="GET" action="{{ route('gap.users') }}" id="filterForm">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="">All Users</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active Only</option>
                                    <option value="deleted" {{ request('status') == 'deleted' ? 'selected' : '' }}>Deleted Only</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email Verification</label>
                                <select name="verification" class="form-control">
                                    <option value="">All</option>
                                    <option value="verified" {{ request('verification') == 'verified' ? 'selected' : '' }}>Verified</option>
                                    <option value="unverified" {{ request('verification') == 'unverified' ? 'selected' : '' }}>Unverified</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Search</label>
                                <input type="text" name="search" class="form-control"
                                       placeholder="Search by name or email..." value="{{ request('search') }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Sort By</label>
                                <div class="row">
                                    <div class="col-8">
                                        <select name="sort" class="form-control">
                                            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Join Date</option>
                                            <option value="firstname" {{ request('sort') == 'firstname' ? 'selected' : '' }}>First Name</option>
                                            <option value="email" {{ request('sort') == 'email' ? 'selected' : '' }}>Email</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="order" class="form-control">
                                            <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Newest First</option>
                                            <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('gap.users') }}" class="btn btn-outline-secondary">Reset All</a>
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Restore Confirmation Modal -->
    <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="restoreModalLabel">
                        <i class="fa fa-undo"></i> Restore User Account
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="restoreForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <strong>Account Deletion Details:</strong>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted"><strong>Deleted On:</strong></label>
                            <p id="restoreDeletionDate" class="mb-2"></p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted"><strong>Deletion Type:</strong></label>
                            <p id="restoreDeletionType" class="mb-2">User-Initiated</p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted"><strong>Reason for Deletion:</strong></label>
                            <div id="restoreDeletionReason" class="border rounded p-3 bg-light"></div>
                        </div>

                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle"></i>
                            <strong>Confirm Restoration:</strong> Are you sure you want to restore this user account? The user will regain full access to their account immediately.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-undo"></i> Restore Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Deletion Reason Modal -->
    <div class="modal fade" id="deletionReasonModal" tabindex="-1" aria-labelledby="deletionReasonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletionReasonModalLabel">Account Deletion Reason</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-muted">Deletion Date:</label>
                        <p id="deletionDate" class="mb-2"></p>
                    </div>
                    <div>
                        <label class="form-label text-muted">Reason:</label>
                        <p id="deletionReasonText" class="border rounded p-3 bg-light"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        let currentUserIdToRestore = null;

        function viewUser(userId) {
            window.location.href = `{{ route('gap.single_user', '') }}/${userId}`;
        }

        function showDeletionReason(reason, date) {
            document.getElementById('deletionReasonText').textContent = reason;
            document.getElementById('deletionDate').textContent = date;
            const modal = new bootstrap.Modal(document.getElementById('deletionReasonModal'));
            modal.show();
        }

        function prepareRestore(userId, reason, date) {
            currentUserIdToRestore = userId;

            // Populate the modal with deletion details
            document.getElementById('restoreDeletionReason').textContent = reason;
            document.getElementById('restoreDeletionDate').textContent = date;

            // Set the form action
            document.getElementById('restoreForm').action = `/gapadmin/users/${userId}/restore`;
        }

        // Handle the restore form submission
        document.getElementById('restoreForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalHTML = submitBtn.innerHTML;

            // Show loading state
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Restoring...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: new FormData(form)
            })
            .then(response => response.json())
            .then(data => {
                if(data.status) {
                    // Reload the page on success
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                    submitBtn.innerHTML = originalHTML;
                    submitBtn.disabled = false;

                    // Close the modal
                    $('#restoreModal').modal('hide');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while restoring the user');
                submitBtn.innerHTML = originalHTML;
                submitBtn.disabled = false;

                // Close the modal
                $('#restoreModal').modal('hide');
            });
        });

        // Reset the restore modal when it's closed
        $('#restoreModal').on('hidden.bs.modal', function () {
            currentUserIdToRestore = null;
            const submitBtn = document.querySelector('#restoreForm button[type="submit"]');
            submitBtn.innerHTML = '<i class="fa fa-undo"></i> Restore Account';
            submitBtn.disabled = false;
        });

        // Auto-close alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert-dismissible');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
@endsection