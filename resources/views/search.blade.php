<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="mx-auto w-9/12 h-auto">
        <p class="font-karla text-gray-600 py-5">{{$results["numFound"]}} results found for "{{$query}}"</p>
        @foreach ($results["docs"] as $book)
            <div class="mx-auto py-12 h-auto max-w-6xl w-10/12 flex flex-row justify-center">
                <div class="flex flex-col w-full justify-center items-">
                        <div class="flex flex-row flex-wrap -mx-5">
                            @foreach ($results["docs"] as $book)
                                @if(array_key_exists("cover_i", $book))
                                    <div class="flex flex-col w-4/12 md:w-3/12 lg:w-2/12 bg-white border-b border-gray-200 m-4 bg-white shadow-sm rounded-lg">
                                        <a href="/book/{{str_replace("/works/", "", $book["key"])}}" >
                                            @if(array_key_exists("cover_i", $book))
                                                <div class="w-full h-auto overflow-hidden rounded-lg rounded-b-none">
                                                    <img class="w-full h-auto" src="https://covers.openlibrary.org/b/id/{{$book["cover_i"]}}-L.jpg"/>
                                                </div>
                                            @endif
                                            <p class="text-s pt-2 pb-1 px-3 font-semibold font-karla text-gray-600 py-4">{{$book["title"]}}</p>
                                        </a>
                                    </div>
                                @else
                                    @php
                                        continue;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                </div> 
            </div>
        @endforeach
    </div>
</x-app-layout>
