@extends ('index')

@section ('content')
    <div class="my-12">
        <div class="container">
            <div class="article__header">
                @include ('articles.buttons')
            </div>
            <div class="article__content">
                <div class="w-2/3">
                    <div class="my-4 leading-8">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12 offer__container">
        <div class="container">
            @include ('articles.show', ['article' => $articleOffer])
        </div>
    </div>
@endsection

