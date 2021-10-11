<div class="container">
    <div class="flex">
        <div class="w-full md:w-1/2">
            <div class="rounded border border-gray-200 bg-gray-50">
                <h1 class="capitalize text-lg text-gray-700 px-5 py-2 bg-gray-100 border-b border-gray-200 font-semibold">Update Your Profile</h1>
            
                <form wire:submit.prevent="update" class="p-5">
                    <div class="mb-5">
                        <div class="flex items-center">
                            @if ($picture)
                                <img src="{{$picture->temporaryUrl()}}" class="w-16 h-16 mr-3 rounded-full object-cover object-center">
                            @else
                                <img src="{{auth()->user()->gravatar()}}" class="w-16 h-16 mr-3 rounded-full object-cover object-center">
                            @endif
                            <label for="picture" class="bg-white rounded-lg px-4 py-2 border border-gray-200">    
                                Upload Image
                                <input type="file" wire:model="picture" id="picture" class="sr-only"/>
                            </label>
                        </div>
                        @error('picture')
                            <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="username" class="block font-medium mb-1">Username</label>
                        <input type="text" value="{{old('username',$username)}}" wire:model="username" id="username" class="w-full form-input"/>
                        @error('username')
                            <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="name" class="block font-medium mb-1">Name</label>
                        <input type="text" value="{{old('name',$name)}}" wire:model="name" id="name" class="w-full form-input"/>
                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="description" class="block font-medium mb-1">Bio</label>
                        <textarea wire:model="description" id="description" class="w-full form-textarea">{{old('description',$description)}}</textarea>
                        @error('description')
                            <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                        @enderror
                    </div>
                    <x-button.primary>Update</x-button.primary>
                </form>
            </div>
        </div>
    </div>
</div>