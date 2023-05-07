@extends ('index')

@section ('content')
    <div class="offer__container">
        <div class="container">
            @include ('articles.show', ['article' => $articleOffer])
        </div>
    </div>

    <div class="aboutus__container">
        <div class="container flex flex-row relative z-10">
            <div class="basis-2/5 flex justify-center">
                <img src="/images/about-us/female.png" style="transform: scaleX(-1); height: 450px;" />
            </div>
            <div class="basis-3/5 text-white py-12 px-12 flex flex-col justify-center">
                <h4 class="header__title !text-white mb-2">Om oss</h4>
                <p class="text-sm leading-6">
                    Vår kjærlighet til rengjøring skinner igjennom!<br /><br />

                    Vi elsker å rydde, men vet at dette ikke er for alle. Likevel liker alle utvilsomt en ren plass. Derfor fokuserer vi på heltid på å skape renere arbeids- og oppholdsrom. Vi kommer hjem til deg eller bedriften med et smil og en svamp og drar bare når plassen din er skinnende ren. Vi behandler hvert rom som om det var vårt eget, med respekt og integritet.
                </p>
                <br />
                <div>
                    <a class="header__button" href="#">Les mer</a>
                </div>
            </div>
        </div>
    </div>
@endsection

