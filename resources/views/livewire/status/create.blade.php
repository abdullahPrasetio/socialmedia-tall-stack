<div class="card border border-gray-200 mb-10 rounded-lg overflow-hidden">
    <div class="px-4 py-3 card-header bg-gray-100 text-gray-700 font-semibold border-b border-gray-200">
        Your Status
    </div>
    <form wire:submit.prevent="store">
        <div class="p-4 bg-gray-50">
            <textarea wire:model="body" placeholder="What's in your mind" class="bg-gray-50 form-textarea w-full resize-none border-0 focus:shadow-none p-0 focus:ring-0"></textarea>
            @error('body')
                <div class="text-red-500 text-sm mt-2">{{$message}}</div>    
            @enderror
        </div>
        <div class="flex justify-end px-4 py-2 bg-gray-100 border-t border-gray-200">
            <x-button.secondary>Post</x-button.secondary>
        </div>
    </form>
</div>
