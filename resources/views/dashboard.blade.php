<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-gray-100 mb-8">
                <div class="p-8 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2 text-slate-800">Welkom, {{ auth()->user()->name }}!</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8" class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-[#B89431] transition duration-300">
                        <a href="{{ route('profile.show', auth()->user()) }}" class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-[#B89431] transition duration-300">
                            <p class="text-slate-800 font-bold text-lg group-hover:text-[#B89431]">Mijn Profiel Bekijken</p>
                        </a>
                        <a href="{{ route('profile.edit.details') }}" class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-[#B89431] transition duration-300">
                            <p class="text-slate-800 font-bold text-lg group-hover:text-[#B89431]">Profiel Gegevens Bewerken</p>
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
