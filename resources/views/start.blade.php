@extends ('index')

@section ('content')
    <div class="mt-12 offer__container">
        <div class="container">
            @include ('articles.show', ['article' => $articleOffer])
        </div>
    </div>
@endsection

