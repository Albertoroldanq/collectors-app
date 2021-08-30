let valueIdFavoriteSplit = false
let valueFavorite = 0
let idFavorite = 0

let scrollPos = document.querySelector('main').dataset.scrollposition

//document.documentElement.scrollTop = document.querySelector('main').dataset.scrollposition
//document.body.scrollTop = document.querySelector('main').dataset.scrollposition
let position = window.location.search.split("?")
document.documentElement.scrollTop = position[1]
document.body.scrollTop = position[1]

document.addEventListener('scroll', e => {
    let scrollPosition = document.querySelector('html').scrollTop
    scrollPos = scrollPosition
})

document.querySelector('.wine-cards-container').addEventListener('click', e => {
    e.stopPropagation()
    if (e.target.name === 'rating') {
        e.target.value = e.target.value + '-' + scrollPos
        e.target.form.submit()
    }
    else if (e.target.name === 'favorite') {
            e.target.checked = true
            let valueIdFavorite = e.target.value.split("-")
            valueFavorite = parseInt(valueIdFavorite[0])
            idFavorite = valueIdFavorite[1]
            if(valueFavorite === 1) {
                valueFavorite = 0
                e.target.className = ''
                e.target.value = '0-'+ idFavorite + '-' + scrollPos
            } else {
                valueFavorite = 1
                e.target.className = 'checked'
                e.target.value = '1-' + idFavorite + '-' + scrollPos
            }
            //document.querySelector('main').dataset.scrollposition = scrollPos
            e.target.form.submit()
        }
})