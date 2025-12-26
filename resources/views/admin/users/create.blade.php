<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe Gebruiker Aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.users.store') }}" method="POST">
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

                        <!-- Wachtwoord -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Wachtwoord * (min. 8 karakters)
                            </label>
                            <input type="password" name="password" id="password" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                            @error('password')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Wachtwoord Bevestigen -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                                Bevestig Wachtwoord *
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                        </div>

                        <!-- Admin Checkbox -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_admin" value="1" class="mr-2" {{ old('is_admin') ? 'checked' : '' }}>
                                <span class="text-gray-700 text-sm font-bold">Maak deze gebruiker admin</span>
                            </label>
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Gebruiker Aanmaken
                            </button>
                            <a href="{{ route('admin.users.index') }}"
                               class="text-gray-600 hover:text-gray-900">
                                Annuleren
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
