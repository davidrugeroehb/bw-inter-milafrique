<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ Bewerken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                                Categorie *
                            </label>
                            <select name="category_id" id="category_id" required
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $faq->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="question">
                                Vraag *
                            </label>
                            <input type="text" name="question" id="question" required
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('question', $faq->question) }}">
                            @error('question')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="answer">
                                Antwoord *
                            </label>
                            <textarea name="answer" id="answer" rows="6" required
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="order">
                                Volgorde
                            </label>
                            <input type="number" name="order" id="order"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
                                   value="{{ old('order', $faq->order) }}">
                            @error('order')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Opslaan
                            </button>
                            <a href="{{ route('admin.faqs.index') }}"
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
