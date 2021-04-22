


const registerForm = document.querySelector('#register-form');
const userName = document.querySelector('#username');
const email = document.querySelector('#email');
const passwordI = document.querySelector('#password');
const passwordII = document.querySelector('#password2');




registerForm.addEventListener('submit',(e)=>{
    e.preventDefault();

    checkInputs();

})

function checkInputs (){

    valid = 1;
    const usernameValue = userName.value.trim();
    const emailValue  = email.value.trim();
    const passI = passwordI.value.trim();
    const passII = passwordII.value.trim();

    userNameRegex =  new RegExp(/^[A-Za-z]{1}[A-Za-z0-9]{4,14}$/);
    emailRegex = new RegExp(/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/);
    passRegex = new RegExp(/^(?=.*[\d])(?=.*[a-z])(?=.*[A-Z])(?!.*[^\S]).{8,30}$/);

    if(!userNameRegex.test(usernameValue)){setErrorFor(userName,'5 to 15 chars only letters and numbers start from letter'); valid = 0;}
    else {setSuccessFor(userName);}


    if (!emailRegex.test(emailValue)){setErrorFor(email,'enter valid email');valid = 0;}
    else {setSuccessFor(email);}

    if (!passRegex.test(passI)){setErrorFor(passwordI,'password at least 8 char 1 number 1 big letter 1 special char');

        valid = 0;
    }
    else {setSuccessFor(passwordI);}

    if (!passRegex.test(passII)){setErrorFor(passwordII,'password at least 8 char 1 number 1 big letter 1 special char');valid= 0}
    else {setSuccessFor(passwordII);}

    if (passI !==passII ){
        setErrorFor(passwordI,'Password arent the same');
        setErrorFor(passwordII,'Password arent the same');
        valid = 0;
    }


    if (valid){
        // createCookie("valid",1,1)
        let expire = new Date();
        expire.setTime(expire.getTime()+ (30* 1000));
        document.cookie = `valid=OK ;expires = ${expire}`;
        // $.cookie('Valid', 'Valid', {expires: expire});
        registerForm.submit();



    }

    //
    // function createCookie(name, value, days) {
    //     var expires;
    //
    //     if (days) {
    //         var date = new Date();
    //         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    //         expires = "; expires=" + date.toGMTString();
    //     }
    //     else {
    //         expires = "";
    //     }
    //
    //     document.cookie = escape(name) + "=" +
    //         escape(value) + expires + "; path=/";
    // }


    function setSuccessFor (input){
        const formControl = input.parentElement; //.formControl
        formControl.classList.add('success');
        formControl.classList.remove('error');
    }

    function setErrorFor (input, message){
        const formControl = input.parentElement; //.formControl
        const small = formControl.querySelector('small');
        //add message
        small.innerText = message;
        //add errorClass
        formControl.classList.add('error');
        formControl.classList.remove('success');
    }


}






