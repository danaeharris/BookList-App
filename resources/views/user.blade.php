<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="mx-auto w-9/12 h-auto flex flex-row justify-center" style="margin-top: 100px">
    <div class="flex flex-col max-w-max h-auto">
                
            </div>
        <div class="flex flex-col w-1/2 pl-10 justify-center items-">
            <p>User: {{ $name }}</p>
            <br/>
            <hr/>
            <br/>
            @foreach ($books as $book)
            <p><a class="font-karla text-gray-700" href="/book/{{$book["open_lib_id"]}}">{{ $book["title"]}}</a>
            </p>
                @endforeach
        </div> 
        
    </div>
</x-app-layout>
