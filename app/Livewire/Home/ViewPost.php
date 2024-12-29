<?php

namespace App\Livewire\Home;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;

class ViewPost extends Component
{
    public $post;
    public $categoryTitle; // Biến để chứa tên category

    public function mount(Request $request)
    {
        $queryParams = $request->query();
        if (isset($queryParams['id']) && $queryParams['id'] > 0) {
            $this->id = $queryParams['id'];
            $this->post = Post::findOrFail($this->id);
            $this->categoryTitle = $this->post->category->title; 
        }
    }

    public function render()
    {
        return view('livewire.home.view-post', [
            'categoryTitle' => $this->categoryTitle,
        ])->layout('welcome');
    }
}
