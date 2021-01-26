<div x-data="{ current: null, showModal: false }">
    <div class="max-w-screen-sm px-3 mx-auto">
        <input wire:model="search" id="search" name="search" type="text" autocomplete="off"
        class="block w-full p-3 my-5 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:leading-5" placeholder="Search open positions..."/>
    </div>
    
    <div class="max-w-screen-sm min-w-0 mx-auto mb-5 md:px-3">
        <template x-for="(job, index) in {{ json_encode($jobs->toArray()['data']) }}" :key="index">
            <div class="flex justify-between w-full px-2 py-5 border-b border-gray-200 cursor-pointer last:border-b-0 md:px-0">
                <a :href="'/jobs/' + job.slug"><img style="margin-top:5px;" class="self-start w-12 rounded sm:w-auto" x-bind:src="'storage/' + job.company.logo" alt=""></a>
                <div class="flex-1 pl-3">
                    <a :href="'/jobs/' + job.slug" class="block">
                        <h2 class="font-medium sm:text-xl" x-text="job.name"></h2>
                        <p class="text-sm font-light leading-5" x-text="job.description"></p>
                    </a>
                    <div class="mt-3" x-show="job.hashtags.length > 0">                    
                        <template x-for="(hashtag, index) in job.hashtags">
                            <span x-text="hashtag.label" class="inline-flex items-center px-2 py-0 text-xs font-medium text-white bg-gray-400 rounded-full"></span>
                        </template>
                    </div>
                    <a :href="job.apply_link" target="_blank"
                    class="inline-flex items-center px-2 py-1 mt-6 text-xs font-medium text-white bg-indigo-600 border border-transparent rounded shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Apply
                    </a>
                </div>
            </div>
        </template>
    </div>

    <div class="max-w-screen-sm min-w-0 px-3 mx-auto mb-5">
        {{ $jobs->links() }}
    </div>

    
    <template x-if="showModal && current">
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
            
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
                <div class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline" @click.away="showModal = false">
                <div class="sm:flex sm:items-start">
                    <div class="flex flex-col justify-between mt-3 text-center sm:flex-row sm:mt-0 sm:ml-4 sm:text-left">
                        <img class="self-start mx-auto mb-3 sm:mb-0 sm:mx-0" x-bind:src="current.company.logo" alt="">
                        <div class="pl-3">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-headline">
                                <p x-text="current.name"></p>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500 " x-text="current.description"></p>
                            <div class="mt-3" x-show="current.hashtags.length > 0">                    
                                <template x-for="(hashtag, index) in current.hashtags">
                                    <span x-text="hashtag.label" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-400 text-white"></span>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button @click="showModal = false" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-indigo-600 bg-white border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                    </button>
                    <a :href="current.apply_link" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Apply
                    </a>
                </div>
                </div>
            </div>
        </div>
        </template> 
</div>