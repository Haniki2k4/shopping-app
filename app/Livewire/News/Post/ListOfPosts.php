<?php

namespace App\Livewire\News\Post;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;


class ListOfPosts extends Component
{
    use WithPagination;
    public function render()
    {
        $posts = Post::paginate(10);
        // dd($this->categories);
        return view('livewire.news.post.listofposts', ['posts' => $posts])->layout('layouts.app');
    }
    public function toggleStatus($postId)
    {
        $post = Post::find($postId);

        // Kiểm tra nếu category tồn tại
        if (!$post) {
            toastr()
                ->timeOut(1000)
                ->error('Chuyên mục không tồn tại.');
            return;
        }

        // Chuyển đổi trạng thái từ 'active' sang 'inactive' hoặc ngược lại
        $post->status = ($post->post_status === 'published') ? 'archived' : 'published';

        // Lưu thay đổi
        $post->save();

        // Hiển thị thông báo thành công
        toastr()
            ->timeOut(1000)
            ->closeButton()
            ->success('Trạng thái đã được cập nhật.');
    }

    //phương thức thêm mới chuyển mục
    public function addPost()
    {
        return redirect()->to('/posts/create-post');
    }

    //phương thức chỉnh sửa chuyển mục
    public function editPost($cateid)
    {
        // dd($cateid);
        return redirect()->to('/posts/edit-post?id=' . $cateid);
    }

    //phương thức xóa chuyển mục
    public function delPost($cateid)
    {
        Post::find($cateid)->delete();
        toastr()
            ->timeOut(1500)
            ->closeButton()
            ->warning('Xóa chuyên mục thành công.');
    }
}
