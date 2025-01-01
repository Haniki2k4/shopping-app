<?php

namespace App\Livewire\News\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateCate extends Component
{
    public $id, $title, $description, $created_by, $modified_by, $created_at, $updated_at, $CateData, $namefunction;
    public function mount(Request $request)
    {
        $pathInfo = $request->getPathInfo();

        // Kiểm tra xem path có chứa 'create' hay không
        $this->containsCreate = str_contains($pathInfo, 'create');
        
        if (!$this->containsCreate) {
            $queryParams = $request->query();
            // dd($queryParams);
            if ($queryParams['id'] > 0) {
                $this->id = $queryParams['id'];
                $this->CateData = Category::findOrFail($this->id);
                $this->title = $this->CateData->title;
                $this->description = $this->CateData->description;
                $this->created_by = $this->CateData->created_by;
                $this->created_at = $this->CateData->created_at;
                $this->modified_by = $this->CateData->modified_by;
                $this->updated_at = $this->CateData->updated_at;
            }
            $this->namefunction = "Chỉnh sửa chuyên mục";
        } else {
            $this->id = 0;
            $this->created_by = Auth::user()->name;
            $this->modified_by = Auth::user()->name;
            $this->namefunction = "Thêm mới chuyên mục";
        }
    }

    public function save()
    {
        $this->validateFields();
        if ($this->id) {
            $dataNew = [
                'title' => $this->title,
                'description' => $this->description,
                'modified_by' => Auth::user()->name,  
                'updated_at' => now(),
            ];
        } else {
            // Nếu không có id (tức là tạo mới), thì cả created_by và modified_by đều là tên của người dùng hiện tại
            $dataNew = [
                'title' => $this->title,
                'description' => $this->description,
                'created_by' => Auth::user()->name,
                'modified_by' => Auth::user()->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $var = Category::updateOrCreate(['id' => $this->id], $dataNew);
        toastr()
        ->timeOut(1500)
        ->closeButton()
        ->success('Cập nhật thành công.');

        $this->resetFields();

        return redirect()->to('/category');
    }

    public function resetFields()
    {
        $this->title = "";
        $this->description = "";
        $this->created_by = "";
        $this->modified_by = "";
        $this->created_at = "";
        $this->updated_at = "";
    }

    public function validateFields()
    {
        $this->validate([
            'title' => 'required|string|max:150|min:2',
            'description' => 'required|string|max:250|min:2',
        ]);
    }

    public function render()
    {
        return view('livewire.news.category.create-cate')->layout('layouts.app');
    }
}