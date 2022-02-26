<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class Search extends Component
{
    public $search = '';
    public $searchResults = [];
    public $showSearchModal = false;

    public $show = false;

    protected $listeners = [
        'show' => 'show',
        'close' => 'close'
    ];

    public function show()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->reset();
    }

    public function updatedSearch()
    {
        $this->searchResults = Lesson::search($this->search)->get();
    }

    public function render()
    {
        return view('livewire.search');
    }
}
