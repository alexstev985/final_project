//Open specific category in new tab
const select = document.getElementById('floatingSelect')
select.addEventListener('change', openCategoryPage ())
function openCategoryPage () {
    let locations = document.getElementsByTagName('option')
    for (let i = 0; i < locations.length; i++) {
        window.open (`${locations[i].value}`, '_blank')
    }
}