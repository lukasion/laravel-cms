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
                <span>{{ $category->name }}</span>
            </h2>
            <div class="flex flex-row">
                <div class="basis-3/4">
                    <div class="articles">
                        @if (!empty($articles) && $articles->count() > 0)
                            @foreach ($articles as $article)
                                <div class="article__wrapper rounded-md shadow-md overflow-hidden flex flex-col">
                                    <a href="{{ route('articleShow', ['articleFriendlyName' => $article->friendly_name]) }}" class="article__img">
                                        <img src="/images/article.jpg" />
                                    </a>
                                    <div class="article__body py-7 px-5 flex-1 flex flex-col">
                                        @if ($article->category)
                                            <p class="font-semibold text-xs uppercase tracking-wide">
                                                {{ $article->category->name }}
                                            </p>
                                        @endif
                                        <div class="article__title">
                                            <span class="text-lg font-semibold">{{ $article->name }}</span>
                                        </div>
                                        <div class="article__date">
                                            <span class="text-xs">{{ \Carbon\Carbon::parse($article->created_at)->format("d.m.Y") }}</span>
                                        </div>
                                        <div class="article__content flex flex-col justify-between flex-1">
                                            <p>{!! Str::limit(strip_tags($article->content), 110) !!}</p>

                                            <div class="mt-5">
                                                <a href="{{ route('articleShow', ['articleFriendlyName' => $article->friendly_name]) }}" class="bg-slate-700 hover:bg-slate-500 cursor-pointer transition-all w-full text-white font-semibold py-2 px-4 rounded" href="#">
                                                    Czytaj więcej
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Brak artykułów przypisanych do wybranej kategorii.</p>
                        @endif
                    </div>

                    @if (!empty($category->log))
                        <p class="text-sm text-right mt-5">Kategorię wyświetlono {{ $category->log->value }} raz(y).</p>
                    @endif
                </div>

                @include ('comments.latest')
            </div>
        </div>
    </div>
@endsection