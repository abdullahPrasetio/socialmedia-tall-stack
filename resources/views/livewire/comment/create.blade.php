<div class="flex border border-gray-200 rounded-lg p-5">
    <div class="mr-4 flex-shrink-0">
        <img src="{{auth()->user()->gravatar()}}" alt="" class="h-16 w-16 object-cover object-center rounded-full">
    </div>
    <div  class="w-full">
        <div class="font-semibold mb-3 text-lg">{{auth()->user()->name}}</div>
        <div>
            <form  wire:submit.prevent="store">
                <div class="mb-3">
                    <textarea class="form-textarea w-full resize-none p-0 border-0 focus:shadow-none focus:ring-0 rounded-lg" wire:model="body" placeholder="Write your idea . . ."></textarea>
                </div>
                <div class="flex justify-end">
                    <x-button.secondary>Comment</x-button.secondary>
                </div>
            </form>
        </div>
    </div>
</div>
