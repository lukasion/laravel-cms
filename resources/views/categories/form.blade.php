@extends ('index')

@section ('content')
    <div class="py-3 mt-0 pb-10">
        <div class="container">
            <form action="" method="POST">
                @csrf
                <div class="m-auto xl:w-9/12 lg:w-7/12 md:w-8/12 mb-12 md:mb-0 mt-8">
                    <div>
                        <label for="name">Nazwa kategorii:</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control block w-full px-4 py-2 text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="name"
                            placeholder="Nazwa kategorii *"
                            value="@isset ($category){{ $category->name }}@endisset"
                        />
                    </div>

                    <input type="submit" class="bg-blue-600 hover:bg-blue-500 cursor-pointer transition-all text-white font-semibold py-2 px-4 rounded" value="Zapisz kategorię" style="margin-top: 15px;" />

                    <a href="{{ route('categoryList') }}" class="bg-gray-600 hover:bg-gray-500 cursor-pointer transition-all text-white font-semibold py-2 px-4 rounded" style="margin-top: 15px;">Powrót</a>
                </div>

            </form>
        </div>
    </div>
@endsection