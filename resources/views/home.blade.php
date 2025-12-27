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
         <header class="bg-white shadow-sm border-b border-gray-100">
            <div class="container mx-auto px-6 py-4 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center gap-6">
                    <img src="{{ asset('fotos/bwfotologo.png') }}" alt="Logo" class="h-16 w-16 object-contain bg-white rounded-full p-1">
                    <h1 class="text-xl md:text-2xl font-light tracking-[0.3em] text-[#B89431] uppercase">Inter Milafrique</h1>
                </div>

                <nav class="mt-4 md:mt-0 flex gap-6 items-center">
                    <a href="/" class="text-[#B89431] font-bold border-b-2 border-[#B89431] transition">Home</a>
                    <a href="/spelers" class="text-[#B89431] font-medium hover:opacity-70 transition">Team</a>
                    <a href="/faq" class="text-[#B89431] font-medium hover:opacity-70 transition">FAQ</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-[#B89431] font-medium hover:opacity-70 transition">Dashboard</a>
                    @else

                        <a href="{{ route('login') }}" class="bg-[#120B1E] text-[#B89431] px-6 py-2 rounded-lg font-medium shadow-md hover:bg-black transition">Login</a>


                    @endauth
                </nav>
            </div>
        </header>


        <main class="container mx-auto p-6">
            <h2 class="text-3xl font-light tracking-widest uppercase text-center my-12 text-slate-800">Laatste Nieuws</h2>

            @foreach($nieuws as $item)
                <div class="bg-white p-6 rounded-lg shadow mb-4">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover rounded mb-4">
                    @endif
                    <h3 class="text-xl font-bold">{{ $item->title }}</h3>
                    <div class="flex flex-wrap gap-2 my-3">
                        @foreach($item->tags as $tag)
                            <span class="bg-[#B89431]/10 text-[#B89431] text-[10px] font-bold px-2 py-1 rounded border border-[#B89431]/20 uppercase tracking-widest">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                    <p class="text-gray-600 text-sm mb-2">{{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}</p>
                    <p>{{ $item->content }}</p>
                </div>
            @endforeach
        </main>
    </div>
</body>
</html>
