//Make Bootstrap dropdown element working on hover

let dropDown = document.getElementsByClassName('show-on-hover')
for (let i = 0; i < dropDown.length; i++) {
    dropDown[i].addEventListener('mouseenter', function () {
        dropDown[0].classList.add('show')
        dropDown[1].classList.add('show')
    })

    dropDown[i].addEventListener('mouseleave', function () {
        dropDown[i].classList.remove('show')
    })
}

function ariaTrue () {
    document.getElementById('nav-link').setAttribute('aria-expanded', 'true')
}//Event defined in html tag

function ariaFalse () {
    document.getElementById('nav-link').setAttribute('aria-expanded', 'false')
}//Event defined in html tag


//Back to top button

window.addEventListener('scroll', backToTop)

function backToTop () {

    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById('back-to-top').style.display = 'block'
    } else {
        document.getElementById('back-to-top').style.display = 'none'
    }
}

const btnTop = document.getElementById('back-to-top')
btnTop.addEventListener('click', function () {
    document.documentElement.scrollTop = 0
})

