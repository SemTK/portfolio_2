<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<header>
    @include('components.header')
</header>
<body class="bg-gray-300 text-gray-900">
    <div>
        @yield('content')
    </div>
</body>
</html>
