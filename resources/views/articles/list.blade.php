@foreach ($articles as $article)
    <div class="article__wrapper rounded-md shadow-md overflow-hidden flex flex-col">
        <a href="{{ route('articleShow', ['articleFriendlyName' => $article->friendly_name]) }}" class="article__img">
            @if (!empty($article->photo))
                <img src="/images/articles/{{ $article->photo }}" />
            @else
                <img src="/images/article.jpg" />
            @endif
        </a>
        <div class="article__body py-7 px-5 flex-1 flex flex-col">
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