<?php

namespace App\Http\Livewire;

use App\Models\Local;
use Livewire\Component;
use Livewire\WithPagination;

class LocalList extends Component
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
        $locals = Local::where('name','like', $search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->pagina);
        return view('livewire.admin.local-list',['locals' => $locals]);
    }
}
