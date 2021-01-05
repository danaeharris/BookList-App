@extends("layouts.app")

@section("content")

<div class="input-group mb-3" style="margin-top: 100px">
<input type="text" class="form-control search" value="{{$query}}" placeholder="Search for a book's title e.g. Fellowship of the Ring" aria-label="Search for a book's title" aria-describedby="basic-addon2">
<div class="input-group-append">
      <a class="btn btn-outline-secondary search-link" type="button">Search</a>
    </div>
</div>
<div>
    <p>{{$results["numFound"]}} results found</p>
    @foreach ($results["docs"] as $book)
<a href="/book/{{str_replace("/works/", "", $book["key"])}}">
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            @if (array_key_exists("cover_i", $book))
            <img src="https://covers.openlibrary.org/b/id/{{$book["cover_i"]}}-S.jpg" style="display: block; height: 50px; width: auto; margin-right: 10px"/>
            @endif
            <p>{{$book["title"]}}</p>
        </div>
    </a>
@endforeach

</div>

@endsection