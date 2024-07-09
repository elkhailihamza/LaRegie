@extends("layouts.app")

@section("content")

<div class="pt-20 px-28 flex justify-between">
    <h1 class="text-xl">Métier: {{$article->segment->famille->groupe->metier->metier_nom}}</h1>
    <h1 class="text-xl">Id: {{$article->id}}</h1>
</div>

<div class="mt-4 text-center underline">
    <h1 class="text-3xl font-medium">{{ucfirst($article->article_nom)}}</h1>
</div>

<div class="px-40 py-10 mt-4">
    <h1 class="underline font-medium">Description:</h1>
    <p class="mt-4 p-4">{{$article->description}}</p>
</div>

<div class="fixed bottom-20 right-28">
    <button type="submit" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Réserver</button>
</div>

@stop