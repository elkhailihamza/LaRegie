@extends("layouts.app")

@section("content")

<div class="px-20 py-10 select-none">
    <h2 class="text-slate-300">Famille Creation</h2>
    <h1 class="text-2xl">Créer une Famille</h1>
</div>
<div class="px-20 py-12">
    <form class="grid gap-32 w-full flex justify-center" method="post" action="{{route('familles.update', $famille->id)}}">
        @csrf
        @method('put')
        <div class="grid gap-4 w-96">
            <input name="famille_nom" value="{{$famille->famille_nom}}" autocomplete="off" type="text" max="255" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Famille Nom">
            <select name="groupe" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded">
                <option value="{{$famille->groupe_id}}" selected hidden>{{$famille->groupe_id .'. '. ucfirst($famille->groupe->groupe_nom)}}</option>
                @foreach ($groupes as $groupe)
                <option value="{{$groupe->id}}">{{$groupe->id .'. '. ucfirst($groupe->groupe_nom)}}</option>
                @endforeach
            </select>
            @if ($errors->has('Famille_nom') || $errors->has('groupe'))
            <div class="grid bg-red-600 w-full text-white p-2 select-none">
                @if ($errors->has('Famille_nom'))
                <li>{{ $errors->first('Famille_nom') }}</li>
                @endif
                @if ($errors->has('groupe'))
                <li>{{ $errors->first('groupe') }}</li>
                @endif
            </div>
            @endif
        </div>
        <div class="fixed bottom-20 right-28">
            <button type="submit" class="px-6 py-2 bg-green-700 rounded text-white">Update</button>
        </div>
    </form>
</div>
@stop