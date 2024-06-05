@extends("layouts.app")

@section("content")

<div class="px-20 py-10 select-none">
    <h2 class="text-slate-300">Groupe Creation</h2>
    <h1 class="text-2xl">Créer un groupe</h1>
</div>
<div class="px-20 py-12">
    <form class="grid gap-32 w-full flex justify-center" method="post" action="{{route('groupes.submit')}}">
        @csrf
        @method('post')
        <div class="grid gap-4 w-96">
            <input name="groupe_nom" autocomplete="off" type="text" max="255" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Group Nom">
            <select name="metier" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded">
                <option selected hidden disabled>Select Métier</option>
                @foreach ($metiers as $metier)
                <option value="{{$metier->id}}">{{$metier->id.'. '.ucfirst($metier->metier_nom)}}</option>
                @endforeach
            </select>
            @if ($errors->has('groupe_nom') || $errors->has('metier'))
            <div class="grid bg-red-600 w-full text-white p-2 select-none">
                @if ($errors->has('groupe_nom'))
                <li>{{ $errors->first('groupe_nom') }}</li>
                @endif
                @if ($errors->has('metier'))
                <li>{{ $errors->first('metier') }}</li>
                @endif
            </div>
            @endif
        </div>
        <div class="fixed bottom-20 right-28">
            <button type="submit" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Create</button>
        </div>
    </form>
</div>
@stop