@extends('auth.layouts.reg')

@section('content')

<main class="relative flex justify-center items-center px-4">
  <div class="flex justify-center align-items-center">
    <div class="w-80 h-80 rounded-md shadow-sm border-2 border-gray-200 text-center bg-white">
      <h1 class="p-5 font-medium text-xl border-b">Login</h1>
      <form action="" method="post" class="grid gap-4 px-4 py-10">
        <input type="text" name="email" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Email">
        <input type="password" name="mot_de_pass" autocomplete="off" class="w-full transition-all border border-gray-300 p-2.5 outline-none focus:shadow-sm hover:border-slate-400 focus:border-slate-600 rounded" placeholder="Password">
        <div class="mt-3">
          <button type="submit" class="bg-blue-700 px-4 py-2 rounded-md text-white">Login</button>
        </div>
      </form>
    </div>
    
  </div>
</main>

@stop