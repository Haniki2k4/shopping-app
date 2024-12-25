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
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $this->recentPosts = Post::where('position', '!=', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        
        return view('livewire.home.index')->layout('welcome');
    }
}
