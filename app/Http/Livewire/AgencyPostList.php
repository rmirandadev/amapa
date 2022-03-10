<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AgencyPostList extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'publication_date';
    public $orderAsc = true;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        $posts = Post::where('title','like', $search)
            ->orWhere('subtitle','like', $search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'desc' : 'asc')
            ->paginate(5);
        return view('livewire.agency.agency-post-list',['posts' => $posts]);
    }
}
