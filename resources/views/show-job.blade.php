@extends('layouts.app')

@section('content')
<div class="w-full max-w-screen-sm px-2 mx-auto mb-8">
    <div class="flex justify-between w-full px-2 py-5 border-b border-gray-200 cursor-pointer last:border-b-0 md:px-0">
        <img style="margin-top:5px;" class="self-start rounded" src="{{ asset('storage/' . $job->company->logo) }}" alt="">
        <div class="flex-1 pl-3">
            <h2 class="text-xl font-medium">{{$job->name}}</h2>
            <p class="text-sm font-light">{{$job->description}}</p>
            @if (count($job->hashtags) > 0)
            <div class="mt-3">                    
                @foreach ($job->hashtags as $hashtag)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-400 text-white">{{$hashtag->label}}</span>
                @endforeach
            </div>
            @endif
            <a target="_blank" href="{{$job->apply_link}}"
            class="inline-flex items-center px-2 py-1 mt-6 text-xs font-medium text-white bg-indigo-600 border border-transparent rounded shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Apply
            </a>
        </div>
    </div>
</div>
@endsection

<script type="application/ld+json">
    {!! GJob::generate() !!}
</script>