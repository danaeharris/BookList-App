<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="mx-auto w-9/12 h-auto flex flex-row justify-center" style="margin-top: 100px">
        <div class="flex flex-col max-w-max h-auto">
            @if($book["image_url"])
                <img src="{{$book["image_url"]}}" alt="Card image cap"/>
            @endif
            @if($userBook !== null)
                <div class="py-3">
                    <x-rate-this-book :book="$book" :rating="$userBook->rating"/>
                </div>
                <div class="flex flex-col py-3 items-center justify-center">
                    <a href="/remove/{{$book->id}}" class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-s tracking-widest focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 bg-pink'>Remove from my list</a>
                </div>
            @else
                <div class="flex flex-col pb-3 items-center justify-center">
                    <a href="/add/{{$book->id}}" class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-s tracking-widest focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 bg-pink'>Add to my list</a>
                </div>
            @endif
        </div>
        <div class="flex flex-col w-1/2 pl-10 justify-center items-">
            <h2 class="text-xl font-semibold font-karla text-gray-600 py-4">{{$book["title"]}}</h2>
            <p class="font-karla text-gray-700">{{html_entity_decode( $book["description"])}}</p>
            <br/>
            <hr/>
            <br/>
                <p class="font-karla font-semibold  text-gray-700">Authors:</p>
                @foreach ($authors as $author)
                    <a class="font-karla text-gray-700" href="/author/{{$author["id"]}}">{{ $author["name"]}}</a>
                @endforeach
            <div class="pt-10 pb-3">
                <a class="text-lg underline text-primary" href="https://openlibrary.org/works/{{$book["open_lib_id"]}}">
                    <p class="font-semibold font-karla">View on Open Library</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
