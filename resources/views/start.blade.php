@extends ('index')

@section ('content')
    <div class="offer__container">
        <div class="container">
            @include ('articles.show', ['article' => $articleOffer])
        </div>
    </div>
@endsection

