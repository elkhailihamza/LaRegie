@extends("layouts.app")

@section("content")

<div class="flex justify-end p-3">
    <a href="{{route("groupeCreate")}}" class="px-6 py-2 bg-[#1D4ED8] rounded text-white">Create</a>
</div>
<ul>
    @if ($groups->isEmpty())
    <li>Empty</li>
    @else
    @foreach ($groups as $group)
    <li>{{ $group->name }}</li>
    @endforeach
    @endif
</ul>
@stop