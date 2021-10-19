function uptade(valor,input){
    let card = document.getElementById("card");
    let dados = document.getElementById("uptade_dados");
    let what_input = document.getElementById('input');
    dados.setAttribute('placeholder', valor);
    what_input.setAttribute('value', input);
    card.style.display = 'flex';
    
}
function cancelar(){
    let card = document.getElementById("card");
    card.style.display = 'none';
}

function dados(){
    let input = document.querySelector("#uptade_dados");
    let id = document.querySelector("#id").value;
    let what_input = document.getElementById('input');
    let attr_dados = input.getAttribute('placeholder');
    let attr_input = what_input.getAttribute('value');
    let input_value = input.value
    if(input_value == ''){
        input_value = attr_dados;
    }
    window.location.replace('log.php?acao=uptade&dado='+input_value+'&id='+id +'&input=' + attr_input);

}
    
    
