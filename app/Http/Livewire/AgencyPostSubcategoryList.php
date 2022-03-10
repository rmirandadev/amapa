<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AgencyPostSubcategoryList extends Component
{
    use WithPagination;

    public $category;
    public $idCategory = '';
    public $subcategory;
    public $idSubcategory = '';
    public $search = '';
    public $orderBy = 'publication_date';
    public $orderAsc = true;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($idCategory,$category,$idSubcategory,$subcategory)
    {
        $this->idCategory = $idCategory;
        $this->category = $category;
        $this->idSubcategory = $idSubcategory;
        $this->subcategory = $subcategory;
    }


    public function render()
    {
        $search = '%'.$this->search.'%';
        $posts = Post::with(['category','subcategory'])->where('subcategory_id',$this->idSubcategory)
            ->where(
                function($query) use ($search) {
                    return $query
                        ->where('title','like', $search)
                        ->orWhere('subtitle','like', $search);
                })
            ->orderBy($this->orderBy, $this->orderAsc ? 'desc' : 'asc')
            ->paginate(5);
        return view('livewire.agency.agency-post-subcategory-list',compact('posts'));
    }
}
