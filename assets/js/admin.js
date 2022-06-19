$(document).ready(function(){
    $(document).on('click','#btnSaveAuthor', function(e){
        e.preventDefault()
        authorFormValidation()
    })

    
})

const authorFormValidation = () => {
    let id = document.querySelector('#author_id').value
    let index = document.querySelector('#author_index').value
    let first_name = document.querySelector('#first_name').value
    let last_name = document.querySelector('#last_name').value

    const reFirstLastName = /^[A-ZŠĐČĆŽ][a-zšđžčć]{3,15}(\s[A-ZČŠĐĆŽ][a-zčćšđž]{3,15})?$/
    let errors = []
    let classes = ['text-danger','mt-2','fw-bold']
    if(!reFirstLastName.test(first_name)){
        errors.push(first_name)
        createErrorMessage('first_name_error',classes, "First name of author ins't ok")
    }else{
        removeErrorMessage('first_name_error',classes)
    }

    if(!reFirstLastName.test(last_name)){
        errors.push(last_name)
        createErrorMessage('last_name_error',classes, "Last name of autohor isn't ok")
    }else{
        removeErrorMessage('last_name_error',classes)
    }

    if(errors.length == 0){
       if(id == ''){
        $.ajax({
            method:'post',
            url:'models/authors/insert.php',
            data:{first_name, last_name},
            dataType:'json',
            success:(data) => {
                console.log(data)
            },
            error:(jqXHR, statusTxt, xhr)=>{
                console.log(jqXHR)
            }
        })
       }else{

       }
    }
}

const createErrorMessage = (elementId, classes, textMessage) => {
    let element = document.querySelector(`#${elementId}`)
    element.classList.add(...classes)
    element.textContent =  textMessage
}

const removeErrorMessage = (elementId, classes) => {
    let element = document.querySelector(`#${elementId}`)
    element.classList.remove([...classes])
    element.textContent = element
}