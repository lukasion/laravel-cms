<div class="menu @if (isset($withoutHeader)) menu--smaller @endif">
    <div class="container row flex-col md:flex-row">
        <div class="menu__mobile-icon">
            <div class="header__logo header__item">
                <a href="/"><img src="/images/glimren_logo.svg" /></a>
            </div>
            <a href="#" class="menu__burger js-menuMobile text-4xl">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="menu__mobile">
            <ul>
                <li>
                    <a href="/">Forside</a>
                </li>
                <li>
                    <a href="/om-oss">Om oss</a>
                </li>
                <li>
                    <a href="/kontakt">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    const menuMobile = document.querySelector('.js-menuMobile')
    if (menuMobile) {
        menuMobile.addEventListener('click', (e) => {
            e.preventDefault()

            const menuMobileList = document.querySelector('.menu__mobile')
            menuMobileList.classList.toggle('menu__mobile--active')
        })
    }
</script>