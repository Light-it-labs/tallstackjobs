<div x-data="{ current: null, showModal: false }">
    <div class="max-w-screen-sm mx-auto px-3">
        <input wire:model="search" id="search" name="search" type="text" autocomplete="off"
        class="
        appearance-none
        block
        w-full
        p-3
        my-5
        border
        border-gray-300
        rounded-md
        placeholder-gray-400
        focus:outline-none
        focus:shadow-outline-blue
        focus:border-blue-300
        transition
        duration-150
        ease-in-out
        sm:leading-5" placeholder="Search open positions..."/>
<!--         <span class="block rounded-md" wire:click="handleSearch">
            <button type="submit" class="flex justify-center m-5 w-full px-3 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Search
            </button>
        </span> -->
    </div>
    
    <div class="max-w-screen-sm mx-auto min-w-0 md:px-3 mb-5">
        <template x-for="(job, index) in {{ json_encode($jobs->toArray()['data']) }}" :key="index">
            <div class="w-full flex justify-between border-b border-gray-200 last:border-b-0 px-2 md:px-0 py-5 cursor-pointer" x-on:click="current = job; showModal = true">
                <img style="margin-top:5px;" class="self-start rounded" x-bind:src="job.company.logo" alt="">
                <div class="flex-1 pl-3">
                    <h2 class="font-medium text-xl" x-text="job.name"></h2>
                    <p class="text-sm font-light" x-text="job.description"></p>
                    <div class="mt-3" x-show="job.hashtags.length > 0">                    
                        <template x-for="(hashtag, index) in job.hashtags">
                            <span x-text="hashtag.label" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-400 text-white"></span>
                        </template>
                    </div>
                    <button
                    @click.stop="window.location = job.apply_link"
                    type="button"
                    class="inline-flex items-center px-2 py-1 mt-6 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Apply
                    </button>
                </div>
            </div>
        </template>
    </div>

    <div class="max-w-screen-sm mx-auto px-3 min-w-0 mb-5">
        {{ $jobs->links() }}
    </div>

    
    <template x-if="showModal && current">
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
            
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline" @click.away="showModal = false">
                <div class="sm:flex sm:items-start">
                    <div class="flex flex-col sm:flex-row justify-between mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <img class="self-start" x-bind:src="current.company.logo" alt="">
                        <div class="pl-3">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                <p x-text="current.name"></p>
                            </h3>
                            <p class=" mt-2 text-sm text-gray-500" x-text="current.description"></p>
                            <div class="mt-3" x-show="current.hashtags.length > 0">                    
                                <template x-for="(hashtag, index) in current.hashtags">
                                    <span x-text="hashtag.label" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-400 text-white"></span>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button @click="showModal = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-indigo-600 text-base font-medium bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                    </button>
                    <a :href="current.apply_link" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Apply
                    </a>
                </div>
                </div>
            </div>
        </div>
        </template> 
</div>