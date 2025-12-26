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
        <!-- Header -->
        <header class="bg-blue-600 text-white p-6">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold">Inter Milafrique</h1>
                <nav class="mt-4">
                    <a href="/" class="mr-4 hover:underline">Home</a>
                    <a href="/faq" class="mr-4 hover:underline">FAQ</a>
                    <a href="/contact" class="mr-4 hover:underline">Contact</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="mr-4 hover:underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="mr-4 hover:underline">Login</a>
                    @endauth
                </nav>
            </div>
        </header>

        <!-- Contact Form -->
        <main class="container mx-auto p-6">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold mb-6">Neem contact op</h2>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white p-8 rounded-lg shadow">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                        <!-- Naam -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Naam *
                            </label>
                            <input type="text" name="name" id="name" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email *
                            </label>
                            <input type="email" name="email" id="email" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Onderwerp -->
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

                        <!-- Bericht -->
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                                Bericht *
                            </label>
                            <textarea name="message" id="message" rows="6" required
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit -->
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

        <!-- Footer -->
        <footer class="bg-gray-800 text-white p-6 mt-12">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 Inter Milafrique. Alle rechten voorbehouden.</p>
            </div>
        </footer>
    </div>
</body>
</html>
