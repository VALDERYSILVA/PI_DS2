const ilogin = document.querySelector('#ilogin')

ilogin.addEventListener('keypress', () => {
    let inputLength = ilogin.value.length

    // MAX LENGHT 14  CPF
    if (inputLength == 3 || inputLength == 7) {
        ilogin.value += '.'
    } else if (inputLength == 11) {
        ilogin.value += '-'
    }

})