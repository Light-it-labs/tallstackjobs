<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class ShowJobs extends Component
{
    public $jobs;

    public function mount()
    {
        $this->jobs = Job::all();
    }

    public function render()
    {
        return view('livewire.show-jobs');
    }
}
