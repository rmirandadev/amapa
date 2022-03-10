<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AgencyPostCategoryList extends Component
{
    use WithPagination;

    public $category;
    public $idCategory = '';
    public $search = '';
    public $orderBy = 'publication_date';
    public $orderAsc = true;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($idCategory,$category)
    {
        $this->idCategory = $idCategory;
        $this->category = $category;
    }


    public function render()
    {
        $search = '%'.$this->search.'%';
        $posts = Post::with('category')->where('category_id',$this->idCategory)
            ->where(
                function($query) use ($search) {
                    return $query
                        ->where('title','like', $search)
                        ->orWhere('subtitle','like', $search);
                })
            ->orderBy($this->orderBy, $this->orderAsc ? 'desc' : 'asc')
            ->paginate(5);
        return view('livewire.agency.agency-post-category-list',compact('posts'));
    }
}
