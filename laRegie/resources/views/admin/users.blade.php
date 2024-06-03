@extends("layouts.app")

@section("content")

<div class="flex justify-between items-center px-12 py-4">
    <div>
        <h2 class="text-slate-300">Utilisateurs</h2>
        <span class="font-medium text-xl">Found: {{$users->total()}}</span>
    </div>
    <a href="{{route("registerPage")}}" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">
        Enregistrer un nouvel utilisateur</a>
</div>
<ul>
    @if ($users->isEmpty())
    <li class="text-center text-slate-300 font-medium text-2xl">Empty</li>
    @else
    <div class="flex flex-col justify-between py-4 px-20 gap-2">
        @foreach ($users as $user)
        <div class="p-2 border-2 rounded">
            <div class="flex justify-between px-1">
                <h1 class="text-slate-400 font-medium">{{ucfirst($user->profile->profile_nom)}}</h1>
                <h1 class="text-slate-500">{{'Métier: '. ucfirst($user->metier->metier_nom)}}</h1>
            </div>
            <div class="ps-2">
                <h1>{{$user->nom.' '.$user->prenom}}</h1>
                <div class="flex justify-between px-2">
                    <h1 class="text-slate-600">{{$user->created_at->diffForHumans()}}</h1>
                    <div class="flex items-center gap-2">
                        <a href="" class="p-2 bg-green-600 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                            </svg></a>
                        <form action="">
                            <button type="submit" class="p-2 bg-red-600 rounded-md"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                                    <line x1="18" y1="9" x2="12" y2="15"></line>
                                    <line x1="12" y1="9" x2="18" y2="15"></line>
                                </svg></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="flex justify-end">
            {{ $users->links() }}
        </div>
    </div>
    @endif
</ul>
@stop