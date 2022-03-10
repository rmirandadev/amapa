<?php

namespace App\Http\Livewire;

use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class SubcategoryList extends Component
{
    use WithPagination;
    public $search = '';
    public $pagina = 10;
    public $orderBy = 'id';
    public $orderAsc = true;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        $subcategories = Subcategory::where('name','like', $search)
            ->orWhereHas('category', function($q) use ($search){
                $q->where('name', 'like', $search);
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->pagina);
        return view('livewire.admin.subcategory-list',['subcategories' => $subcategories]);
    }
}
