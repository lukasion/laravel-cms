@extends ('index')

@section ('content')
    <div class="mt-0 pb-10">
        <div class="container">
            <div class="article__header">
                @if (Auth::user())
                    <a href="/article/add" class="bg-blue-600 hover:bg-blue-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded">Dodaj artykuł</a>
                @endif
            </div>
            <h2 class="title mt-10">
                <span>Wszystkie artykuły</span>
            </h2>
            <div class="flex md:flex-row flex-col">
                <div class="articles">
                    @if (!empty($articles) && $articles->count() > 0)
                        @include ('articles.list', ['articles' => $articles])
                    @else
                        <p>Brak artykułów przypisanych do wybranej kategorii.</p>
                    @endif
                </div>
                @include ('comments.latest')
            </div>
            
            {{ $articles->links() }}  
        </div>
    </div>
@endsection