@extends("layouts.app")

@section("content")

<div class="px-16 pt-12">
    <h2 class="text-slate-300">Register</h2>
    <h2 class="text-xl font-medium">Enregistrer un nouvel utilisateur</h2>
</div>

<main class="flex flex-col gap-4 justify-center items-center">
    <div class="w-[500px]">
        <form action="{{route("users.submit")}}" method="post" class="grid gap-4 px-4 py-6">
            @csrf
            @method("POST")
            @if ($errors->has('credentials'))
            <div class="bg-red-600 w-full text-white p-2">{{ $errors->first('credentials') }}</div>
            @endif
            <div class="w-full flex gap-4">
                <div class="w-full">
                    <input type="text" value="{{old("nom")}}" name="nom" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Nom">
                    @if ($errors->has('nom'))
                    <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('nom') }}</span>
                    @endif
                </div>
                <div class="w-full">
                    <input type="text" value="{{old("prenom")}}" name="prenom" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Prenom">
                    @if ($errors->has('prenom'))
                    <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('prenom') }}</span>
                    @endif
                </div>
            </div>
            <div class="w-full">
                <input type="email" value="{{old("email")}}" name="email" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Email">
                @if ($errors->has('email'))
                <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="w-full">
                <div class="flex gap-4">
                    <input type="password" name="password" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Password">
                    <input type="password" name="password_confirmation" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Password Confirmation">
                </div>
                @if ($errors->has('password'))
                <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="w-full">
                <select name="profile" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded">
                    <option selected hidden disabled>Select Profile</option>
                    @foreach ($profiles as $profile)
                    <option value="{{$profile->id}}">{{$profile->id.'. '.ucfirst($profile->profile_nom)}}</option>
                    @endforeach
                </select>
                @if ($errors->has('profile'))
                <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('profile') }}</span>
                @endif
            </div>
            <div class="w-full">
                <select name="metier" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded">
                    <option selected hidden disabled>Select Métier</option>
                    @foreach ($metiers as $metier)
                    <option value="{{$metier->id}}">{{$metier->id.'. '.ucfirst($metier->metier_nom)}}</option>
                    @endforeach
                </select>
                @if ($errors->has('metier'))
                <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('metier') }}</span>
                @endif
            </div>
            <div class="mt-3 text-center">
                <button type="submit" class="bg-blue-700 px-4 py-2 rounded-md text-white">Crée</button>
            </div>
        </form>
    </div>
</main>

@stop