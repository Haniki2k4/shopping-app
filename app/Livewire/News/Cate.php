<?php

namespace App\Livewire\News;
use App\Models\Category;
use Livewire\Component;

class Cate extends Component
{
    public $categories, $title, $description, $created_by, $updated_at;
    public function render()
    {
        $this->categories = Category::get();
        // dd($this->categories);
        return view('livewire.news.cate')->layout('layouts.app');
    }
}
