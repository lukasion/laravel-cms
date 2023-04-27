@extends ('index')

@section ('content')
    <div class="mt-0 pb-10">
        <div class="container">
            <div class="article__header">
                @include ('articles.buttons')
            </div>
            <div class="article__content">
                <div class="pt-12 w-2/3">
                    <div class="my-4 leading-8">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

