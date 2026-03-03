@extends('layouts.admin')


@section('script')
    <script>
        // Image preview function
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }

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
                    const modal = $('#categoryModal');
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
    </script>
@endsection



@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Create New Post</h1>
        <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-1"></i>Back to Posts
        </a>
    </div>

    <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data" id="blogForm">
        @csrf

        <div class="row mb-6">
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
                                id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Excerpt -->
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                    id="excerpt" name="excerpt" rows="3"
                                    placeholder="Brief description of the post...">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Optional: A brief summary of your post for previews.</div>
                        </div>

                        <!-- Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea rows="8" class="form-control rich-editor @error('content') is-invalid @enderror"
                                    id="content" name="content">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Author -->
                        <div class="mb-3">
                            <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror"
                                id="author" name="author" value="{{ old('author', 'Prismcheck') }}" required>
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Featured Image -->
                        <div class="mb-3">
                            <label for="featured_image" class="form-label">Featured Image</label>
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
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Publish Options -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Options</h5>
                    </div>
                    <div class="card-body">
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control @error('status') is-invalid @enderror"
                                    id="status" name="status" required>
                                <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Featured -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured"
                                    name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
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
                                id="published_at" name="published_at" value="{{ old('published_at') }}">
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
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                            <button type="submit" class="btn btn-pry">
                                <i class="fa fa-save me-1"></i>Create Post
                            </button>
                            <a href="{{ route('admin.post.index') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-times me-1"></i>Cancel
                            </a>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-pry" id="createCategoryBtn">
                            <span class="spinner-border spinner-border-sm d-none me-1" role="status" aria-hidden="true"></span>
                            Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

