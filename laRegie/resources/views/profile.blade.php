@extends("layouts.app")

@section("content")
<div class="grid gap-10 select-none">
    <div class="px-20 py-7 border-b-2">
        <span>Dashboard</span>
        <h2 class="text-3xl font-regular">Profile:</h2>
        <div class="ms-10 mt-3">
            <h2><span class="font-medium">Prenom:</span> {{ucfirst(Auth::user()->prenom)}}</h2>
            <h2><span class="font-medium">Nom:</span> {{ucfirst(Auth::user()->nom)}}</h2>
            <h2><span class="font-medium">Email:</span> {{ucfirst(Auth::user()->email)}}</h2>
            <h2><span class="font-medium">Role:</span> {{ucfirst(Auth::user()->profile->profile_nom)}}</h2>
            <h2><span class="font-medium">Métier:</span> {{ucfirst(Auth::user()->metier->metier_nom)}}</h2>
            <h2><span class="font-medium">Created at:</span> {{ucfirst(Auth::user()->created_at->diffForHumans())}}</h2>
            <h2><span class="font-medium">Updated at:</span> {{ucfirst(Auth::user()->updated_at->diffForHumans())}}</h2>
        </div>
    </div>

    <div class="px-16">
        <h2 class="text-slate-300">Info</h2>
        <h2 class="text-xl font-medium">Changer les informations</h2>
    </div>

    <main class="flex flex-col gap-4 justify-center items-center">
        <div class="w-[500px]">
            <form action="{{route("profile.update")}}" method="post" class="grid gap-4 px-4">
                @csrf
                @method("put")
                @if ($errors->has('credentials'))
                <div class="bg-red-600 w-full text-white p-2">{{ $errors->first('credentials') }}</div>
                @endif
                <div class="w-full flex gap-4">
                    <div class="w-full">
                        <input type="text" value="{{Auth::user()->nom}}" name="nom" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Nom">
                        @if ($errors->has('nom'))
                        <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('nom') }}</span>
                        @endif
                    </div>
                    <div class="w-full">
                        <input type="text" value="{{Auth::user()->prenom}}" name="prenom" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Prenom">
                        @if ($errors->has('prenom'))
                        <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('prenom') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button type="submit" class="bg-green-600 px-4 py-2 rounded-md text-white">Mise à jour</button>
                </div>
            </form>
        </div>
    </main>

    @stop