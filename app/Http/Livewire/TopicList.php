<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;

class TopicList extends Component
{
    use WithPagination;
    public $search = '';
    public $pagina = 10;
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
        $topics = Topic::where('name','like', $search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->pagina);
        return view('livewire.admin.topic-list',['topics' => $topics]);
    }
}
