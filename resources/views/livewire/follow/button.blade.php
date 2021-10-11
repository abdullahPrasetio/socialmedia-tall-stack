<div>
    {{-- Chek apakah login sebelum cek lainnya dengan auth()->check() --}}
    @if (auth()->check())
        @if (auth()->user()->isNot($user))        
            @if(auth()->user()->following($user))
                <x-button.error wire:click="unfollow">Unfollow</x-button.error>
            @else
                <x-button.primary wire:click="follow">Follow</x-button.primary>
            @endif
        @else
            <a href="{{route('settings')}}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-black bg-white border border-transparent rounded-md hover:bg-gray-100 focus:outline-none shadow focus:border-white focus:ring-indigo active:bg-gray-100 transition duration-150 ease-in-out">Edit Your Profile</a>
        @endif
    @endif
</div>
