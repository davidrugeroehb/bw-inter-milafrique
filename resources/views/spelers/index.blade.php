<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ons Team - Inter Milafrique</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">

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
                    <a href="/contact" class="text-[#B89431] font-medium hover:opacity-70 transition">Contact</a>

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
            <h2 class="text-3xl font-light tracking-widest uppercase text-center my-12 text-slate-800">
                Ons Team
            </h2>

            @if($spelers->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($spelers as $speler)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition">

                            @if($speler->profile_photo)

                                    <img src="{{ asset('storage/' . $speler->profile_photo) }}"
                                         alt="{{ $speler->name }}"
                                         class="w-28 h-28 rounded-full mx-auto border-4 border-[#B89431] object-cover shadow-sm">
                                @else

                                    <img src="{{ asset('fotos/personlogo.png') }}"
                                         alt="Standaard profielfoto"
                                         class="w-28 h-28 rounded-full mx-auto border-4 border-[#B89431] object-cover bg-slate-500 shadow-sm">
                                @endif

                            <div class="p-6 text-center">
                                <div class="flex items-center justify-center gap-2 mb-2">
                                    <h3 class="text-2xl font-bold text-slate-900">
                                        {{ $speler->username ?? $speler->name }}
                                    </h3>
                                    @if($speler->jersey_number)
                                        <span class="bg-[#B89431]/20 text-[#B89431] px-2 py-0.5 rounded text-sm font-bold border border-[#B89431]/30">
                                            #{{ $speler->jersey_number }}
                                        </span>
                                    @endif
                                </div>

                                @if($speler->position)
                                    <p class="text-[#B89431] font-bold uppercase tracking-widest text-[10px] mb-4">{{ $speler->position }}</p>
                                @endif

                                @if($speler->bio)
                                    <p class="text-slate-500 text-sm mb-6 italic">"{{ Str::limit($speler->bio, 80) }}"</p>
                                @endif

                                <a href="{{ route('profile.show', $speler) }}"
                                   class="inline-block bg-[#120B1E] text-[#B89431] px-6 py-2 rounded-lg font-bold text-sm hover:bg-black transition shadow-sm border border-[#B89431]/50">
                                    Bekijk Profiel
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white rounded-xl shadow-sm border border-dashed border-gray-300">
                    <p class="text-gray-400">Geen teamleden gevonden.</p>
                </div>
            @endif
        </main>


    </div>
    <footer class="bg-[#120B1E] text-[#B89431] py-8 mt-20 border-t border-[#B89431]/20">
        <div class="container mx-auto text-center">
            <p>&copy;Inter Milafrique</p>
        </div>
    </footer>
</body>
</html>
