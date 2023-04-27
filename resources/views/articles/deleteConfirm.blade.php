@extends ('index')

@section ('content')
    <div class="py-3 mt-0 pb-10">
        <div class="container">
            <h1 class="text-center text-xl" style="margin: 25px 0 0;">
                @isset ($article)
                    <strong>Usuwanie artykułu:</strong> {{ $article->name }} (ID: {{ $article->id }})
                @endisset
            </h1>

            <p class="text-center">
                Czy potwierdzasz chęć usunięcia artykułu?
            </p>
            <p class="text-center mt-5">
                <a class="bg-blue-600 hover:bg-blue-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="?deleteConfirm=1">Tak</a>
                <a class="bg-slate-700 hover:bg-slate-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="#">Nie</a>
            </p>
        </div>
    </div>
@endsection