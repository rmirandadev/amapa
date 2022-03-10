<?php

namespace App\Http\Livewire;

use App\Models\Plataform;
use Livewire\Component;
use Livewire\WithPagination;

class PlataformList extends Component
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
        $plataforms = Plataform::where('name','like', $search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->pagina);
        return view('livewire.admin.plataform-list',['plataforms' => $plataforms]);
    }
}
