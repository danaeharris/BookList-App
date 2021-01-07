<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="mx-auto w-9/12 h-auto flex flex-row justify-center" style="margin-top: 100px">
          
        <div class="flex flex-col w-1/2 pl-10 justify-center items-">
            <h2 class="text-xl font-semibold font-karla text-gray-600 py-4">{{$author["name"]}}</h2>
               
                <br/>
                <hr/>
                <br/>
                <p class="font-karla text-gray-700">Books:</p>
            
    
                @foreach ($books as $book)
                <a class="font-karla font-semibold text-gray-700" href="/book/{{$book["open_lib_id"]}}">{{ $book["title"]}}</a>
                @endforeach
                <br/>
                <hr/>
                <br/>
                
            </a>
        </div>
    </div>
</x-app-layout>
