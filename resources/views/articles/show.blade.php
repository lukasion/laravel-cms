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
                {!! $article->content !!}
            </div>
        </div>
    @endif
</div>