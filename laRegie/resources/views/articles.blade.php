@extends("layouts.app")

@section("content")

<div class="flex justify-between items-center px-12 py-4">
    <div>
        <div class="flex items-center gap-2 select-none">
            <svg class="flex-shrink-0 w-5 h-5 stroke stroke-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
            </svg>
            <h2 class="text-slate-400">Articles</h2>
        </div>
        <span class="font-medium text-xl">Found: {{$articles->total()}}</span>
    </div>
    @if(Auth::user()->profile_id != 1)
    <a href="{{route("articleCreate")}}" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Create</a>
    @endif
</div>
<ul>
    @if ($articles->isEmpty())
    <li class="text-center text-slate-300 font-medium text-2xl">Empty</li>
    @else
    <div class="flex flex-col justify-between py-4 px-20 gap-2">
        @foreach ($articles as $article)
        <div class="p-2 border-2 rounded">
            @foreach ($article->familles as $famille)
            <h1 class="text-slate-400">{{$famille->famille_nom}}</h1>
            @endforeach
            <div class="px-2">
                <h1 class="">{{$article->famille_nom}}</h1>
                <h1 class="text-slate-600">{{$article->created_at->diffForHumans()}}</h1>
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