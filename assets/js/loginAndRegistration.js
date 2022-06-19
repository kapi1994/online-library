$(document).ready(function(){

    // # testirati
   $(document).on('click','#btnLogin', function(e){
    e.preventDefault()
    loginFormValidation()
   })

   // # testirati
   $(document).on('click','#btnRegister',function(e){
    e.preventDefault()
    registerFormValidation()
   })

   // -- dodati  response message

const loginFormValidation = () => {
    let email = document.querySelector('#email')
    let password = document.querySelector('#password')

    let errors  = []
    let classes = ['fw-bold','mt-2','text-danger']

    const reEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
    const rePassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/

    if(!reEmail.test(email.value)){
        errors.push(email)
        createErrorMessage('emailError',classes,"email isn't ok")
    }else{
        removeErrorMessage('emailError',classes)
        email = email.value
    }

    if(!rePassword.test(password.value)){
        errors.push(password)
        createErrorMessage('passwordError',classes, "password isn't ok")
    }else{
        removeErrorMessage('passwordError',classes)
        password =password.value
    }

    if(errors.length == 0){
        $.ajax({
            method:'post',
            url:'models/loginAndRegistration/login.php',
            data:{email, password},
            dataType:'json',
            success:(data) =>{
                console.log(data)
            },
            error:(jqXHR, statusTxt ,xhr) => {
                console.log(jqXHR)
            }
        })
    }
}
 
// -- response message
const registerFormValidation = () => {
    let first_name = document.querySelector('#firstName').value
    let last_name = document.querySelector('#lastName').value
    let email = document.querySelector('#email').value
    let password = document.querySelector('#password').value

    let errors = []
    const reFirstLastName = /^[A-ZŠĐČĆŽ][a-zšđžčć]{3,15}(\s[A-ZČŠĐĆŽ][a-zčćšđž]{3,15})?$/
    const reEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
    const rePassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/

    let classes = ['text-danger','mt-2','fw-bold']
    if(!reFirstLastName.test(first_name)){
        errors.push(first_name)
        createErrorMessage('firstNameError',classes,"First name for user isn't ok")
    }else{
        removeErrorMessage('firstNameError',classes)
        // first_name = first_name.name
    }


    if(!reFirstLastName.test(last_name)){
        errors.push(last_name)
        createErrorMessage('lastNameError',classes,"Last name for user isn't ok")
    }else{
        removeErrorMessage('lastNameError',classes)
        // last_name = last_name.value
    }

    if(!reEmail.test(email)){
        errors.push(email)
        createErrorMessage('emailError',classes,"Email isn't ok")
    }else{
        removeErrorMessage('emailError',classes)
        // email= email.value
    }

    if(!rePassword.test(password)){
        errors.push(password)
        createErrorMessage('passwordError',classes,"Password isn't ok")
    }else{
        removeErrorMessage('passwordError',classes)
    }

    if(errors.length == 0){
        $.ajax({
            method:'post',
            url:'models/loginAndRegistration/register.php',
            dataType:'json',
            data:{first_name, last_name, email, password},
            success:(data) => {
                window.location.href='index.php';
            },
            error:(jqXHR, statusTxt, xhr) => {
                console.log(xhr)
            }
        })
    }
}

const createErrorMessage = (elementId, classes, message) => {
    let element  = document.querySelector(`#${elementId}`)
    element.classList.add(...classes)
    element.textContent = message
}

const removeErrorMessage = (elementId, classes) => {
    let element = document.querySelector(`#${elementId}`)
    element.classList.remove([...classes])
    element.textContent = ''

}

})

