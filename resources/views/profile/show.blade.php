<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->username ?? $user->name }} - Inter Milafrique</title>
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


        <main class="container mx-auto p-6">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">

                    <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-8 text-white">
                        <div class="flex items-center">

                            <div class="mr-6">
                                @if($user->profile_photo)
                                    <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                         alt="{{ $user->name }}"
                                         class="w-32 h-32 rounded-full border-4 border-white object-cover">
                                @else
                                    <div class="w-32 h-32 rounded-full border-4 border-white bg-gray-300 flex items-center justify-center text-4xl font-bold text-gray-600">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>


                            <div>
                                <h2 class="text-3xl font-bold">{{ $user->username ?? $user->name }}</h2>
                                @if($user->position)
                                    <p class="text-xl mt-2">{{ $user->position }}</p>
                                @endif
                                @if($user->jersey_number)
                                    <p class="text-lg mt-1">Rugnummer: #{{ $user->jersey_number }}</p>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="p-8">
                        @if($user->bio)
                            <div class="mb-6">
                                <h3 class="text-xl font-bold mb-2">Over mij</h3>
                                <p class="text-gray-700">{{ $user->bio }}</p>
                            </div>
                        @endif

                        @if($user->birthday)
                            <div class="mb-4">
                                <h3 class="text-lg font-bold mb-1">Verjaardag</h3>
                                <p class="text-gray-700">{{ $user->birthday->format('d/m/Y') }}</p>
                            </div>
                        @endif

                        @if($user->email)
                            <div class="mb-4">
                                <h3 class="text-lg font-bold mb-1">Contact</h3>
                                <p class="text-gray-700">{{ $user->email }}</p>
                            </div>
                        @endif

                        <!-- Edit button (alleen voor eigen profiel) -->
                        @auth
                            @if(auth()->id() === $user->id)
                                <div class="mt-6">
                                    <a href="{{ route('profile.edit.details') }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
