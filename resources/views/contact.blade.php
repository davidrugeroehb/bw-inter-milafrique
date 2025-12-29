<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Inter Milafrique</title>
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
                            <a href="/spelers" class="text-[#B89431] font-medium hover:opacity-70 transition">Team</a>
                            <a href="/faq" class="text-[#B89431] font-medium hover:opacity-70 transition">FAQ</a>
                            <a href="/contact" class="text-[#B89431] font-bold border-b-2 border-[#B89431] transition">Contact</a>

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
            <div class="max-w-2xl mx-auto">
                <h2 class="text-3xl font-light tracking-widest uppercase text-center my-12 text-slate-800">Neem contact op</h2>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white p-8 rounded-lg shadow">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Naam
                            </label>
                            <input type="text" name="name" id="name" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input type="email" name="email" id="email" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                                Onderwerp
                            </label>
                            <input type="text" name="subject" id="subject"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('subject') }}">
                            @error('subject')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                                Bericht
                            </label>
                            <textarea name="message" id="message" rows="6" required
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">
                                Verstuur Bericht
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>


        <footer class="bg-gray-800 text-white p-6 mt-12">
            <div class="container mx-auto text-center">
                <p>&copy;Inter Milafrique</p>
            </div>
        </footer>
    </div>
</body>
</html>
