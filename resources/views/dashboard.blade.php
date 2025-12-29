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
                        <div class="mt-12">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="h-px flex-1 bg-gray-200"></div>
                                    <h4 class="text-xl font-bold text-slate-800 uppercase tracking-wide">Admin functies</h4>
                                <div class="h-px flex-1 bg-gray-200"></div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                <a href="{{ route('admin.nieuws.index') }}" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300 flex flex-col items-center text-center group">
                                    <div class="w-12 h-6  flex items-center justify-center mb-4 group-hover:[#B89431]/10 transition">
                                    </div>
                                    <span class="text-slate-800 font-semibold group-hover:text-[#B89431]">Nieuws</span>
                                </a>

                                <a href="{{ route('admin.categories.index') }}" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300 flex flex-col items-center text-center group">
                                    <div class="w-12 h-6  flex items-center justify-center mb-4 group-hover:[#B89431]/10 transition">

                                    </div>
                                    <span class="text-slate-800 font-semibold group-hover:text-[#B89431]">Categorieën</span>
                                </a>

                                <a href="{{ route('admin.faqs.index') }}" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300 flex flex-col items-center text-center group">
                                    <div class="w-12 h-6  flex items-center justify-center mb-4 group-hover:[#B89431]/10 transition">

                                    </div>
                                    <span class="text-slate-800 font-semibold group-hover:text-[#B89431]">FAQ</span>
                                </a>

                                <a href="{{ route('admin.users.index') }}" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300 flex flex-col items-center text-center group">
                                    <div class="w-12 h-6  flex items-center justify-center mb-4 group-hover:[#B89431]/10 transition">

                                    </div>
                                    <span class="text-slate-800 font-semibold group-hover:text-[#B89431]">Gebruikers</span>
                                </a>
                            </div>
                        </div>
                    @else
                        <p>Ingelogd!.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
