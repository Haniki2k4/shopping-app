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
    public $id, $name, $email , $email_verified_at, $password, $role, $user_status, $UserData, $namefunction;
    public function mount(Request $request)
    {
        $pathInfo = $request->getPathInfo();

        // Kiểm tra xem path có chứa 'add' hay không
        $this->containsCreate = str_contains($pathInfo, 'create');

        if (!$this->containsCreate) {
            $queryParams = $request->query('id');
            if ($queryParams) {
                $this->id = Crypt::decryptString($queryParams);
                $this->UserData = User::findOrFail($this->id);
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
            $this->id = 0;
            $this->namefunction = "Thêm mới chuyên mục";
        }
    }

    public function save()
    {
        $this->validateFields();
        if ($this->id) {
            $dataNew = [
                'name' => $this->name,
                'password' => Hash::make($this->password),
                'role' =>  $this->role,  
                'user_status' => $this->user_status,  
                'updated_at' => now(),
            ];
        } else {
            $dataNew = [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' =>  $this->role,  
                'user_status' =>  $this->user_status,  
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

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
        $this->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:250|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,author',
        ]);
    }

    public function render()
    {
        return view('livewire.news.user-config.create-user')->layout('layouts.app');
    }
}
