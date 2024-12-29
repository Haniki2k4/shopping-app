<?php

namespace App\Livewire\Home;
use App\Models\Post;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $categories, $featuredPosts, $recentPosts;

    public function mount()
    {
        $this->categories = Category::all();
        $this->featuredPosts = Post::where('position', 1)
            ->where('post_status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $this->recentPosts = Post::where('position', '!=', 1)
            ->where('post_status','published')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function viewPost($id)
    {
        //dd($id);
        return redirect()->to('/home/viewpost?id=' . $id);
    }
    public function render()
    {

        return view('livewire.home.index')->layout('welcome');
    }
}
