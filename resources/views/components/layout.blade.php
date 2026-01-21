@props(['title' => 'DevBlog']) 

<!doctype html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $title ?? 'DevBlog' }}</title>
<meta name="description" content="A professional developer blog">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code&display=swap" rel="stylesheet">

<meta name="description" content="A simple Livewire POS system">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="absolute inset-0 -z-10 h-full w-full capitalize font-semibold bg-gray-200/50 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:36px_36px]" x-data x-on:click="$dispatch('search:clear-results')">
    
    {{ $slot }}

    <!-- Ionicons -->
    <script type=" module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 
</body>
</html>
