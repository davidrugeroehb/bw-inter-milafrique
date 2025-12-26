<!DOCTYPE html>
<html>
<head>
    <title>Nieuws Bewerken</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Artikel Bewerken</h2>
                        <a href="{{ route('admin.nieuws.index') }}" class="text-gray-600 hover:text-gray-900">← Terug</a>
                    </div>

                    <form action="{{ route('admin.nieuws.update', $nieuws) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Titel -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Titel *
                            </label>
                            <input type="text" name="title" id="title" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('title', $nieuws->title) }}">
                            @error('title')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                                Inhoud *
                            </label>
                            <textarea name="content" id="content" rows="8" required
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content', $nieuws->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Huidige afbeelding -->
                        @if($nieuws->image)
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Huidige afbeelding</label>
                                <img src="{{ asset('storage/' . $nieuws->image) }}" alt="{{ $nieuws->title }}" class="max-w-xs rounded">
                            </div>
                        @endif

                        <!-- Nieuwe afbeelding -->
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                Nieuwe afbeelding (optioneel)
                            </label>
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                            @error('image')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Opslaan
                            </button>
                            <a href="{{ route('admin.nieuws.index') }}"
                               class="text-gray-600 hover:text-gray-900">
                                Annuleren
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
