<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class ShowJobs extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.show-jobs', [
            'jobs' => Job::where('name', 'like', '%'.$this->search.'%')->paginate(2)
        ]);
    }
}
