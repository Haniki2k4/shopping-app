<?php

namespace App\Livewire\News\Post;

use App\Models\Post;
use App\Models\Category;
use Livewire\Component;

class CreatePost extends Component
{
    public $title, $categoryID, $description, $detail, $position, $image, $seokeyword, $seodescription, $post_status;

    public function mount()
    {
        $this->categories = Category::all(); // Lấy danh sách chuyên mục
    }

    // Quy tắc validate dữ liệu
    protected $rules = [
        'title' => 'required|string|max:150',
        'categoryID' => 'required|exists:categories,id',
        'description' => 'required|string|max:250',
        'detail' => 'required',
        'position' => 'nullable|integer',
        'seokeyword' => 'nullable|string|max:150',
        'seodescription' => 'nullable|string|max:250',
        'post_status' => 'required|in:draft,published,archived',
    ];

    public function savePost()
    {
        $validatedData = $this->validate();

        // Thêm bài đăng
        Post::create(array_merge($validatedData, [
            'created_by' => auth()->user()->name,
            'modified_by' => auth()->user()->name,
        ]));

        // Reset form
        $this->reset();

        // Thông báo thành công
        session()->flash('success', 'Bài đăng đã được tạo thành công.');
    }


    public function render()
    {
        return view('livewire.news.post.create-post')->layout('layouts.app');
    }
}

