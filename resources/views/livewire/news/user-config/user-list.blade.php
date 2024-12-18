@section('title', 'Quản lý nguồi dùng')
@section('heading', 'Quản lý nguồi dùng')
<div class="container-fluid">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item" style="color:#0D6EFD"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            User
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-12">
                        <h3 class="card-title" style="padding-top:4px; font-style: italic">Danh sách Người dùng</h3>
                    </div>
                    <div style="float: right">
                        <button wire:click="addUser()" class="btn btn-success"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;">Tạo
                            mới</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%">STT</th>
                                <th style="width: 10%">Tên người dùng</th>
                                <th style="width: 10%">Email</th>
                                <th style="width: 10%">Vai trò</th>
                                <th style="width: 15%">Trạng thái</th>
                                <th style="width: 5%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $item)
                                <tr class="align-middle">
                                    <td>{{$index + 1 }}</td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['email']}}</td>
                                    <td>
                                        @if ($item['role'] === 'user')
                                            <span class="badge text-bg-success">User</span>
                                        @elseif ($item['role'] === 'author')
                                            <span class="badge text-bg-info">Author</span>
                                        @endif
                                    </td>
                                    <td>
                                        <select wire:change="updateStatus({{ $item->id }}, $event.target.value)"
                                            class="form-select form-select-sm">
                                            <option value="active" {{ $item->user_status === 'active' ? 'selected' : '' }}>
                                                Đang hoạt động
                                            </option>
                                            <option value="inactive" {{ $item->user_status === 'inactive' ? 'selected' : '' }}>
                                                Dừng hoạt động
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="badge text-bg-warning" style="font-size:14px"><i class="far fa-edit"
                                                wire:click="editUser({{ $item->id }})"></i></button>
                                        <button class="badge text-bg-danger" style="font-size:14px"><i class="fas fa-ban"
                                                wire:click="delUser({{ $item->id }})"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Không tìm thấy kết quả nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <!-- Hiển thị phân trang -->
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>