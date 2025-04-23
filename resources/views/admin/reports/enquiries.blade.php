@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="wd-f my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="gap-title text-center pb-3">Enquiry Reports</h2>
            <div class="text-muted">
                {{ now()->format('D, j M y') }}
            </div>
        </div>

        <div class="row">
            @foreach ($enquiries as $item)
            <div class="col-md-6 mb-4">
                <div class="card bg-light elevation-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="card-title mb-1">
                                    <span class="text-primary font-weight-bold">{{ $item->name }}</span>
                                </h5>
                                <small class="text-muted">{{ $item->email }}</small>
                            </div>
                            <div class="text-right">
                                <small class="text-muted">{{ $item->created_at->format('D, j M y') }}</small>
                                <div class="mt-1">
                                    <span class="badge badge-light">
                                        <i class="fa fa-phone"></i> {{ $item->phone }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="font-weight-bold mb-1">Subject:</h6>
                            <p class="ml-2">{{ $item->subject }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="font-weight-bold mb-1">Message:</h6>
                            <p class="ml-2">{{ $item->message }}</p>
                        </div>

                        @if($item->attachment)
                        <div class="mb-2">
                            <h6 class="font-weight-bold mb-1">Attachment:</h6>
                            <a href="{{ asset('storage/'.$item->attachment) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-paperclip"></i> View Attachment
                            </a>
                        </div>
                        @endif

                        {{-- <div class="d-flex justify-content-end mt-3">
                            <button class="btn btn-sm btn-outline-danger mr-2">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                            <button class="btn btn-sm btn-outline-success">
                                <i class="fa fa-reply"></i> Respond
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation">
                    {{ $enquiries->onEachSide(1)->links('pagination::bootstrap-4') }}
                </nav>
            </div>
            <div class="text-center text-muted mt-2">
                Showing {{ $enquiries->firstItem() }} to {{ $enquiries->lastItem() }} of {{ $enquiries->total() }} entries
            </div>
        </div>
    </div>

</div>
@endsection