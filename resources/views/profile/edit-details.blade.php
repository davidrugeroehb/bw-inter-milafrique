<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mijn Profiel Bewerken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update.details') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        @if($user->profile_photo)
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Huidige profielfoto</label>
                                <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                     alt="Profiel"
                                     class="w-32 h-32 rounded-full object-cover">
                            </div>
                        @endif


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="profile_photo">
                                Profielfoto
                            </label>
                            <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                            @error('profile_photo')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Voornaam + Achternaam
                            </label>
                            <input type="text" name="username" id="username"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('username', $user->username) }}"
                                   placeholder="Bv: David, Davido">
                            @error('username')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="birthday">
                                Verjaardag
                            </label>
                            <input type="date" name="birthday" id="birthday"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('birthday', $user->birthday?->format('Y-m-d')) }}">
                            @error('birthday')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="position">
                                Positie
                            </label>
                            <select name="position" id="position"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                                <option value="">-- Selecteer de positie --</option>
                                <option value="Keeper" {{ old('position', $user->position) == 'Keeper' ? 'selected' : '' }}>Keeper</option>
                                <option value="Verdediger" {{ old('position', $user->position) == 'Verdediger' ? 'selected' : '' }}>Verdediger</option>
                                <option value="Middenvelder" {{ old('position', $user->position) == 'Middenvelder' ? 'selected' : '' }}>Middenvelder</option>
                                <option value="Aanvaller" {{ old('position', $user->position) == 'Aanvaller' ? 'selected' : '' }}>Aanvaller</option>
                            </select>
                            @error('position')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="jersey_number">
                                Rugnummer (1-99)
                            </label>
                            <input type="number" name="jersey_number" id="jersey_number" min="1" max="99"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('jersey_number', $user->jersey_number) }}">
                            @error('jersey_number')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="bio">
                                Over mij (max 500 karakters!)
                            </label>
                            <textarea name="bio" id="bio" rows="4" maxlength="500"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                      placeholder="Vertel iets over jezelf">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="flex items-center justify-between">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Opslaan
                            </button>
                            <a href="{{ route('profile.show', auth()->user()) }}"
                               class="text-gray-600 hover:text-gray-900">
                                Bekijk mijn profiel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
