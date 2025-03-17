@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Market Opportunities</h1>
            <a href="{{ route('market-opportunities.create') }}" class="btn btn-pry">
                Add New Banner
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-header bg-light">
                <strong>Banner Status: </strong>
                <span class="badge bg-primary">{{ $publishedCount }} Published</span>
                <span class="badge bg-secondary">{{ $marketOpportunities->count() - $publishedCount }} Unpublished</span>
                <small class="text-muted ms-2">(Min: 3, Max: 6 published banners)</small>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Title</th>
                        <th>Banner</th>
                        <th>Button Text</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="banners-table-body">
                    @foreach($marketOpportunities as $opportunity)
                        <tr data-id="{{ $opportunity->id }}">
                            <td>{{ $opportunity->display_order }}</td>
                            <td>{{ $opportunity->title }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $opportunity->banner_image) }}"
                                    alt="{{ $opportunity->title }}"
                                    class="img-thumbnail"
                                    style="max-width: 120px;">
                            </td>
                            <td>{{ $opportunity->button_text }}</td>
                            <td>
                                <span class="badge {{ $opportunity->is_published ? 'bg-success' : 'bg-warning' }}">
                                    {{ $opportunity->is_published ? 'Published' : 'Unpublished' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('market-opportunities.edit', $opportunity) }}"
                                    class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>

                                    <form action="{{ route('market-opportunities.toggle-publish', $opportunity) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-{{ $opportunity->is_published ? 'warning' : 'success' }}">
                                            {{ $opportunity->is_published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>

                                    <form action="{{ route('market-opportunities.destroy', $opportunity) }}"
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
@endsection
