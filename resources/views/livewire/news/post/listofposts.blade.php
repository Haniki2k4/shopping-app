@section('title', 'Quản lý chuyên mục')
@section('heading', 'Quản lý chuyên mục')
<div class="container-fluid">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item" style="color:#0D6EFD"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Post
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
                        <h3 class="card-title" style="padding-top:4px; font-style: italic">Danh sách Bài viết</h3>
                    </div>
                    <div style="float: right">
                        <button wire:click="addPost()" class="btn btn-success"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;">Tạo
                            mới</button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%">STT</th>
                                <th style="width: 10%">Hình ảnh</th>
                                <th style="width: 10%">Tiêu đề</th>
                                <th style="width: 10%">Danh mục</th>
                                <th style="width: 15%">Chú thích</th>
                                <th style="width: 10%">Người tạo</th>
                                <th style="width: 15%">Ngày cập nhật</th>
                                <th style="width: 10%">Trạng thái</th>
                                <th style="width: 10%"> # </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $index => $item)
                                <tr class="align-middle">
                                    <td>{{$index + 1 }}</td>
                                    <td style="color: red;">N/A</td>
                                    <td>{{$item['title']}}</td>
                                    <td>{{ $item->category ? $item->category->title : 'N/A' }}</td>
                                    <td>{{$item['description']}}</td>
                                    <td><span class="badge text-bg-success">{{$item['created_by']}}</span></td>
                                    <td><span>{{ $item['updated_at']->format('m/d/Y') }}</span></td>
                                    <td>
                                        <!-- Dropdown chuyển đổi trạng thái -->
                                        <select wire:change="updateStatus({{ $item->id }}, $event.target.value)"
                                            class="form-select form-select-sm">
                                            <option value="draft" {{ $item->post_status === 'draft' ? 'selected' : '' }}>Nháp
                                            </option>
                                            <option value="published" {{ $item->post_status === 'published' ? 'selected' : '' }}>
                                                Công khai</option>
                                            <option value="archived" {{ $item->post_status === 'archived' ? 'selected' : '' }}>Lưu
                                                trữ</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="badge text-bg-warning" style="font-size:14px"><i class="far fa-edit"
                                                wire:click="editPost({{ $item->id }})"></i></button>
                                        <button class="badge text-bg-danger" style="font-size:14px"><i class="fas fa-ban"
                                                wire:click="delPost({{ $item->id }})"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Không tìm thấy kết quả nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <!-- Hiển thị phân trang -->
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>