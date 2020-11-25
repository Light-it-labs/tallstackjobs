<div x-data="{ current: null, showModal: false }">
    <div class="w-full flex justify-center px-32 mb-5">
        <input wire:model="search" id="search" name="search" type="text" class="appearance-none block w-96 px-3 py-2 m-5 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Search query ..."/>
    
        <span class="block rounded-md" wire:click="handleSearch">
            <button type="submit" class="flex justify-center m-5 w-full px-3 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Search
            </button>
        </span>
    </div>
    
    <div class="bg-white min-w-0 flex-1 px-32 mb-5">
        <template x-for="(job, index) in {{ json_encode($jobs->toArray()['data']) }}" :key="index">
            <div class="border-b border-gray-100 p-5 cursor-pointer" x-on:click="current = job; showModal = true">
                <h2 class="font-medium text-xl" x-text="job.name"></h2>
                <p x-text="job.description"></p>
            </div>
        </template>
    </div>

    <div class="bg-white min-w-0 flex-1 px-32 mb-5">
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
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                        <p x-text="current.name"></p>
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500" x-text="current.description"></p>
                    </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <button @click="showModal = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                    </button>
                </div>
                </div>
            </div>
        </div>
        </template> 
</div>