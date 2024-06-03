@extends("layouts.app")

@section("content")

<div class="flex justify-between items-center px-12 py-4">
    <div>
        <div class="flex gap-2 items-center">
            <svg class="flex-shrink-0 w-5 h-5 stroke stroke-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 3h18v18H3zM21 9H3M21 15H3M12 3v18" />
            </svg>
            <h2 class="text-slate-400">Groupes</h2>
        </div>
        <span class="font-medium text-xl">Found: {{$groupes->total()}}</span>
    </div>
    @if(Auth::user()->profile_id != 1)
    <a href="{{route("groupeCreate")}}" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Create</a>
    @endif
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