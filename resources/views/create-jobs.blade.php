@extends('layouts.app')

@section('content')
<div class="w-full max-w-screen-sm mx-auto px-2 mb-8">

    <h1 class="text-2xl font-bold my-6">Add new job</h1>

    <form action="{{ route('job-store') }}" method="POST">
    @csrf

    <input type="hidden" name="company_id" id="company_id" value="{{ Auth::user()->company_id }}" />

    <div class="mb-6">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <div class="mt-1">
            <input 
            type="text"
            name="name"
            id="name"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2"
            placeholder="Which role does your company need?"
            autocomplete="off"
            value="{{ old('name') }}">
        </div>
        <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
    </div>

    <div class="mb-6">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <div class="mt-1">
            <textarea
            name="description"
            rows="5"
            id="description"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2"
            placeholder="Description of the role"
            autocomplete="off"
            >{{ old('description') }}</textarea>
        </div>
        <p class="text-red-500 text-xs mt-1">{{ $errors->first('description') }}</p>
    </div>

    <div
    x-data="{
        open: false,
        filter: '',
        tags: {{ json_encode($tags->toArray()) }},
        filteredTags: [],
        ownTags: []
    }"
    x-init="filteredTags = tags"
    class="mb-6 relative">
        <p class="block text-sm font-medium text-gray-700">Tags</p>
        <div
        @click.away="!filter ? open = false : null"
        class="
        bg-white
        mt-1
        shadow-sm
        focus:ring-indigo-500
        focus:border-indigo-500
        flex
        flex-wrap
        w-full
        sm:text-sm
        border-gray-300
        rounded-md
        p-2">
            <template x-for="(tag, index) in ownTags" :key="index">
                <span @click="removeTag(tag.id, ownTags)" x-text="'x ' + tag.label" class="inline-flex items-center self-center cursor-pointer mr-1 my-1 px-3 py-1 rounded-full text-xs font-medium bg-gray-400 text-white"></span>
            </template>
            <input x-model="filter" @click="open = true" @input="$event.target.value === '' ? filteredTags = tags : filteredTags = tags.filter((tag) => tag.label.includes($event.target.value))" class="flex-1 ml-1" :class="ownTags.length > 0 ? 'px-2' : ''" type="text" placeholder="+ Add tags" autocomplete="off" />
            <input type="hidden" :value="getOwnTagsIds(ownTags)" name="tags" id="tags" />
        </div>
        <ul x-show="open" class="absolute bg-white cursor-pointer mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md h-40 overflow-y-auto">
            <template x-for="(tag, index) in filteredTags" :key="index">
                <li @click="!isTagIncluded(tag.id, ownTags) ? ownTags.push({id:tag.id, label:tag.label}) : null" x-text="tag.label" class="p-2 hover:bg-indigo-600 hover:text-white"></li>
            </template>
        </ul>
    </div>

    <div class="mb-6">
        <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
        <div class="mt-1">
            <input 
            type="text"
            name="salary"
            id="salary"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2"
            autocomplete="off"
            placeholder="How much will you pay?"
            value="{{ old('salary') }}">
        </div>
        <p class="text-red-500 text-xs mt-1">{{ $errors->first('salary') }}</p>
    </div>

    <div class="mb-6">
        <label for="apply_link" class="block text-sm font-medium text-gray-700">Apply link</label>
        <div class="mt-1">
            <input 
            type="text"
            name="apply_link"
            id="apply_link"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2"
            autocomplete="off"
            placeholder="https://"
            value="{{ old('apply_link') }}">
        </div>
        <p class="text-red-500 text-xs mt-1">{{ $errors->first('apply_link') }}</p>
    </div>

    <div class="mb-6">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <div class="mt-1">
            <input 
            type="text"
            name="email"
            id="email"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2"
            placeholder="Where do applicants send CVs?"
            autocomplete="off"
            value="{{ old('email') }}">
        </div>
        <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
    </div>

    <div class="flex justify-end">
        <input type="submit" value="Submit" class="cursor-pointer py-3 px-6 rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
    </div>

    </form>
</div>
@endsection

<script>
function isTagIncluded(tagID, ownTags) {
    for (let tag of ownTags) {
        if (tag.id === tagID) return true; 
    }
    return false;
}

function removeTag(tagID, ownTags) {
    for (let tag of ownTags) {
        if (tag.id === tagID) {
            ownTags.splice(ownTags.indexOf(tag), 1);
        } 
    }
}

function getOwnTagsIds(ownTags) {
    const ids = [];
    for (tag of ownTags) {
        ids.push(tag.id);
    }
    return ids.join(",");
}
</script>