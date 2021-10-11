<div class="container">
    <div class="bg-white w-full rounded-lg p-5 border border-gray-200 lg:w-1/2 lg:mx-auto shadow text-center">
        <div class="text-gray-700">
            <div class="text-xl font-bold mb-5">
                Are You sure?
            </div>
            <div class="flex items-start border border-gray-200 rounded-lg p-4 mb-5 bg-gray-50">
                <img src="{{$status->user->gravatar()}}" alt="" class="mr-3 w-16 h-16 rounded-full object-cover object-center">
                <div class="text-left">
                    <div class="text-sm text-gray-400 mb-3">{{$status->published}}</div>
                    <div class="text-gray-700 leading-relaxed">{!!nl2br($status->body)!!}</div>
                    <div class="text-sm text-gray-400 mt-4 flex items-center -mx-4">
                        <div class="flex items-center mx-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        23 Comments
                        </div>
                        <div class="flex items-center mx-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                            </svg>
                        123 Likes
                        </div>
                    </div>
                </div>
            </div>
            <button wire:click.prevent="destroy" class="bg-red-500 text-gray-100 hover:bg-red-600 px-4 py-2 rounded-lg text-center inline-block border border-red-500">Delete</button>
            <a href="{{route("status.show",$status->hash)}}" class="bg-white hover:bg-gray-100 px-4 py-2 rounded-lg text-center inline-block border border-gray-200">Cancel</a>
        </div>
    </div>
</div>
