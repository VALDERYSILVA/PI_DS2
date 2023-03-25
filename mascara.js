// mask número de telefone

function mascaraTelefone(mascara, input){
    const vetMask = mascara.split("") 
    const numTelefone = input.value.replace(/\D/g, "")
    const cursor = input.selectionStart
    const tecla = (window.event) ? event.keyCode : event.which

    for (let i=0; i<numTelefone.length; i++) {
        vetMask.splice(vetMask.indexOf(" "), 1, numTelefone[i])
    }

    input.value = vetMask.join("")
    
    if(tecla != 37 && (cursor == 0 || cursor == 3 || cursor == 3 || cursor == 9)) {
        input.setSelectionRange(cursor+1, cursor+1)
    } else {
        input.setSelectionRange(cursor, cursor)
    }

}
