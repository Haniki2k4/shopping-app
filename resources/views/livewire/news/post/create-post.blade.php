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
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" id="title" class="form-control" wire:model="title">
                                    @error('title') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="categoryID">Chuyên mục</label>
                                    <select id="categoryID" wire:model="categoryID"
                                        class="form-control @error('categoryID') is-invalid @enderror">
                                        <option value="">-- Chọn chuyên mục --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('categoryID') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <select id="position" wire:model="position" class="form-control">
                                        <option value="" selected>-- Chọn vị trí --</option>
                                        <option value="1">First Page</option>
                                        <option value="2">Normal</option>
                                    </select>
                                    @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <textarea id="description" class="form-control" wire:model="description"></textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="detail">Chi tiết</label>
                                    <textarea id="editor1" class="form-control" wire:model="detail"
                                        name="detail"></textarea>
                                    @error('detail') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="post_status">Trạng thái</label>
                                    <select id="post_status" class="form-control" wire:model="post_status">
                                        <option value="" selected>-- Chọn trạng thái --</option>
                                        <option value="draft">Nháp</option>
                                        <option value="published">Công khai</option>
                                        <option value="archived">Lưu trữ</option>
                                    </select>
                                    @error('post_status') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
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
                                    <i class="fas fa-save"></i> Lưu Bài đăng
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
</div>