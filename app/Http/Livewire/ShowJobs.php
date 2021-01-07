<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class ShowJobs extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.show-jobs', [
            'jobs' => Job::where('name', 'like', '%'.$this->search.'%')->with('hashtags')->paginate(2)
        ]);
    }
}
