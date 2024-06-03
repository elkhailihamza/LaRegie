<nav class="px-6 py-4 border-b bg-gray-50">
    <div class="flex justify-between items-center">
        <a href="{{route('index')}}">
            @include('svg.larad')
        </a>
        <form action="{{route('logout')}}" method="post">
            @csrf
            @method('post')
            <button type="submit" class="text-white bg-red-600 rounded px-4 py-2">Sign-out</button>
        </form>
    </div>
</nav>