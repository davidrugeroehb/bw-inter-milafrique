<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ons Team - Inter Milafrique</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">
    <div class="min-h-screen bg-gray-100">

        <header class="bg-white shadow-sm border-b border-gray-100">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">

                <div class="flex items-center gap-6">
                    <img src="{{ asset('fotos/bwfotologo.png') }}" alt="Logo" class="h-14 w-14 object-contain rounded-xl shadow-sm">

                    <h1 class="text-xl md:text-2xl font-light tracking-[0.3em] text-[#B89431] uppercase">
                        Inter Milafrique
                    </h1>
                </div>

                <nav class="flex items-center gap-6">
                    <a href="/" class="text-[#B89431] font-medium hover:opacity-70 transition">Home</a>
                    <a href="/spelers" class="text-[#B89431] font-bold border-b-2 border-[#B89431] transition">Team</a>
                    <a href="/faq" class="text-[#B89431] font-medium hover:opacity-70 transition">FAQ</a>

                    @auth
                        <a href="{{ route('dashboard') }}" class="text-[#B89431] font-medium hover:opacity-70">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-[#120B1E] text-[#B89431] px-6 py-2 rounded-lg font-medium shadow-md hover:bg-black transition">
                            Login
                        </a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="container mx-auto p-6">
            <h2 class="text-3xl font-light tracking-widest uppercase text-center mb-12 text-slate-800">
                Ons Team
            </h2>

            @if($spelers->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($spelers as $speler)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100 hover:shadow-2xl transition-shadow duration-300">

                            <div class="bg-gradient-to-br from-[#120B1E] to-[#2D1B47] p-8 text-center relative">
                                @if($speler->profile_photo)
                                    <img src="{{ asset('storage/' . $speler->profile_photo) }}"
                                         alt="{{ $speler->name }}"
                                         class="w-32 h-32 rounded-full mx-auto border-4 border-[#B89431] object-cover shadow-lg">
                                @else
                                    <div class="w-32 h-32 rounded-full mx-auto border-4 border-[#B89431] bg-slate-700 flex items-center justify-center text-4xl font-bold text-[#B89431]">
                                        {{ substr($speler->name, 0, 1) }}
                                    </div>
                                @endif

                                @if($speler->jersey_number)
                                    <div class="absolute top-4 right-6 text-[#B89431] text-4xl font-black opacity-40 italic">#{{ $speler->jersey_number }}</div>
                                @endif
                            </div>

                            <div class="p-8 text-center">
                                <h3 class="text-2xl font-bold text-slate-900 mb-1">
                                    {{ $speler->username ?? $speler->name }}
                                </h3>

                                @if($speler->position)
                                    <p class="text-[#B89431] font-bold uppercase tracking-widest text-xs mb-4">{{ $speler->position }}</p>
                                @endif

                                @if($speler->bio)
                                    <p class="text-slate-500 text-sm mb-6 italic">"{{ Str::limit($speler->bio, 80) }}"</p>
                                @endif

                                <a href="{{ route('profile.show', $speler) }}"
                                   class="inline-block bg-[#B89431] text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-[#967928] transition shadow-md">
                                    Bekijk Profiel
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-dashed border-slate-300">
                    <p class="text-slate-400 font-medium">Nog geen spelers met profielinformatie beschikbaar.</p>
                </div>
            @endif
        </main>


    </div>
</body>
</html>
