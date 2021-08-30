let valueIdFavoriteSplit = false
let valueFavorite = 0
let idFavorite = 0
document.querySelector('.wine-cards-container').addEventListener('click', e => {
    e.stopPropagation()
    if (e.target.name === 'rating') {
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
                e.target.value = '0-'+ idFavorite
            } else {
                valueFavorite = 1
                e.target.className = 'checked'
                e.target.value = '1-' + idFavorite
            }
            console.log(e.target.className)
            console.log(e.target.checked)
        e.target.form.submit()
        }
})