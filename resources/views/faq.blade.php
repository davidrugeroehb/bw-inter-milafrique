<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Inter Milafrique</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">

        <header class="bg-blue-600 text-white p-6">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold">Inter Milafrique - FAQ</h1>
                <nav class="mt-4">
                    <a href="/" class="mr-4 hover:underline">Home</a>
                    <a href="/faq" class="mr-4 hover:underline">FAQ</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="mr-4 hover:underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="mr-4 hover:underline">Login</a>
                    @endauth
                </nav>
            </div>
        </header>


        <main class="container mx-auto p-6">
            <h2 class="text-2xl font-bold mb-6">Veelgestelde Vragen</h2>

            @if($categories->count() > 0)
                @foreach($categories as $category)
                    @if($category->faqs->count() > 0)
                        <div class="mb-8">
                            <h3 class="text-xl font-bold mb-4 text-blue-600">{{ $category->name }}</h3>

                            <div class="space-y-4">
                                @foreach($category->faqs as $faq)
                                    <div class="bg-white p-6 rounded-lg shadow">
                                        <h4 class="font-bold text-lg mb-2">{{ $faq->question }}</h4>
                                        <p class="text-gray-700">{{ $faq->answer }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <p class="text-gray-500">Nog geen FAQ items beschikbaar.</p>
            @endif
        </main>


        <footer class="bg-gray-800 text-white p-6 mt-12">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 Inter Milafrique. Alle rechten voorbehouden.</p>
            </div>
        </footer>
    </div>
</body>
</html>
