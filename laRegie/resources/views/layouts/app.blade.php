<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>LaRégie</title>
</head>

<body>
    @include('components.navbar')
    @include('components.sidebar')
    <main class="w-full pl-64 pr-4 py-2">
        @yield('content')
    </main>
</body>

</html>