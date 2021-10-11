<div class="flex w-full" wire:poll.7000ms>
    <div class="flex-shrink-0 mr-3">
        <a href="{{route('account.show',$status->user->usernameOrHash)}}">
            <img src="{{$status->user->gravatar()}}" alt="" class="w-16 h-16 rounded-full object-center object-cover">
        </a>
    </div>
    <div class="w-full relative">
        <div class="flex justify-between" x-data="{dropDownIsOpen:false}">
            <a href="{{route('account.show',$status->user->usernameOrHash)}}" class="font-semibold text-gray-900">{{$status->user->name}}</a>
            @can('update',$status)
                <button @click="dropDownIsOpen=!dropDownIsOpen" class="hover:bg-gray-100 p-1 rounded focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div :class="{'hidden': !dropDownIsOpen}" class="text-sm bg-white rounded-lg py-2 w-48 absolute right-0 top-0 mt-8 border border-gray-200">
                    <a href="{{route('status.edit',$status->hash)}}" class="block px-3 py-1 hover:bg-gray-100 text-gray-600 hover:text-gray-800">Edit status</a>
                    <a href="{{route('status.delete',$status->hash)}}" class="block px-3 py-1 hover:bg-gray-100 text-gray-600 hover:text-gray-800">Remove status</a>
                </div>
            @endcan
        </div>
        <a href="{{route('status.show',$status->hash)}}">
            <div class="text-sm text-gray-400 mb-3">{{$status->published}}</div>
            <div class="text-gray-700 leading-relaxed">{!!nl2br($status->body)!!}</div>
            <div class="text-sm text-gray-400 mt-4 flex items-center -mx-4">
                <div class="flex items-center mx-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                    <a href="#showReplyForm">        
                        {{$status->comments_count}} {{\Str::plural("Comment",$status->comments_count)}}
                    </a>
                </div>
                <div class="flex items-center mx-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                123 Likes
                </div>
            </div>
        </a>
    </div>
</div>