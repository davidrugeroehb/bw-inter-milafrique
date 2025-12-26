<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inter Milafrique - Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen bg-gray-100">

        <header class="bg-blue-600 text-white p-6">
            <h1 class="text-3xl font-bold">Inter Milafrique</h1>
            <nav class="mt-4">
                <a href="/" class="mr-4">Home</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="mr-4">Login</a>
                    <a href="{{ route('register') }}">Registreer</a>
                @endauth
            </nav>
        </header>


        <main class="container mx-auto p-6">
            <h2 class="text-2xl font-bold mb-6">Laatste Nieuws</h2>

            @foreach($nieuws as $item)
                <div class="bg-white p-6 rounded-lg shadow mb-4">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover rounded mb-4">
                    @endif
                    <h3 class="text-xl font-bold">{{ $item->title }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}</p>
                    <p>{{ $item->content }}</p>
                </div>
            @endforeach
        </main>
    </div>
</body>
</html>
