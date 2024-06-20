@extends("layouts.app")

@section("content")

<div class="px-20 py-10 select-none">
    <h2 class="text-slate-300">Article Creation</h2>
    <h1 class="text-2xl">Créer une Article</h1>
</div>
<div class="px-20 py-12">
    <form class="grid gap-32 w-full flex justify-center" method="post" action="{{route('articles.update', $selectedArticle)}}">
        @csrf
        @method('put')
        <div class="grid gap-4 w-96">
            <input name="article_nom" value="{{$selectedArticle->article_nom}}" autocomplete="off" type="text" max="255" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Article Nom">
            <textarea name="description" class="w-full resize-none h-40 transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" max="255" placeholder="Article Description">{{$selectedArticle->description}}</textarea>
            @if ($errors->has('article_nom') || $errors->has('description') || $errors->has('famille'))
            <div class="grid bg-red-600 w-full text-white p-2 select-none">
                @if ($errors->has('article_nom'))
                <li>{{ $errors->first('article_nom') }}</li>
                @endif
                @if ($errors->has('description'))
                <li>{{ $errors->first('description') }}</li>
                @endif
                @if ($errors->has('famille'))
                <li>{{ $errors->first('famille') }}</li>
                @endif
            </div>
            @endif
        </div>
        <div class="fixed flex justify-between bottom-20 right-28">
            @include('components.modal')
        </div>
    </form>
    @if(session('error'))
    <div>
        {{ session('error') }}
    </div>
    @endif

</div>
@stop