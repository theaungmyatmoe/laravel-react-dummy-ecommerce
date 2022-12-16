<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    @vite(['resources/js/main.jsx'])
</head>
<body>
<x-nav-bar/>
<main class="flex">
    <x-side-bar/>
    <div class="container mx-auto md:px-20 md:py-10">
        @yield('content')
    </div>
</main>


@if(session()->has('success'))

    <script>
        Toastify({
            text: "{{ session()->get('success') }}",
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            className: "bg-green-600",
            onClick: function () {
            } // Callback after click
        }).showToast();

    </script>
@endif


@if(session()->has('error'))

    <script>
        Toastify({
            text: "{{ session()->get('error') }}",
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            className: "bg-green-600",
            onClick: function () {
            } // Callback after click
        }).showToast();

    </script>
@endif
</body>
</html>
