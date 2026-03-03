@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Notification Management</h2>
                    <div>
                        <a href="{{ route('notifications.system.create') }}" class="btn btn-warning me-2">
                            <i class="fa fa-exclamation-triangle"></i> Send System Notification
                        </a>
                        <a href="{{ route('notifications.promotional.create') }}" class="btn btn-pry">
                            <i class="fa fa-bullhorn"></i> Send Promotional Notification
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification Templates -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Notification Templates</h5>
                        <small class="text-muted">Manage automated notification templates for different user actions</small>
                    </div>
                    <div class="card-body">
                        @foreach($templates as $slug => $templateGroup)
                            <div class="mb-4 pb-4 border-bottom">
                                <h6 class="text-uppercase text-muted mb-3">
                                    {{ str_replace('_', ' ', $slug) }}
                                </h6>
                                <div class="row">
                                    @foreach($templateGroup as $template)
                                        <div class="col-md-6 mb-3">
                                            <div class="card {{ $template->is_active ? 'border-gray' : 'border-secondary' }}">
                                                <div class="card-header d-flex justify-content-between align-items-center py-4">
                                                    <span class="badge bg-{{ $template->platform == 'ios' ? 'light' : 'su' }}">
                                                        {{ strtoupper($template->platform) }}
                                                    </span>
                                                    <div>
                                                        <span class="badge bg-{{ $template->category }}">
                                                            {{ $template->category }}
                                                        </span>
                                                        {{-- @if($template->is_active)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-secondary">Inactive</span>
                                                        @endif --}}
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ $template->title }}</h6>
                                                    <p class="card-text small text-muted">{{ $template->body }}</p>
                                                    @if($template->action)
                                                        <div class="small">
                                                            <strong>Action:</strong>
                                                            <code>{{ $template->action }}</code>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="card-footer d-flex justify-content-between">
                                                    <a href="{{ route('notifications.edit', $template->id) }}"
                                                       class="btn btn-sm btn-primary p-1">
                                                        <i class="fa fa-edit text-white "></i> Edit
                                                    </a>
                                                    {{-- <form action="{{ route('notifications.toggle', $template->id) }}"
                                                          method="POST"
                                                          class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                                class="btn btn-sm btn-{{ $template->is_active ? 'secondary' : 'success' }}">
                                                            <i class="fa fa-{{ $template->is_active ? 'pause' : 'play' }}"></i>
                                                            {{ $template->is_active ? 'Deactivate' : 'Activate' }}
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
@endpush
