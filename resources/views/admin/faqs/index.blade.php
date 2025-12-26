<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                FAQ Beheren
            </h2>
            <a href="{{ route('admin.faqs.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
               style="background-color: #2563EB !important; color: white !important;">
                + Nieuwe FAQ
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($faqs->count() > 0)
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-2">Vraag</th>
                                    <th class="text-left py-2">Categorie</th>
                                    <th class="text-left py-2">Volgorde</th>
                                    <th class="text-right py-2">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $faq)
                                    <tr class="border-b">
                                        <td class="py-3">{{ $faq->question }}</td>
                                        <td class="py-3">{{ $faq->category->name }}</td>
                                        <td class="py-3">{{ $faq->order }}</td>
                                        <td class="py-3 text-right">
                                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-blue-600 hover:text-blue-900 mr-3">Bewerken</a>
                                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Weet je het zeker?')">Verwijderen</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500">Nog geen FAQ items.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
