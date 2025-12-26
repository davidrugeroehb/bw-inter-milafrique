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
         <header class="bg-blue-800 text-white shadow-lg">
            <div class="container mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center gap-6">
                    <img src="{{ asset('fotos/bwfotologo.png') }}" alt="Logo" class="h-16 w-16 object-contain bg-white rounded-full p-1">
                    <h1 class="text-xl md:text-2xl font-light tracking-[0.3em] text-[#B89431] uppercase">Inter Milafrique</h1>
                </div>

                <nav class="mt-4 md:mt-0 flex gap-6 items-center">
                    <a href="/" class="hover:text-blue-200 transition font-medium">Home</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="hover:text-blue-200 transition font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-white text-blue-800 px-4 py-2 rounded-lg font-bold hover:bg-blue-100 transition">Login</a>

                    @endauth
                </nav>
            </div>
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
