@section('title', 'Tạo bài viết mới')
@section('heading', 'Tạo bài viết mới')

<div class="container-fluid">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item" style="color:#0D6EFD"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Category
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Bài Đăng</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="title">Tiêu đề<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" wire:model="title"></input>
                                    @error('title') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="categoryID">Chuyên mục<span style="color:red">*</span></label>
                                    <select id="categoryID" wire:model="categoryID" class="form-control">
                                        <option value="">-- Chọn chuyên mục --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $categoryID ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categoryID') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="position">Vị trí<span style="color:red">*</span></label>
                                    <select id="position" wire:model="position" class="form-control">
                                        <option value="">-- Chọn vị trí --</option>
                                        <option value="1" {{ $position == 1 ? 'selected' : '' }}>First Page</option>
                                        <option value="2" {{ $position == 2 ? 'selected' : '' }}>Normal</option>
                                    </select>

                                    @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả<span style="color:red">*</span></label>
                                    <input id="description" class="form-control" wire:model="description"></input>
                                    @error('description') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group" wire:ignore>
                                    <label for="detail">Chi tiết<span style="color:red">*</span></label>
                                    <textarea id="editor" class="form-control" wire:model.defer="detail"></textarea>
                                    @error('detail') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="post_status">Trạng thái<span style="color:red">*</span></label>
                                    <select id="post_status" class="form-control" wire:model="post_status">
                                        <option value="">-- Chọn trạng thái --</option>
                                        <option value="draft" {{ $post_status == 'draft' ? 'selected' : '' }}>Nháp
                                        </option>
                                        <option value="published" {{ $post_status == 'published' ? 'selected' : '' }}>Công
                                            khai</option>
                                        <option value="archived" {{ $post_status == 'archived' ? 'selected' : '' }}>Lưu
                                            trữ</option>
                                    </select>
                                    @error('post_status') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <div class="card-footer" style="display:flex">
                            <div class="col-sm-6">
                                <a href="{{ route('posts') }}" class="btn btn-secondary"><i class="fas fa-backward"></i>
                                    Quay Lại</a>
                            </div>
                            <div class="col-sm-6">
                                <form wire:submit.prevent="savePost" class="w-full" enctype="multipart/form-data"
                                    method="POST">
                                    <button type="submit" class="btn btn-warning" style="float: right">
                                        <i class="fas fa-save"></i> Lưu
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="module">
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            Alignment,
            Link,
            List
        } = CKEDITOR;

        ClassicEditor
            .create(document.querySelector('#editor'), {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NjU3NTY3OTksImp0aSI6IjIzODgxZjA5LThkZDgtNDI4ZS1iNjgwLTkyYTAyNWYwMjJmNCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCIsIkJPWCJdLCJ2YyI6IjYwYzkzNzI3In0.aT0k_8nsdPqBBph8jOGnS31CKlcOMg8SNPiA4btFtHGE5y9E7NpWqiuSvecTTtHqBf0c1RZRYcPV1uds6BPTZA',
                plugins: [Essentials, Bold, Italic, Font, Paragraph,
                Alignment, Link, List],
                toolbar: [
                    'undo', 'redo', '|', 
                    'bold', 'italic', '|',
                    'alignment', '|',
                    'link', '|',
                    'numberedList', 'bulletedList', '|',
                    'insertTable', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]

            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('detail', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush