@section('title', $namefunction)
@section('heading', $namefunction)
@section('link', '/category')
@section('name', 'category')

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
                        <div class="card-header">{{$namefunction}}</div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tên Chuyên Mục<span
                                            style="color:red">*</span></label>
                                    <input type="text" wire:model="title" class="form-control" id="title">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô Tả<span
                                            style="color:red">*</span></label>
                                    <input type="text" wire:model="description" class="form-control"
                                        id="description"></input>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="row">
                                    <div class=" col-4">
                                        <label for="created_by" class="form-label">Người tạo<span
                                                style="color:red">*</span></label>
                                        <input type="text" wire:model="created_by" class="form-control" id="created_by"
                                            readonly>
                                    </div>

                                    <div class="col-4">
                                        <label for="modified_by" class="form-label">Người cập nhật<span
                                                style="color:red">*</span></label>
                                        <input type="text" wire:model="modified_by" class="form-control"
                                            id="modified_by" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer" style="display:flex">
                            <div class="col-sm-6">
                                <a href="{{ route('category') }}" class="btn btn-secondary"><i
                                        class="fas fa-backward"></i> Quay Lại</a>
                            </div>
                            <div class="col-sm-6">
                                <form wire:submit.prevent="save" class="w-full" enctype="multipart/form-data"
                                    method="POST">
                                    <button type="submit" class="btn btn-warning" style="float: right">
                                        <i class="fas fa-save"></i> Lưu chuyên mục
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