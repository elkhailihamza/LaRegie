@extends("layouts.app")

@section("content")

<div class="flex justify-between items-center px-12 py-4">
    <div>
        <div class="flex items-center gap-2 select-none">
            <svg class="flex-shrink-0 w-5 h-5 stroke stroke-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="8" y1="6" x2="21" y2="6"></line>
                <line x1="8" y1="12" x2="21" y2="12"></line>
                <line x1="8" y1="18" x2="21" y2="18"></line>
                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                <line x1="3" y1="18" x2="3.01" y2="18"></line>
            </svg>
            <h2 class="text-slate-400">Familles</h2>
        </div>
        <span class="font-medium text-xl">Found: {{$familles->count()}}</span>
    </div>
    @if(Auth::user()->profile_id != 1)
    <a href="{{route("familles.create")}}" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Create</a>
    @endif
</div>
<ul>
    @if ($familles->isEmpty())
    <li class="text-center text-slate-300 font-medium text-2xl">Empty</li>
    @else
    <div class="flex flex-col justify-between py-4 px-20 gap-2">
        @foreach ($familles as $famille)
        <div class="p-2 border-2 rounded">
            <h1 class="text-slate-400">{{ucfirst($famille->groupe->groupe_nom)}}</h1>
            <div class="px-2">
                <h1 class="">{{$famille->famille_nom}}</h1>
                <h1 class="text-slate-600">{{$famille->created_at->diffForHumans()}}</h1>
            </div>
        </div>
        @endforeach
        <div class="flex justify-end">
            {{ $familles->links() }}
        </div>
    </div>
    @endif
</ul>
@stop