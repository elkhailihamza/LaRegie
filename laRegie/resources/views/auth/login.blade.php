@extends('auth.layouts.reg')

@section('content')

<main class="flex justify-center items-center">
  <div class="w-80 rounded-md shadow-sm border-2 border-gray-200 bg-white">
    <h1 class="p-5 font-medium text-xl border-b text-center">Login</h1>
    <form action="{{route("login")}}" method="post" class="grid gap-4 px-4 py-6">
      @csrf
      @method("POST")
      @if ($errors->has('credentials'))
      <div class="bg-red-600 w-full text-white p-2">{{ $errors->first('credentials') }}</div>
      @endif
      <div class="w-full">
        <input type="email" value="{{old("email")}}" name="email" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Email">
        @if ($errors->has('email'))
        <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="w-full">
        <input type="password" name="mot_de_pass" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Password">
        @if ($errors->has('mot_de_pass'))
        <span class="block bg-red-600 text-sm w-full p-1 text-white">{{ $errors->first('mot_de_pass') }}</span>
        @endif
      </div>
      <div class="mt-3 text-center">
        <button type="submit" class="bg-blue-700 px-4 py-2 rounded-md text-white">Login</button>
      </div>
    </form>
  </div>
</main>

@stop