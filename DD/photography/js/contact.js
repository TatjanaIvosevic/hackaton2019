var contact_form = document.querySelector('form[name="kontakt"]');
var _name = document.querySelector('#name');
var surname = document.querySelector('#surname');
var email = document.querySelector('#email');
var subject = document.querySelector('#subject');
var message = document.querySelector('#message');
var form_elements = [_name,surname,email,subject,message];

var name_mess = document.querySelector('#name-mess');
var surname_mess = document.querySelector('#surname-mess');
var email_mess = document.querySelector('#email-mess');
var subject_mess = document.querySelector('#subject-mess');
var message_mess = document.querySelector('#message-mess');
var alert_mess = document.querySelector('#alert-mess');
var form_errors = [name_mess,surname_mess,email_mess,subject_mess,message_mess];

contact_form.addEventListener("submit", function(e){
    e.preventDefault();
    if(validate_form()) {
        sendAjaxMessage();
    };
})
function validate_form(){
    var isValid = true;

    for (var i=0;i<form_elements.length;i++){
        if(form_elements[i].value.trim() == ''){
            form_elements[i].classList.add('is-invalid');
            form_errors[i].innerHTML = 'Molimo Vas popunite ovo polje';
            isValid = false;
        } else {
            form_elements[i].classList.remove('is-invalid');
            form_elements[i].classList.add('is-valid');
            form_errors[i].innerHTML = '';
        }
    }
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!regex.test(email.value)) {
        email.classList.add('is-invalid');
        email_mess.innerHTML = 'Molimo Vas napisite ispravnu email adresu';
        isValid = false;
    } else{
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        email_mess.innerHTML = '';
    }

    return isValid;
}

function sendAjaxMessage() {
    var json = {
        "name": _name.value ,
        "surname": surname.value ,
        "email": email.value ,
        "subject": subject.value,
        "message": message.value
    };

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            if(xhttp.responseText == 'Poruka je poslata!') {
                alert_mess.classList.remove('alert-warning');
                alert_mess.classList.add('alert-success');
                alert_mess.innerHTML = xhttp.responseText;
                contact_form.reset();
            } else {
                alert_mess.classList.remove('alert-warning');
                alert_mess.classList.add('alert-danger');
                alert_mess.innerHTML = xhttp.responseText;
            }
        } else {
            alert_mess.classList.add('alert-warning');
            alert_mess.innerHTML = "Šalje se... <i class='icon-spinner'></i>"
        }
    };

    xhttp.open("POST", "php/contact.php", true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("data="+JSON.stringify(json));
}