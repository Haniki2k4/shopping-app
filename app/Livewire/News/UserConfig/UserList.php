<?php

namespace App\Livewire\News\UserConfig;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Crypt;

class UserList extends Component
{
    public function render()
    {
        $users = User::whereIn('role', ['user', 'author'])->paginate(10);
        return view('livewire.news.user-config.user-list', ['users' => $users])->layout('layouts.app');
    }
    public function updateStatus($userId, $newStatus)
    {
        $users = User::find($userId);

        // Kiểm tra nếu category tồn tại
        if (!$users) {
            toastr()
                ->timeOut(1000)
                ->error('Người dùng không tồn tại.');
            return;
        }

        // Chuyển đổi trạng thái từ 'active' sang 'inactive' hoặc ngược lại
        $users->user_status = ($users->user_status === 'active') ? 'inactive' : 'active';

        // Lưu thay đổi
        $users->save();

        // Hiển thị thông báo thành công
        toastr()
            ->timeOut(1000)
            ->closeButton()
            ->success('Trạng thái đã được cập nhật.');
    }

    //phương thức thêm mới chuyển mục
    public function addUser()
    {
        return redirect()->to('/users/create-user');
    }

    //phương thức chỉnh sửa chuyển mục
    public function editUser($userID)
    {
        $encryptedId = Crypt::encryptString($userID); // Mã hóa ID
        return redirect()->to('/users/edit-user?id=' . urlencode($encryptedId)); // Chuyển hướng với ID mã hóa
    }

    //phương thức xóa chuyển mục
    public function delUser($userID)
    {
        User::find($userID)->delete();
        toastr()
            ->timeOut(1500)
            ->closeButton()
            ->warning('Xóa chuyên mục thành công.');
    }
}
