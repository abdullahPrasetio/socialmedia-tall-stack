<div class="container">
    <div class="flex">
        <div class="w-1/2">
            <div class="card border border-gray-200 mb-10 rounded-lg overflow-hidden">
                <div class="px-4 py-3 card-header bg-gray-100 text-gray-700 font-semibold border-b border-gray-200">
                    Your Status
                </div>
                <form wire:submit.prevent="update">
                    <div class="p-4 bg-gray-50">
                        <textarea wire:model="body" placeholder="What's in your mind" class="bg-gray-50 form-textarea w-full resize-none border-0 focus:shadow-none p-0 focus:ring-0">{{old('body',$status->body)}}</textarea>
                        @error('body')
                            <div class="text-red-500 text-sm mt-2">{{$message}}</div>    
                        @enderror
                    </div>
                    <div class="flex justify-end px-4 py-2 bg-gray-100 border-t border-gray-200">
                        <x-button.secondary>Update</x-button.secondary>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>