@extends("layouts.app")

@section("content")

<div class="flex justify-between items-center px-12 py-4">
    <div>
        <h2 class="text-slate-300">Utilisateurs</h2>
        <span class="font-medium text-xl">Found: {{$users->total()}}</span>
    </div>
    <a href="{{route("users.create")}}" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">
        Enregistrer un nouvel utilisateur</a>
</div>
<ul>
    @if ($users->isEmpty())
    <li class="text-center text-slate-300 font-medium text-2xl">Empty</li>
    @else
    <div class="flex flex-col justify-between py-4 px-20 gap-2">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Prenom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Métier
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Profile
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
                    @foreach ($users as $user)
                    <tr class="bg-white border-b hover:bg-gray-100 transition-all">
                        <td class="px-6 py-4">
                            {{$user->prenom}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->nom}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{ucfirst($user->metier->metier_nom)}}
                        </td>
                        <td class="px-6 py-4">
                            {{ucfirst($user->profile->profile_nom)}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->created_at->diffForHumans()}}
                        </td>
                        @if ($user->id != Auth::user()->id)
                        <td class="px-6 py-4 flex justify-around">
                            <a href="{{route('users.edit', $user->id)}}" class="bg-green-600 p-[5px] rounded-md">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                    <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                                </svg>
                            </a>
                            <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('delete')
                                <button class="bg-red-600 p-[5px] rounded-md"><svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                                        <line x1="18" y1="9" x2="12" y2="15"></line>
                                        <line x1="12" y1="9" x2="18" y2="15"></line>
                                    </svg></button>
                            </form>
                        </td>
                        @else
                        <td class="px-6 py-4">
                            <h2>Not Available</h2>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-end">
            {{ $users->links() }}
        </div>
    </div>
    @endif
</ul>
@stop