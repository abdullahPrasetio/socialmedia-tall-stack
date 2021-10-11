<div>
    <div class="bg-gray-50 py-10 md:py-16 -mt-6 border-b border-gray-200">
        <div class="container">
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-full md:w-1/2">
                    <div class="flex flex-col md:flex-row items-center md:items-start text-center md:text-left">
                        <div class="flex-shrink-0 mr-0 md:mr-8 mb-4 md:mb-0">
                            <img src="{{$user->gravatar()}}" alt="{{$user->name}}" class="w-24 h-24 object-cover object-center rounded-full">
                        </div>
                        <div>
                            <h1 class="font-semibold text-xl text-gray-900 mb-2">{{$user->name}}</h1>
                            <div class="text-gray-600 mb-5">
                                <div class="leading-relaxed mb-4">
                                    {{$bio}}
                                    @if (strlen($bio)>= $character)
                                        <button wire:click="readMore" class="{{$readmore ? 'block' : 'hidden' }} hover:underline focus:outline-none text-sm text-gray-600 block">
                                            Read more
                                        </button>
                                        <button wire:click="less" class="{{$readmore ? 'hidden' : 'block' }} hover:underline focus:outline-none text-sm text-gray-600 block">
                                            Less more
                                        </button>
                                    @endif
                                </div>
                                <div>
                                    Joined : {{$user->created_at->format('d F, Y')}}
                                </div>
                            </div>
                            {{-- <livewire:follow.button :user="$user"/> --}}
                            {{-- alternative --}}
                            
                            @livewire('follow.button',['user'=>$user])  
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 flex justify-center">
                    @livewire('follow.statistic',['user'=>$user])
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-16">
        <div class="md:w-1/2 w-full">
            @foreach ($statuses as $status)
            <div class="mb-10">
                @livewire('status.block',['status'=>$status],key($status->id))
            </div>
            @endforeach

            @if ($statuses->hasMorePages())
                <div class="flex justify-center">
                    <x-button.primary wire:click.prevent="loadMore">
                        <span wire:loading>
                            Please Wait . . .
                        </span>
                        <span wire:loading.class="hidden">
                            Load More
                        </span>
                    </x-button.primary>
                </div>
            @endif
        </div>
    </div>
</div>
