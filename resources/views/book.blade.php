<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="mx-auto w-9/12 h-auto flex flex-row justify-center" style="margin-top: 100px">
        @if (array_key_exists("covers", $book))
            <div class="flex flex-col max-w-max h-auto">
                <img src="https://covers.openlibrary.org/b/id/{{$book["covers"][0]}}-L.jpg" alt="Card image cap"/>
            </div>
        @endif
        <div class="flex flex-col w-1/2 pl-10 justify-center items-">
            <h2 class="text-xl font-semibold font-karla text-gray-600 py-4">{{$book["title"]}}</h2>
            @if (array_key_exists("description", $book) && is_array($book["description"]))
                <p class="font-karla text-gray-700">{{html_entity_decode( $book["description"]["value"])}}</p>
                @elseif (array_key_exists("description", $book))
                <p class="font-karla text-gray-700">{{$book["description"]}}</p>
            @endif
            <a class="py-12 text-lg underline text-primary" href="https://openlibrary.org/works/OL14868646W/{{$book["key"]}}" class="btn btn-primary">
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
