<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Welkom, {{ auth()->user()->name }}!</h3>

                    <div class="mb-6">
                        <a href="{{ route('profile.edit.details') }}" class="text-blue-600 hover:text-blue-900 mr-4">
                            Mijn Profiel Bewerken
                        </a>
                        <a href="{{ route('profile.show', auth()->user()) }}" class="text-blue-600 hover:text-blue-900">
                            Mijn Profiel Bekijken
                        </a>
                    </div>

                    @if(auth()->user()->is_admin)
                        <div class="mb-4">
                            <h4 class="font-semibold mb-2">Admin Functies:</h4>
                            <ul class="list-disc list-inside space-y-2">
                                <li>
                                    <a href="{{ route('admin.nieuws.index') }}" class="text-blue-600 hover:text-blue-900">
                                        Nieuws Beheren
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.categories.index') }}" class="text-blue-600 hover:text-blue-900">
                                        Categorieën Beheren
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.faqs.index') }}" class="text-blue-600 hover:text-blue-900">
                                        FAQ Beheren
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-900">
                                        Gebruikers Beheren
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <p>Ingelogd!.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
