//Show/hide password

const checkBox = document.getElementById('show-password')
checkBox.addEventListener('click', showPass)
function showPass () {
    let input = document.getElementById('pass-input')
    if (input.type === "password") {
        input.type = "text"
    } else {
        input.type = "password"
    }
}