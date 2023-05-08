@extends ('index')

@section ('content')
    <div class="offer__container">
        <div class="container">
            @include ('articles.show', ['article' => $articleOffer])
        </div>
    </div>

    <div class="aboutus__container">
        <div class="container flex flex-col md:flex-row relative z-10">
            <div class="w-full hidden md:flex md:basis-1/2 xl:basis-2/5 justify-center items-center pointer-events-none">
                <img src="/images/about-us/female.png" style="object-fit: cover; position: relative;" />
            </div>
            <div class="w-full md:basis-1/2 xl:basis-3/5 text-white py-2 md:py-12 px-0 md:px-12 flex flex-col justify-center">
                @if (!empty($articleOmoss))
                    @include ('articles.show', ['article' => $articleOmoss])
                @else
                    No article found.
                @endif
            </div>
        </div>
    </div>
@endsection

