// mascara número de telefone

function mascaraTelefone(mascara, input) {
    const vetMask = mascara.split("")
    const numTelefone = input.value.replace(/\D/g, "")
    const cursor = input.selectionStart
    const tecla = (window.event) ? event.keyCode : event.which

    for (let i = 0; i < numTelefone.length; i++) {
        vetMask.splice(vetMask.indexOf(" "), 1, numTelefone[i])
    }

    input.value = vetMask.join("")

    if (tecla != 37 && (cursor == 0 || cursor == 3 || cursor == 3 || cursor == 9)) {
        input.setSelectionRange(cursor + 1, cursor + 1)
    } else {
        input.setSelectionRange(cursor, cursor)
    }

} 

// mascara CPF

const cpf = document.querySelector('#cpf')

cpf.addEventListener('keypress', () => {
    let inputLength = cpf.value.length

    // MAX LENGHT 14  CPF
    if (inputLength == 3 || inputLength == 7) {
        cpf.value += '.'
    } else if (inputLength == 11) {
        cpf.value += '-'
    }

})


// mascara Nascimento

const nascimento = document.querySelector('#nascimento')

nascimento.addEventListener('keypress', () => {
    let inputLength = nascimento.value.length

    //MAX LENGHT 12  RG
    if (inputLength == 2 || inputLength == 5) {
        nascimento.value += '/'
    }

})

// mascara CEP

const cep = document.querySelector('#cep')

cep.addEventListener('keypress', () => {
    let inputLength = cep.value.length

    //MAX LENGHT 12  RG
    if (inputLength == 5) {
        cep.value += '-'
    }

})