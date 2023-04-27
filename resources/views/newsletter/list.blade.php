@extends ('index')

@section ('content')
    <div class="py-3 mt-0 pb-10">
        <div class="container">
            <h1 class="text-2xl font-semibold mb-4 mt-6">Lista newsletterów do wysłania</h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Status:
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Nazwa kampanii:
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Data i godzina rozpoczęcia wysyłki:
                        </th>
                        <th scope="col" class="py-3 px-6 text-right">
                            Akcja:
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($newsletters) && $newsletters->count() > 0)
                        @foreach ($newsletters as $newsletter)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $newsletter->status->name }}
                                </td>
                                <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $newsletter->name }}
                                </td>
                                <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $newsletter->start_datetime }}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a class="bg-stone-800 hover:bg-stone-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="{{ route('newsletterEdit', ['id' => $newsletter->id]) }}">Edytuj</a>
                                    <a class="bg-gray-700 hover:bg-gray-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="#">Usuń</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Brak zdefiniowanych kampanii newsletterowych.
                            </th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <p class="text-center mt-5">
                <a class="bg-gray-700 hover:bg-gray-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="{{ route('newsletterAdd') }}">Dodaj nową kampanię</a>
            </p>
        </div>
    </div>
@endsection