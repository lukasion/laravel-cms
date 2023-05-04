<div class="header">
    <div class="header__menu">
        <div class="header__topmenu">
            <div class="container row items-center justify-between">
                <div class="header__logo">
                    <a href="/"><img src="/images/glimren_logo.svg" /></a>
                </div>
                <div class="header__menu-list">
                    <a href="/"><span>Forside</span></a>
                    <a href="/om-oss"><span>Om oss</span></a>
                    <a href="/kontakt"><span>Kontakt</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="header__background">
        <div class="container">
            @include('articles.show', ['article' => $headerArticle, 'simple' => true])
        </div>
    </div>
</div>