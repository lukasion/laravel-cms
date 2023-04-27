
const showAllCategories = document.querySelector('.js-showAllCategories')
if (showAllCategories) {
    let categoriesVisible = false;

    showAllCategories.addEventListener('click', (event) => {
        event.preventDefault()
        categoriesVisible = !categoriesVisible;

        showAllCategories.querySelector('span').innerHTML = categoriesVisible === true ? 'Pokaż mniej' : 'Pokaż więcej';

        Array.from(document.querySelectorAll('.category__link--more')).forEach(element => {
            element.classList.toggle('active')
        })
    })
}