<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>test</title>
</head>

<body>
    @include('auth.components.navbar')
    @yield('content')
</body>

</html>