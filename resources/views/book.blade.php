<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="mx-auto w-9/12 h-auto flex flex-row justify-center" style="margin-top: 100px">
            <div class="flex flex-col max-w-max h-auto">
                <img src="{{$book["image_url"]}}" alt="Card image cap"/>
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

                <a class="py-12 text-lg underline text-primary" href="https://openlibrary.org/works/{{$book["open_lib_id"]}}" class="btn btn-primary">
                <p class="font-semibold font-karla">View on Open Library</p>
            </a>
            <div class="flex flex-col items-center justify-center">
                <form method="POST" action="{{ route('dashboard') }}">
                    <x-button class="mt-4 mb-4">
                        {{ __('Add to my list') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
