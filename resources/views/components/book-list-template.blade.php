<div class="mx-auto py-12 h-auto max-w-6xl w-10/12 flex flex-row justify-center">
    <div class="flex flex-col w-full justify-center items-">
            <div class="flex flex-row flex-wrap -mx-5">
                @foreach ($books as $book)
                    <div class="flex flex-col w-4/12 md:w-3/12 lg:w-2/12 bg-white border-b border-gray-200 m-4 bg-white shadow-sm rounded-lg">
                        <a href="/book/{{$book["open_lib_id"]}}" >
                            @if($book["image_url"])
                                <div class="w-full h-auto overflow-hidden rounded-lg rounded-b-none">
                                    <img class="w-full h-auto"src="{{$book["image_url"]}}" alt="Card image cap"/>
                                </div>
                            @endif
                            <p class="text-s pt-2 pb-1 px-3 font-semibold font-karla text-gray-600 py-4">{{$book["title"]}}</p>
                        </a>
                        <div class="flex flex-col px-3 pb-3 justify-center">
                            @auth
                                @if(Request::url() === 'user/{{Auth::user()->id}}')
                                <div class="flex flex-col pt-3 items-start justify-center">
                                    <a href="/add/{{$book->id}}" class='inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md tracking-widest focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 bg-pink'>
                                        <p class="font-semibold text-xs text-white font-karla">Remove from list</p>
                                        <p class="font-semibold text-xs text-white font-karla">{{Request::path()}}</p>
                                    </a>
                                </div>
                                @endif
                            @endauth
                            <x-rate-this-book  :book="$book" :rating="$book->pivot->rating"/>
                        </div>
                    </div>
                @endforeach
            </div>
    </div> 
</div>