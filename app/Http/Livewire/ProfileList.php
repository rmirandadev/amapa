<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ProfileList extends Component
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
        $profiles = Role::where('name','like', $search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->pagina);
        return view('livewire.admin.profile-list',['profiles' => $profiles]);
    }
}
