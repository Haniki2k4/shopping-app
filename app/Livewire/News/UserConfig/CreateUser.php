<?php

namespace App\Livewire\News\UserConfig;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class CreateUser extends Component
{
    // Khai báo các thuộc tính sẽ được sử dụng trong component
    public $id, $name, $email, $email_verified_at, $password, $role, $user_status, $UserData, $namefunction;
    public function mount(Request $request)
    {
        // Lấy thông tin đường dẫn hiện tại từ request
        // Lấy thông tin đường dẫn hiện tại từ request
        $pathInfo = $request->getPathInfo();

        // Kiểm tra xem path có chứa 'create' hay không
        // Kiểm tra xem path có chứa 'create' hay không
        $this->containsCreate = str_contains($pathInfo, 'create');

        if (!$this->containsCreate) {
            // Nếu không phải trang "create", thực hiện logic để chỉnh sửa
            $queryParams = $request->query('id'); // Lấy giá trị 'id' từ query string
            // Nếu không phải trang "create", thực hiện logic để chỉnh sửa
            $queryParams = $request->query('id'); // Lấy giá trị 'id' từ query string
            if ($queryParams) {
                $this->id = Crypt::decryptString($queryParams); //Giải mã hóa ID
                $this->UserData = User::findOrFail($this->id); // Lấy dữ liệu người dùng theo id và gán vào UserData

                // Gán giá trị từ UserData vào các thuộc tính của component
                $this->id = Crypt::decryptString($queryParams); //Giải mã hóa ID
                $this->UserData = User::findOrFail($this->id); // Lấy dữ liệu người dùng theo id và gán vào UserData

                // Gán giá trị từ UserData vào các thuộc tính của component
                $this->name = $this->UserData->name;
                $this->email = $this->UserData->email;
                $this->password = $this->UserData->password;
                $this->role = $this->UserData->role;
                $this->user_status = $this->UserData->user_status;
                $this->created_at = $this->UserData->created_at;
                $this->updated_at = $this->UserData->updated_at;
            }
            $this->namefunction = "Chỉnh sửa chuyên mục";
        } else {
            // Nếu là trang "create", khởi tạo id là 0 
            // Nếu là trang "create", khởi tạo id là 0 
            $this->namefunction = "Thêm mới chuyên mục";
        }
    }

    public function save()
    {
        // Gọi hàm kiểm tra validateFields và validate các trường đầu vào
        // Gọi hàm kiểm tra validateFields và validate các trường đầu vào
        $this->validateFields();
        // Chuẩn bị dữ liệu để lưu vào database
        // Chuẩn bị dữ liệu để lưu vào database
        if ($this->id) {
            // Nếu id đã tồn tại, thực hiện cập nhật dữ liệu
            // Nếu id đã tồn tại, thực hiện cập nhật dữ liệu
            $dataNew = [
                'name' => $this->name,
                'password' => Hash::make($this->password),
                'role' => $this->role,
                'updated_at' => now(),
            ];
        } else {
            // Nếu id không tồn tại, thực hiện thêm mới dữ liệu
            // Nếu id không tồn tại, thực hiện thêm mới dữ liệu
            $dataNew = [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role,
                'user_status' => $this->user_status,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Sử dụng hàm updateOrCreate để tạo hoặc cập nhật bản ghi
        // Sử dụng hàm updateOrCreate để tạo hoặc cập nhật bản ghi
        $var = User::updateOrCreate(['id' => $this->id], $dataNew);
        toastr()
            ->timeOut(1500)
            ->closeButton()
            ->success('Cập nhật thành công.');

        $this->reset();

        return redirect()->to('/users');
    }


    public function validateFields()
    {
        // Điều kiện kiểm tra email: nếu $this->id tồn tại (đang chỉnh sửa), loại trừ email của người dùng hiện tại
        $uniqueEmailRule = $this->id
            ? 'required|string|email|max:250|unique:users,email,' . $this->id
            : 'required|string|email|max:250|unique:users';
        $this->validate([
            'name' => 'required|string|max:255|min:2',// Tên là bắt buộc, độ dài 2-255 ký tự
            'email' => $uniqueEmailRule, // Email phải hợp lệ, duy nhất trong bảng users
            'password' => $this->id ? 'nullable|string|min:8' : 'required|string|min:8', //password chỉ yêu cầu khi tạo mới, không bắt buộc khi chỉnh sửa.
            'role' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.news.user-config.create-user')->layout('layouts.app');
    }
}
