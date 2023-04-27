<div class="article">

    @if (!empty($simple))
        @include ('articles.buttons')
        {!! $article->content !!}
    @else
        <div class="article__header">
            @include ('articles.buttons')
        </div>
        <div class="article__content">
            <div class="article__container">
                <div class="my-4">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    @endif
</div>