@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Edit Post: {{ $post->title }}</h1>
    <div>
        <a href="{{ route('admin.post.show', $post) }}" class="btn btn-outline-info me-2">
            <i class="fa fa-eye me-1"></i>Preview
        </a>
        <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-1"></i>Back to Posts
        </a>
    </div>
</div>

<form method="POST" action="{{ route('admin.post.update', $post) }}" enctype="multipart/form-data" id="blogForm">
    @csrf
    @method('PUT')

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Post Content</h5>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                               id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">URL-friendly version of the title. Leave blank to auto-generate.</div>
                    </div>

                    <!-- Excerpt -->
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                  id="excerpt" name="excerpt" rows="3"
                                  placeholder="Brief description of the post...">{{ old('excerpt', $post->excerpt) }}</textarea>
                        @error('excerpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Optional: A brief summary of your post for previews.</div>
                    </div>

                    <!-- Content -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea rows="8" class="form-control rich-editor @error('content') is-invalid @enderror"
                                  id="content" name="content">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Author -->
                    <div class="mb-3">
                        <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror"
                               id="author" name="author" value="{{ old('author', $post->author) }}" required>
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Current Featured Image -->
                    @if($post->featured_image)
                    <div class="mb-3">
                        <label class="form-label">Current Featured Image</label>
                        <div class="current-image-container">
                            <img src="{{ asset('storage/' . $post->featured_image) }}"
                                 alt="Current featured image"
                                 class="img-thumbnail"
                                 style="max-width: 200px; height: auto;">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image" value="1">
                                <label class="form-check-label" for="remove_image">
                                    Remove current image
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Featured Image -->
                    <div class="mb-3">
                        <label for="featured_image" class="form-label">
                            {{ $post->featured_image ? 'Replace Featured Image' : 'Featured Image' }}
                        </label>
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                               id="featured_image" name="featured_image" accept="image/*"
                               onchange="previewImage(this, 'imagePreview')">
                        <img id="imagePreview" class="image-preview mt-2" style="display: none; max-width: 200px; height: auto;" alt="Preview">
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Recommended size: 1200x630px. Max size: 5MB.</div>
                    </div>
                </div>
            </div>

            <!-- SEO Meta Data -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">SEO Meta Data</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                               id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}"
                               maxlength="255">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Leave blank to use post title. Max 255 characters.</div>
                    </div>

                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror"
                                  id="meta_description" name="meta_description" rows="3"
                                  maxlength="500">{{ old('meta_description', $post->meta_description) }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Brief description for search engines. Max 500 characters.</div>
                    </div>

                    <div class="mb-3">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror"
                               id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords) }}"
                               placeholder="keyword1, keyword2, keyword3">
                        @error('meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Comma-separated keywords for SEO.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Post Information -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Post Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <small class="text-muted">Created:</small>
                            <div>{{ $post->created_at->format('M d, Y') }}</div>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Updated:</small>
                            <div>{{ $post->updated_at->format('M d, Y') }}</div>
                        </div>
                    </div>
                    @if($post->published_at)
                    <div class="mt-2">
                        <small class="text-muted">Published:</small>
                        <div>{{ $post->published_at->format('M d, Y g:i A') }}</div>
                    </div>
                    @endif
                    <div class="mt-2">
                        <small class="text-muted">Views:</small>
                        <div>{{ number_format($post->views ?? 0) }}</div>
                    </div>
                </div>
            </div>

            <!-- Publish Options -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Publish Options</h5>
                </div>
                <div class="card-body">
                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="archived" {{ old('status', $post->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Featured -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_featured"
                                   name="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                Featured Post
                            </label>
                        </div>
                        <div class="form-text">Featured posts appear prominently on the homepage.</div>
                    </div>

                    <!-- Publish Date -->
                    <div class="mb-3">
                        <label for="published_at" class="form-label">Publish Date</label>
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                               id="published_at" name="published_at"
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Leave blank to publish immediately when status is "Published".</div>
                    </div>
                </div>
            </div>

            <!-- Category -->
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Category</h5>
                    <button type="button" class="btn btn-sm btn-outline-primary"
                            data-toggle="modal" data-target="#categoryModal">
                        <i class="fa fa-plus"></i> New
                    </button>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <select class="form-control @error('category_id') is-invalid @enderror"
                                id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card mt-4">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-pry mr-3 mb-4">
                            <i class="fa fa-save me-1"></i>Update Post
                        </button>

                        <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary mr-3 mb-4">
                            <i class="fa fa-times me-1"></i>Cancel
                        </a>

                        <button type="submit" name="save_and_continue" value="1" class="btn btn-outline-primary mr-3 mb-4">
                            <i class="fa fa-save me-1"></i>Save & Continue Editing
                        </button>

                        <div class="dropdown-divider"></div>
                        <button type="button" class="btn btn-outline-danger mr-3 mb-4" data-toggle="modal" data-target="#deleteModal">
                            <i class="fa fa-trash me-1"></i>Delete Post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Category Creation Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="categoryForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Create New Category</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="category_name" name="name" required>
                        <div class="invalid-feedback" id="category_name_error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="category_description" class="form-label">Description</label>
                        <textarea class="form-control" id="category_description" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="category_description_error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-pry" id="createCategoryBtn">
                        <span class="spinner-border spinner-border-sm d-none me-1" role="status" aria-hidden="true"></span>
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Post Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="deleteModalLabel">Delete Post</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this post?</p>
                <div class="alert alert-warning">
                    <strong>Warning:</strong> This action cannot be undone. The post "{{ $post->title }}" will be permanently deleted.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('admin.post.destroy', $post) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash me-1"></i>Delete Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slug = title.toLowerCase()
        .replace(/[^\w\s-]/g, '') // Remove special characters
        .replace(/\s+/g, '-')     // Replace spaces with hyphens
        .replace(/-+/g, '-')      // Replace multiple hyphens with single hyphen
        .trim();
    document.getElementById('slug').value = slug;
});

// Handle form submission with TinyMCE
document.getElementById('blogForm').addEventListener('submit', function(e) {
    // Trigger TinyMCE content sync before validation
    if (typeof tinymce !== 'undefined') {
        tinymce.triggerSave();
    }

    // Custom validation for TinyMCE content
    const content = document.getElementById('content').value.trim();
    if (!content) {
        e.preventDefault();
        alert('Content is required.');
        return false;
    }
});

// Category creation
document.getElementById('categoryForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const submitBtn = document.getElementById('createCategoryBtn');
    const spinner = submitBtn.querySelector('.spinner-border');
    const formData = new FormData(form);

    // Reset previous errors
    document.querySelectorAll('.invalid-feedback').forEach(el => {
        el.textContent = '';
        el.previousElementSibling.classList.remove('is-invalid');
    });

    // Show loading state
    submitBtn.disabled = true;
    spinner.classList.remove('d-none');

    fetch('{{ route("admin.categories.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Add new category to select
            const select = document.getElementById('category_id');
            const option = new Option(data.category.name, data.category.id, true, true);
            select.add(option);

            // Close modal and reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('categoryModal'));
            modal.hide();
            form.reset();

            // Show success toast/alert
            showAlert('Category created successfully!', 'success');
        } else {
            // Handle validation errors
            if (data.errors) {
                Object.keys(data.errors).forEach(field => {
                    const input = document.querySelector(`[name="${field}"]`);
                    const errorDiv = document.getElementById(`${field}_error`);
                    if (input && errorDiv) {
                        input.classList.add('is-invalid');
                        errorDiv.textContent = data.errors[field][0];
                    }
                });
            } else {
                showAlert('Error creating category: ' + (data.message || 'Unknown error'), 'error');
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('Error creating category. Please try again.', 'error');
    })
    .finally(() => {
        // Reset loading state
        submitBtn.disabled = false;
        spinner.classList.add('d-none');
    });
});

// Simple alert function (you can replace with toast notifications)
function showAlert(message, type = 'info') {
    // You can implement a better notification system here
    alert(message);
}

// Initialize TinyMCE when document is ready
document.addEventListener('DOMContentLoaded', function() {
    if (typeof tinymce !== 'undefined') {
        tinymce.init({
            selector: '.rich-editor',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                alignleft aligncenter alignright alignjustify | \
                bullist numlist outdent indent | removeformat | help',
            setup: function(editor) {
                editor.on('change', function() {
                    editor.save();
                });
            }
        });
    }
});

// Handle unsaved changes warning
let formChanged = false;
const form = document.getElementById('blogForm');
const inputs = form.querySelectorAll('input, textarea, select');

inputs.forEach(input => {
    input.addEventListener('change', () => {
        formChanged = true;
    });
});

// TinyMCE change handler
if (typeof tinymce !== 'undefined') {
    tinymce.on('AddEditor', function(e) {
        e.editor.on('change input', function() {
            formChanged = true;
        });
    });
}

// Warn user about unsaved changes
window.addEventListener('beforeunload', function(e) {
    if (formChanged) {
        e.preventDefault();
        e.returnValue = '';
    }
});

// Don't warn when form is submitted
form.addEventListener('submit', function() {
    formChanged = false;
});
</script>
@endsection
