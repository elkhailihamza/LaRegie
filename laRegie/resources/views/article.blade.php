@extends("layouts.app")

@section("content")

<div class="px-20 py-7">
    <h1 class="text-2xl font-medium">{{$article->article_nom}}</h1>
</div>

<div class="text-center p-10">
    <p>{{$article->description}}</p>
</div>

<div class="fixed bottom-20 right-28">
    <button type="submit" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Réserver</button>
</div>
@stop