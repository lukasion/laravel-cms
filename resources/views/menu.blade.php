<div class="menu @if (isset($withoutHeader)) menu--smaller @endif">
    <div class="container row flex-col md:flex-row">
        <div class="menu__mobile-icon">
            <a href="#" class="menu__burger js-menuMobile text-4xl">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="menu__mobile">
            <ul>
                <li>
                    <a href="/">Strona główna</a>
                </li>
                <li>
                    <a href="/artykuly">Artykuły</a>
                </li>
                <li>
                    <a href="/o-mnie">O mnie</a>
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