@section('title', 'Job Board') {{-- We use this for set the page title --}}

<div class="flex-grow w-full mx-auto flex">
    <div class="flex-1 min-w-0 bg-white flex">
        <div class="w-80 border-r border-gray-200 bg-white overflow-auto" style="height: calc(100vh - 4rem)">
            @foreach($jobs as $job)
                <div class="border-b border-gray-100 p-5 cursor-pointer">
                    <h2 class="font-medium text-xl">{{ $job->name }}</h2>
                    <p>
                        {{ $job->description}}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="bg-white lg:min-w-0 lg:flex-1">
            
        </div>
    </div>
</div>
