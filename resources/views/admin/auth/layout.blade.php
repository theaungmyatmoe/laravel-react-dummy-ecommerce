<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    @vite(['resources/js/main.jsx'])
</head>
<body>
<main class="">
    <div class="container mx-auto md:px-20 md:py-10">
        @yield('content')
    </div>
</main>
</body>
</html>
