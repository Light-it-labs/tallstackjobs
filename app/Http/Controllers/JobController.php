<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreJobRequest;
use App\Models\Hashtag;
use App\Models\Job;
use Lightit\LaravelGoogleJobs\Facades\GJob;

class JobController extends Controller
{
    public function create() {
        return view('create-jobs', [
            'tags' => Hashtag::all('id', 'label')
        ]);
    }

    public function show(Job $job) {

        $job_metadata = [
            "datePosted" => $job->updated_at,
            "description" => $job->description,
            "hiringOrganization" => [
                "@type" => "Organization",
                "name" => $job->company->name,
                "sameAs" => $job->apply_link,
                //"logo" => "http://www.example.com/images/logo.png"
            ],
            'jobLocation' => ['TELECOMMUTE'],
            'title' => $job->name,
            'validThrough' => date_add($job->updated_at, date_interval_create_from_date_string('3 months'))
        ];

        GJob::fields($job_metadata);

        return view('show-job', [
            'job' => $job,
        ]);
    }

    public function store(StoreJobRequest $request) {
        
        $validated = $request->validated();
        
        $job = Job::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'company_id' => $validated['company_id'],
            'salary' => $validated['salary'],
            'apply_link' => $validated['apply_link'],
            'email' => $validated['email'],
        ]);
            
        if ($request->get('tags')) {
            $tags = array_map("intval", explode(",", $request->get('tags')));
            $job->hashtags()->attach($tags);
        } 

        Session::flash('success', 'Your job post was saved succesfully!');

        return back();
        
    }
}
