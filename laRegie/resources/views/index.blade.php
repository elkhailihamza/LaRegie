@extends("layouts.app")

@section("content")
<div class="grid gap-10 select-none">
    <div class="px-20 py-10">
        <span>Dashboard</span>
        <h2 class="text-3xl font-regular">Profile:</h2>
        <h2 class="text-center mt-10 font-medium">{{ucfirst(Auth::user()->profile->profile_nom)}}</h2>
    </div>
    <div>
        <div class="border px-40 py-20 rounded bg-gray-50">
            <h2 class="block mb-2 text-xl">Metier:</h2>
            <h2 class="font-medium">{{ucfirst(Auth::user()->metier->metier_nom)}}</h2>
        </div>
    </div>
</div>
@stop