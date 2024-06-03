@extends("layouts.app")

@section("content")

<div class="flex justify-between items-center px-12 py-4">
    <div>
        <h2 class="text-slate-300">Groupes</h2>
        <span class="font-medium text-xl">Found: {{$groupes->total()}}</span>
    </div>
    <a href="{{route("groupeCreate")}}" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Create</a>
</div>
<ul>
    @if ($groupes->isEmpty())
    <li class="text-center text-slate-300 font-medium text-2xl">Empty</li>
    @else
    <div class="flex flex-col justify-between py-4 px-20 gap-2">
        @foreach ($groupes as $groupe)
        <div class="p-2 border-2 rounded">
            <h1 class="text-slate-400">{{ucfirst($groupe->metier->metier_nom)}}</h1>
            <div class="px-2">
                <h1>{{$groupe->groupe_nom}}</h1>
                <h1 class="text-slate-600">{{$groupe->created_at->diffForHumans()}}</h1>
            </div>
        </div>
        @endforeach
        <div class="flex justify-end">
            {{ $groupes->links() }}
        </div>
    </div>
    @endif
</ul>
@stop