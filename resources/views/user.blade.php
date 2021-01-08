<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="flex justify-center">
        @auth
            @if(Request::path() === 'user/' . Auth::user()->id)
                <h2 class="text-2xl font-semibold font-karla text-primary py-4">My Book List</h2>

            @else
                <h2 class="text-2xl font-semibold font-karla text-primary py-4">Someone Else's Book List</h2>

            @endif
        @endauth
    </div>
    <x-book-list-template  :books="$books"/>
</x-app-layout>
