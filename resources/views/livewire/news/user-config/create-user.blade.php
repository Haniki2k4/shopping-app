@section('title', $namefunction)
@section('heading', $namefunction)
@section('link', '/users')
@section('name', 'users')

<div class="container-fluid">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item" style="color:#0D6EFD"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Users
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
                                    <label for="name" class="form-label">Tên Người dùng<span
                                            style="color:red">*</span></label>
                                    <input type="text" wire:model="name" class="form-control" id="name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                @if($namefunction === 'Thêm mới chuyên mục')
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email<span style="color:red">*</span></label>
                                        <input type="text" wire:model="email" class="form-control" id="email"></input>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu<span
                                            style="color:red">*</span></label>
                                    <input type="password" wire:model="password" class="form-control" id="password">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Vai trò<span style="color:red">*</span></label>
                                    <select wire:model="role" id="role" class="form-select">
                                        <option value="">Chọn vai trò</option>
                                        <option value="user" {{ $role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="author" {{ $role == 'author' ? 'selected' : '' }}>Author</option>
                                    </select>
                                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </form>
                        </div>
                        <div class="card-footer" style="display:flex">
                            <div class="col-sm-6">
                                <a href="{{ route('users') }}" class="btn btn-secondary"><i class="fas fa-backward"></i>
                                    Quay Lại</a>
                            </div>
                            <div class="col-sm-6">
                                <form wire:submit.prevent="save" class="w-full" enctype="multipart/form-data"
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