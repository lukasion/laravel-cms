const scrollToElements = document.querySelectorAll('.js-scrollTo')

function isVisible(e) {
    return !!( e.offsetWidth || e.offsetHeight || e.getClientRects().length );
}

if (scrollToElements?.length > 0) {
    scrollToElements.forEach((el) => {
        el.addEventListener('click', (e) => {
            e.preventDefault()

            const href = e.target.getAttribute('href')
            let topMenu = document.querySelector('.header__topmenu')
            topMenu = isVisible(topMenu) !== false ? topMenu : document.querySelector('.menu__mobile-icon')

            if (href && topMenu && href.includes('#')) {
                const targetElement = document.querySelector(href)
                const yOffset = topMenu.clientHeight

                if (targetElement) {
                    const scrollTop = targetElement.getBoundingClientRect().top + window.pageYOffset - yOffset;

                    window.scrollTo({
                        top: scrollTop,
                        behavior: 'smooth'
                    })
                }
            }
        })
    })
}

document.addEventListener('DOMContentLoaded', function() {
    if (window.location.hash) {
        window.scrollTo(0,0);

        setTimeout(function() { 
            window.scrollTo(0,0); 
        }, 1);
    }

    setTimeout(function() {
        if (location.hash) {
            const target = location.hash.split('#');
            smoothScrollTo(document.querySelector('#' + target[1]));
        }
    }, 200);
        
    function smoothScrollTo(target) {
        let topMenu = document.querySelector('.header__topmenu')
        topMenu = isVisible(topMenu) !== false ? topMenu : document.querySelector('.menu__mobile-icon')
        const yOffset = topMenu.clientHeight

        if (target) {
            const targetOffsetTop = target.offsetTop - yOffset - 20;
            window.scrollTo({
                top: targetOffsetTop,
                behavior: 'smooth'
            });
        }
    }
});
  