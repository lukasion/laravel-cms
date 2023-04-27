
const headerMenu = document.querySelector('.header__menu')
if (headerMenu) {
    const menuHeight = headerMenu.clientHeight

    window.addEventListener('scroll', () => {
        if (window.scrollY > menuHeight) {
            headerMenu.classList.add('header__menu--scrolled')
        } else {
            headerMenu.classList.remove('header__menu--scrolled')
        }
    })
}