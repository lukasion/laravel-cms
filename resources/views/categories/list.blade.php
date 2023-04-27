@extends ('index')

@section ('content')
    <div class="py-3 mt-0 pb-10">
        <div class="container">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nazwa kategorii:
                        </th>
                        <th scope="col" class="py-3 px-6 text-right">
                            Akcja:
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories && $categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $category->name }}
                                </th>
                                <td class="py-4 px-6 text-right">
                                    <a class="bg-stone-800 hover:bg-stone-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="{{ route('categoryEdit', ['id' => $category->id]) }}">Edytuj</a>
                                    <a class="bg-gray-700 hover:bg-gray-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="{{ route('categoryDelete', ['id' => $category->id]) }}">Usuń</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Brak zdefiniowanych kategorii.
                            </th>
                            <td></td>
                        </tr>
                    @endisset
                </tbody>
            </table>
            <p class="text-center mt-5">
                <a class="bg-gray-700 hover:bg-gray-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="{{ route('categoryAdd') }}">Dodaj nową kategorię</a>
            </p>
        </div>
    </div>
@endsection