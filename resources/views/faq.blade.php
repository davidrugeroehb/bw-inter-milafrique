<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Inter Milafrique</title>
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
                    <a href="/spelers" class="text-[#B89431] font-medium hover:opacity-70 transition">Team</a>
                    <a href="/faq" class="text-[#B89431] font-bold border-b-2 border-[#B89431] transition">FAQ</a>
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

        <main class="container mx-auto p-6 max-w-4xl">
            <h2 class="text-3xl font-light tracking-widest uppercase text-center my-12 text-slate-800">
                FAQ
            </h2>

            @if($categories->count() > 0)
                @foreach($categories as $category)
                    @if($category->faqs->count() > 0)
                        <div class="mb-12">
                            <h3 class="text-xl font-bold mb-6 text-[#B89431] border-l-4 border-[#B89431] pl-4 uppercase tracking-wider">
                                {{ $category->name }}
                            </h3>

                            <div class="space-y-4">
                                @foreach($category->faqs as $faq)
                                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
                                        <h4 class="font-bold text-lg mb-3 text-slate-900">{{ $faq->question }}</h4>
                                        <p class="text-slate-600 leading-relaxed">{{ $faq->answer }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <p class="text-center text-slate-400">Nog geen FAQ items beschikbaar.</p>
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
