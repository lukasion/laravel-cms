<div class="header">
    <div class="header__menu">
        <div class="header__topmenu">
            <div class="container row items-center justify-center">
                <a href="#" class="header__item header__item--disabled"><span>&nbsp;</span></a>
                <a href="/" class="header__item"><span>Forside</span></a>
                <div class="header__logo header__item">
                    <a href="/"><img src="/images/glimren_logo.svg" /></a>
                </div>
                <a href="/om-oss" class="header__item"><span>Om oss</span></a>
                <a href="/kontakt" class="header__item"><span>Kontakt</span></a>
            </div>
        </div>
    </div>

    <div class="header__background">
        <div class="container header__container">
            <div class="header__image">

            </div>
            <div class="header__text">
                @include('articles.show', ['article' => $headerArticle, 'simple' => true])
            </div>
        </div>
    </div>
</div>