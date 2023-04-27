<div class="header">
    <div class="header__menu">
        <div class="container row items-center justify-between">
            <div class="header__logo">
                <a href="/"><img src="/images/glimren_logo.svg" /></a>
            </div>
            <div class="header__menu-list">
                <a href="/"><span>Homepage</span></a>
                <a href="/about-us"><span>About us</span></a>
                <a href="/contact"><span>Contact</span></a>
            </div>
        </div>
        <div class="header__submenu">
            <div class="container">
                <div class="header__submenu-list">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        123-123-123
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5l-8-5V6l8 5l8-5v2z"/></svg>
                        kontakt@glimren.no
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header__background">
        <div class="container header__top">
            <div class="header__top-container">
                @include('articles.show', ['article' => $headerArticle, 'simple' => true])
            </div>
        </div>
    </div>
</div>