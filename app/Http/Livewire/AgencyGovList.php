<?php

namespace App\Http\Livewire;

use App\Models\Structure;
use Livewire\Component;
use Livewire\WithPagination;

class AgencyGovList extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'name';
    public $orderAsc = true;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        $govs = Structure::where('name','like', $search)
            ->OrWhere('initials','like', $search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate(20);
        return view('livewire.agency.agency-gov-list',compact('govs'));
    }
}
