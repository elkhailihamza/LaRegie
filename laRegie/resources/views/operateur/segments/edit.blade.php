@extends("layouts.app")

@section("content")

<div class="px-20 py-10 select-none">
    <h2 class="text-slate-300">Segment Edit</h2>
    <h1 class="text-2xl">Modifier le segment "{{$segment->libelle}}"</h1>
</div>
<div class="px-20 py-12">
    <form class="grid gap-32 w-full flex justify-center" method="post" action="{{route('segments.update', $segment->id)}}">
        @csrf
        @method('put')
        <div class="grid gap-4 w-96">
            <input name="libelle" value="{{$segment->libelle}}" autocomplete="off" type="text" max="255" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Famille Nom">
            <select name="famille" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded">
                <option value="{{$segment->famille_id}}" selected hidden>{{$segment->famille_id .'. '. ucfirst($segment->famille->famille_nom)}}</option>
                @foreach ($familles as $famille)
                <option value="{{$famille->id}}">{{$famille->id .'. '. ucfirst($famille->famille_nom)}}</option>
                @endforeach
            </select>
            @if ($errors->has('libelle') || $errors->has('famille'))
            <div class="grid bg-red-600 w-full text-white p-2 select-none">
                @if ($errors->has('libelle'))
                <li>{{ $errors->first('libelle') }}</li>
                @endif
                @if ($errors->has('famille'))
                <li>{{ $errors->first('famille') }}</li>
                @endif
            </div>
            @endif
        </div>
        <div class="fixed bottom-20 right-28">
            <button type="submit" class="px-6 py-2 bg-green-700 rounded text-white">Mise à jour</button>
        </div>
    </form>
</div>
@stop