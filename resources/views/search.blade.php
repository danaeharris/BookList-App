<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="mx-auto w-9/12 h-auto">
        <p class="font-karla text-gray-600 py-5">{{$results["numFound"]}} results found for "{{$query}}"</p>
        @foreach ($results["docs"] as $book)
            <a href="/book/{{str_replace("/works/", "", $book["key"])}}">
                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    @if (array_key_exists("cover_i", $book))
                    <img src="https://covers.openlibrary.org/b/id/{{$book["cover_i"]}}-S.jpg" style="display: block; height: 50px; width: auto; margin-right: 10px"/>
                    @endif
                    <p class="font-karla text-gray-800">{{$book["title"]}}</p>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
