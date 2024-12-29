<?php

namespace App\Livewire\News\Post;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;


class ListOfPosts extends Component
{
    use WithPagination;
    public function render()
    {
        $posts = Post::with('category')->paginate(10);
        // dd($this->categories);
        return view('livewire.news.post.listofposts', ['posts' => $posts])->layout('layouts.app');
    }
    public function updateStatus($postId, $newStatus)
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
        if ($post) {
            $post->post_status = $newStatus;
            $post->save();
        }

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
    public function editPost($postID)
    {
        // dd($cateid);
        return redirect()->to('/posts/edit-post?id=' . $postID);
    }

    //phương thức xóa chuyển mục
    public function delPost($postID)
    {
        $post = Post::find($postID);

        if ($post) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->delete();

            toastr()
                ->timeOut(1500)
                ->closeButton()
                ->warning('Xóa bài viết thành công.');
        } else {
            toastr()
                ->timeOut(1500)
                ->closeButton()
                ->error('Bài viết không tồn tại.');
        }
    }
}
