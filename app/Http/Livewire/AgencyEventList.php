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
        $events = Event::active()->where([
            ['name','like', $search],
            ['initial_date',$this->open ? '>=' : '<',date('Y-m-d')]])
            ->where(function($query) use ($search){
                $query->orWhere('local','like', $search);
            })
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->pagina);
        return view('livewire.agency.agency-event-list',compact('events'));
    }
}
