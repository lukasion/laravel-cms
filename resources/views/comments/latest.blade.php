<div class="basis-1/4">
    <div class="bg-white px-5 mx-2 md:ml-4 mt-6 py-3 rounded-md shadow-md">
        <h4><strong>Najnowsze komentarze</strong></h4>

        @if (!empty($latestComments) && $latestComments->count() > 0)
            <ul class="text-sm">
                @foreach ($latestComments as $comment)
                    <li class="border-b bg-slate-100 rounded-md px-4 py-2 mt-2 border-b-gray-200">
                        <p><span class="font-semibold">{{ $comment->nickname }}</span></p>
                        <p>{{ $comment->comment }}</p>
                        <p class="text-xs text-gray-500 mt-4 border-t border-t-gray-200 pt-1">
                            <a href="{{ route('articleShow', ['articleFriendlyName' => $comment->article->friendly_name]) }}">
                                Artykuł: {{ $comment->article->name }}
                            </a>
                        </p>
                    </li>
                @endforeach
            </ul>
        @else 
            <p>Brak komentarzy na stronie.</p>
            <p>Zostań pierwszy i rozpocznij komentowanie artykułów już dziś!</p>
        @endif
        
        @if (!empty($newestArticles))
            <p class="mt-4"><strong>Najnowsze artykuły</strong></p>
            <ul class="text-sm">
                @foreach ($newestArticles as $article)
                    <li class="border-b bg-slate-100 rounded-md px-4 py-2 mt-2 border-b-gray-200">
                        <a href="{{ route('articleShow', ['articleFriendlyName' => $article->friendly_name]) }}">
                            <p>{{ $article->name }}</p>

                            @if (!empty($article->created_at))
                                <p>
                                    <small>{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</small>
                                </p>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>