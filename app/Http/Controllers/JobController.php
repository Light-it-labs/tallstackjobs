<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Models\Hashtag;

class JobController extends Controller
{
    public function create() {
        return view('create-jobs', [
            'tags' => Hashtag::all('label')
        ]);
    }

    public function store(StoreJobRequest $request) {
        $validated = $request->validated();
    }
}
