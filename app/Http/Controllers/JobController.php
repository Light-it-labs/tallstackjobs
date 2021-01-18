<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Models\Hashtag;
use App\Models\Job;

class JobController extends Controller
{
    public function create() {
        return view('create-jobs', [
            'tags' => Hashtag::all('id', 'label')
        ]);
    }

    public function store(StoreJobRequest $request) {
        
        $validated = $request->validated();
        $tags = array_map("intval", explode(",", $request->get('tags')));
        
        $job = Job::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'company_id' => $validated['company_id'],
            'salary' => $validated['salary'],
            'apply_link' => $validated['apply_link'],
            'email' => $validated['email'],
        ]);

        if(sizeof($tags) > 0) $job->hashtags()->attach($tags);

        return back();
        
    }
}
