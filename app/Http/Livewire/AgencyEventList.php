<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class AgencyEventList extends Component
{
    use WithPagination;
    public $search = '';
    public $pagina = 5;
    public $orderBy = 'initial_date';
    public $orderAsc = true;
    public $open = true;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        $events = Event::where('name','like', $search)
            ->where(function($query) use ($search){
                $query->where('initial_date',$this->open ? '>=' : '<',date('Y-m-d'))
                    ->orWhere('local','like', $search);
            })
            ->where('initial_date',$this->open ? '>=' : '<',date('Y-m-d'))
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->pagina);
        return view('livewire.agency.agency-event-list',compact('events'));
    }
}
