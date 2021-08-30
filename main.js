const frage = document.querySelector('#p_question').innerHTML;
const checkAns = document.querySelector("#answer");
checkAns.addEventListener('keyup',(evt) => {
    // evt.preventDefault();
    const keyName = evt.key;
    if (keyName === 'Enter'){
         let ans = checkAns.value;
        checkAnsFunction(ans, frage);
    }
})

function checkAnsFunction(ans, frage){




}




