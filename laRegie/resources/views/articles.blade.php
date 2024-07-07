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
        <span class="font-medium text-xl">Found: <span id="articles_found">{{$articles->count()}}</span></span>
    </div>
    @can('HigherAuthView', auth()->user())
    <a href="{{route("articles.create")}}" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Créer</a>
    @endcan
</div>
<ul>
    @if ($articles->isEmpty())
    <li class="text-center text-slate-300 font-medium text-2xl">Empty</li>
    @else
    <div class="flex justify-center items-center gap-5">
        <input type="search" placeholder="Recherche" autocomplete="off" class="border border-black rounded-sm shadow p-2 outline-none w-96" id="search_input">
        <div id="loader" class="hidden top-0 left-0 flex justify-center items-center">
            <img src="{{ asset('assets/loader.gif') }}" alt="Loading..." class="w-10 h-10" />
        </div>
        <a class="p-1.5 rounded bg-blue-700 hover:bg-blue-600 transition-all cursor-pointer" id="search_submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg></a>
    </div>
    <div class="flex flex-col justify-between py-4 px-20 gap-2" id="search_results">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Famille
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Groupe
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Metier
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Controls
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $i => $article)
                    @can('UserMetier', $article->segment->famille->groupe->metier)
                    <tr class="bg-white border-b hover:bg-gray-100 transition-all">
                        <td class="px-6 py-4">
                            {{$i + 1}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->article_nom}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->segment->famille->famille_nom}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->segment->famille->groupe->groupe_nom}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->segment->famille->groupe->metier->metier_nom}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->created_at->diffForHumans()}}
                        </td>
                        <td class="px-6 py-4 flex justify-around">
                            <a href="{{route('article.view', $article->id)}}" class="bg-blue-600 p-[5px] rounded-md" target="_blank">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h5M15 3h6v6M10 14L20.2 3.8" />
                                    </g>
                                </svg>
                            </a>
                            @can('HigherAuthView', auth()->user())
                            <a href="{{route('articles.edit', $article)}}" class="bg-green-600 p-[5px] rounded-md">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                                </svg>
                            </a>
                            <form method="post" action="{{ route('articles.destroy', $article->id) }}">
                                @csrf
                                @method('delete')
                                <button class="bg-red-600 p-[5px] rounded-md"><svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                                        <line x1="18" y1="9" x2="12" y2="15"></line>
                                        <line x1="12" y1="9" x2="18" y2="15"></line>
                                    </svg></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endcan
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-end">
            {{ $articles->links() }}
        </div>
    </div>
    @endif
</ul>
@vite('resources/js/articles/search.js')
@stop