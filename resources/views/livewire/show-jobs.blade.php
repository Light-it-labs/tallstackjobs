<div>
    <div class="w-full flex justify-center px-32 mb-5">
        <input wire:model="search" id="search" name="search" type="text" class="appearance-none block w-96 px-3 py-2 m-5 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Search query ..."/>
    
        <span class="block rounded-md" wire:click="handleSearch">
            <button type="submit" class="flex justify-center m-5 w-full px-3 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Search
            </button>
        </span>
    </div>
    
    <div class="bg-white min-w-0 flex-1 px-32 mb-5">
        @foreach($jobs as $job)
            <div class="border-b border-gray-100 p-5 cursor-pointer">
                <h2 class="font-medium text-xl">{{ $job->name }}</h2>
                <p>
                    {{ $job->description}}
                </p>
            </div>
        @endforeach
    </div>

    <div class="bg-white min-w-0 flex-1 px-32 mb-5">
        {{ $jobs->links() }}
    </div>
</div>