<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hashtag;

class CreateJob extends Controller
{
    public function create() {
        return view('create-jobs', [
            'tags' => Hashtag::all('label')
        ]);
    }
}
