<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Admin</title>
</head>
<body class="h-full">

    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        <x-admin-navbar></x-admin-navbar>

        <x-admin-sidebar></x-admin-sidebar>

        <main class="p-4 md:ml-64 h-auto pt-20">
            {{ $slot }}
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
