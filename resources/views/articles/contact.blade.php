@extends ('index')

@section ('content')
    <div class="mt-0 pb-10">
        <div class="container">
            <div class="article__header mt-8">
                @include ('articles.buttons')
            </div>

            <div class="article__content">
                <div class="pt-12 w-full">
                    <div class="my-4 leading-8">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>

            <div id="map" class="mt-12 map__container"></div>
        </div>
    </div>
@endsection
