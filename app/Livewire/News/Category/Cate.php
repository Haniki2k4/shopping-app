<?php

namespace App\Livewire\News\Category;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Cate extends Component
{
  use WithPagination;
  public function render()
  {
    $categories = Category::paginate(10);
    // dd($this->categories);
    return view('livewire.news.category.cate', ['categories' => $categories])->layout('layouts.app');
  }

  public function toggleStatus($cateid)
  {
    $category = Category::find($cateid);

    // Kiểm tra nếu category tồn tại
    if (!$category) {
      toastr()
      ->timeOut(1000)
      ->error('Chuyên mục không tồn tại.');
      return;
    }

    // Chuyển đổi trạng thái từ 'active' sang 'inactive' hoặc ngược lại
    $category->status = ($category->status === 'Active') ? 'InActive' : 'Active';

    // Lưu thay đổi
    $category->save();

    // Hiển thị thông báo thành công
    toastr()
      ->timeOut(1000)
      ->closeButton()
      ->success('Trạng thái đã được cập nhật.');
  }

  //phương thức thêm mới chuyển mục
  public function addCategory()
  {
    return redirect()->to('/category/create-cate');
  }

  //phương thức chỉnh sửa chuyển mục
  public function editCategory($cateid)
  {
    // dd($cateid);
    return redirect()->to('/category/edit-cate?id=' . $cateid);
  }

  //phương thức xóa chuyển mục
  public function delCategory($cateid)
  {
    Category::find($cateid)->delete();
    toastr()
      ->timeOut(1500)
      ->closeButton()
      ->warning('Xóa chuyên mục thành công.');
  }
}
