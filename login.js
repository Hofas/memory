
const eyePass = document.querySelector('#eyePass');
const passInput = document.querySelector('#pass');

eyePass.addEventListener('click', (e) =>{

    let type  = passInput.getAttribute('type');
    // console.log(type);
    if  (passInput.getAttribute('type') === 'password') {

        passInput.setAttribute('type','text');
        eyePass.innerText='visibility';
    } else {passInput.setAttribute('type','password');
        eyePass.innerText='visibility_off';
    }
})


$(".textb input").on("focus", function(){

    $(this).addClass("focus");

});

$(".textb input").on("blur", function(){
    if($(this).val() == ""){
        $(this).removeClass("focus");}

});

