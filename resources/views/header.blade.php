<div class="header">
    <div class="header__menu">
        <div class="header__topmenu">
            <div class="container row items-center justify-center">
                <a href="/" class="header__item"><span>Forside</span></a>
                <a href="/tilbudet" class="header__item"><span>Tilbudet</span></a>
                <div class="header__logo header__item">
                    <a href="/"><img src="/images/glimren_logo-black.svg" /></a>
                </div>
                <a href="/om-oss" class="header__item"><span>Om oss</span></a>
                <a href="/kontakt" class="header__item"><span>Kontakt</span></a>
            </div>
        </div>
    </div>
    
    @if (Route::current()->getName() == 'index')
        <div class="header__background">
            <div class="container header__container">
                <div class="header__image">
                    
                </div>
                <div class="header__text">
                    @include('articles.show', ['article' => $headerArticle, 'simple' => true])
                </div>
            </div>
        </div>
    @endif
</div>