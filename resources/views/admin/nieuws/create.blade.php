<!DOCTYPE html>
<html>
<head>
    <title>Nieuws Toevoegen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Nieuw Artikel Toevoegen</h2>
                        <a href="{{ route('admin.nieuws.index') }}" class="text-gray-600 hover:text-gray-900">← Terug</a>
                    </div>

                    <form action="{{ route('admin.nieuws.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Titel -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Titel *
                            </label>
                            <input type="text" name="title" id="title" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('title') }}">
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
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Afbeelding -->
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                Afbeelding (optioneel)
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
                                Publiceren
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
