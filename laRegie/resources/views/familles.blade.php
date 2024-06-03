@extends("layouts.app")

@section("content")

<div class="flex justify-between items-center px-12 py-4">
    <div>
        <h2 class="text-slate-300">Familles</h2>
        <span class="font-medium text-xl">Found: {{$familles->count()}}</span>
    </div>
    v
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