<?php

namespace App\Livewire\News\Post;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreatePost extends Component
{
    use WithFileUploads;
    public $id, $image, $title, $categoryID, $description, $detail, $position, $post_status, $PostData;
    public $seokeyword, $seodescription, $created_by, $modified_by, $created_at, $updated_at, $currentImage;
    public $categories = [];

    public function mount(Request $request)
    {
        $pathInfo = $request->getPathInfo();

        // Kiểm tra xem path có chứa 'create' hay không
        $this->containsCreate = str_contains($pathInfo, 'create');

        $this->categories = Category::select('id', 'title')->get();

        if (!$this->containsCreate) {
            $queryParams = $request->query();
            if ($queryParams['id'] > 0) {
                $this->id = $queryParams['id'];
                $this->PostData = Post::findOrFail($this->id);
                // dd($this->PostData);
                $this->currentImage = $this->PostData->image;
                $this->title = $this->PostData->title;
                $this->categoryID = $this->PostData->category_id;
                $this->description = $this->PostData->description;
                $this->detail = $this->PostData->detail;
                $this->seokeyword = $this->PostData->seokeyword;
                $this->seodescription = $this->PostData->seodescription;
                $this->position = $this->PostData->position;
                $this->post_status = $this->PostData->post_status;
                $this->created_by = $this->PostData->created_by;
                $this->created_at = $this->PostData->created_at;
                $this->modified_by = $this->PostData->modified_by;
                $this->updated_at = $this->PostData->updated_at;
            }
            $this->namefunction = "Chỉnh sửa chuyên mục";
        } else {
            $this->id = 0;
            $this->created_by = Auth::user()->name;
            $this->modified_by = Auth::user()->name;
            $this->namefunction = "Thêm mới chuyên mục";
        }
    }

    // Quy tắc validate dữ liệu
    public function validateFields()
    {
        $this->validate([
            'image' => 'nullable|image|max:2048',
            'title' => 'required|string|max:150',
            'categoryID' => 'required|exists:categories,id',
            'description' => 'required|string|max:250',
            'detail' => 'required',
            'position' => 'required|integer',
            'seokeyword' => 'nullable|string|max:150',
            'seodescription' => 'nullable|string|max:250',
            'post_status' => 'required|in:draft,published,archived',
        ]);
    }

    public function savePost()
    {
        // dd($this->detail);
        $this->validateFields();

        if (!$this->detail) {
            toastr()
                ->timeOut(1500)
                ->closeButton()
                ->warning('Vui lòng nhập nội dung chi tiết.');
            return;
        }

        $imagePath = $this->image ? $this->image->store('posts', 'public') : $this->currentImage;

        if ($this->id) {
            $dataNew = [
                'title' => $this->title,
                'categoryID' => $this->categoryID,
                'description' => $this->description,
                'detail' => $this->detail,
                'seokeyword' => $this->seokeyword,
                'seodescription' => $this->seodescription,
                'position' => $this->position,
                'post_status' => $this->post_status,
                'modified_by' => Auth::user()->name,
                'updated_at' => now(),
            ];
            if ($this->image) {
                $imagePath = $this->image->store('posts', 'public');
    
                // Xóa ảnh cũ nếu tồn tại
                if ($this->currentImage) {
                    Storage::disk('public')->delete($this->currentImage);
                }
    
                $dataNew['image'] = $imagePath;
            }
        } else {
            $dataNew = [
                'image' => $imagePath,
                'title' => $this->title,
                'categoryID' => $this->categoryID,
                'description' => $this->description,
                'detail' => $this->detail,
                'seokeyword' => $this->seokeyword,
                'seodescription' => $this->seodescription,
                'position' => $this->position,
                'post_status' => $this->post_status,
                'created_by' => Auth::user()->name,
                'modified_by' => Auth::user()->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            if ($this->image) {
                $dataNew['image'] = $this->image->store('posts', 'public');
            }
        }

        $var = Post::updateOrCreate(['id' => $this->id], $dataNew);
        // Thông báo thành công
        toastr()
            ->timeOut(1500)
            ->closeButton()
            ->success('Cập nhật thành công.');
        $this->reset();


        return redirect()->to('/posts');

    }


    public function render()
    {
        return view('livewire.news.post.create-post')->layout('layouts.app');
    }
}

