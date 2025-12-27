<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->username ?? $user->name }} - Inter Milafrique</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50">
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
                    <a href="/spelers" class="text-[#B89431] font-medium hover:opacity-70 transition">Team</a>
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

        <main class="container mx-auto p-6 text-slate-800">
            <div class="max-w-4xl mx-auto mt-8">
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-slate-200">

                    <div class="bg-slate-700 p-10 text-white">
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="relative">
                                @if($user->profile_photo)
                                    <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                         alt="{{ $user->name }}"
                                         class="w-32 h-32 rounded-full border-4 border-[#B89431] object-cover shadow-lg">
                                @else
                                    <div class="w-32 h-32 rounded-full border-4 border-[#B89431] bg-slate-500 flex items-center justify-center text-5xl font-bold text-[#B89431]">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>

                            <div class="text-center md:text-left">
                                <div class="flex items-center justify-center md:justify-start gap-4">
                                    <h2 class="text-4xl font-bold tracking-tight">{{ $user->username ?? $user->name }}</h2>
                                    @if($user->jersey_number)
                                        <span class="bg-[#B89431] text-[#120B1E] px-3 py-1 rounded-md font-black text-xl shadow-sm">
                                            #{{ $user->jersey_number }}
                                        </span>
                                    @endif
                                </div>
                                @if($user->position)
                                    <p class="text-[#B89431] text-lg mt-2 font-bold uppercase tracking-widest">{{ $user->position }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="p-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                @if($user->bio)
                                    <div class="mb-8">
                                        <h3 class="text-[#B89431] text-xs font-bold uppercase tracking-widest mb-3">Over mij</h3>
                                        <p class="text-slate-600 leading-relaxed">{{ $user->bio }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-6">
                                @if($user->birthday)
                                    <div class="border-l-2 border-[#B89431]/30 pl-4">
                                        <h3 class="text-slate-400 text-xs font-bold uppercase tracking-wider">Verjaardag</h3>
                                        <p class="text-slate-900 font-semibold">{{ $user->birthday->format('d/m/Y') }}</p>
                                    </div>
                                @endif

                                @if($user->email)
                                    <div class="border-l-2 border-[#B89431]/30 pl-4">
                                        <h3 class="text-slate-400 text-xs font-bold uppercase tracking-wider">Contact E-mail</h3>
                                        <p class="text-slate-900 font-semibold">{{ $user->email }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @auth
                            @if(auth()->id() === $user->id)
                                <div class="mt-12 pt-8 border-t border-slate-100">
                                    <a href="{{ route('profile.edit.details') }}"
                                       class="inline-block bg-[#120B1E] text-[#B89431] font-bold py-2 px-8 rounded-lg shadow-sm hover:bg-black transition duration-300">
                                        Profiel Bewerken
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
