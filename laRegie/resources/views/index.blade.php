@extends("layouts.app")

@section("content")
<div class="grid gap-10 select-none">
    <div class="px-20 py-10">
        <span class="font-medium text-3xl">Dashboard</span>
        <div class="flex justify-evenly text-center mt-5">
            <div class="flex flex-col p-10 items-around rounded-xl border-2">
                <h1 class="font-medium text-xl">Groupes</h1>
                <h2 class="text-lg">{{$groupes}}</h2>
            </div>
            <div class="flex flex-col p-10 items-around rounded-xl border-2">
                <h1 class="font-medium text-xl">Familles</h1>
                <h2 class="text-lg">{{$familles}}</h2>
            </div>
            <div class="flex flex-col p-10 items-around rounded-xl border-2">
                <h1 class="font-medium text-xl">Segment</h1>
                <h2 class="text-lg">{{$segments}}</h2>
            </div>
            <div class="flex flex-col p-10 items-around rounded-xl   border-2">
                <h1 class="font-medium text-xl">Articles</h1>
                <h2 class="text-lg">{{$articles}}</h2>
            </div>
        </div>
    </div>
    <div>
        <div class="border px-40 py-20 rounded bg-gray-50">
            <h2 class="block mb-2 text-xl">Metier:</h2>
            <h2 class="font-medium">{{ucfirst(Auth::user()->metier->metier_nom)}}</h2>
        </div>
    </div>
</div>
@stop