function validateRegistration(obj){
let return_value = true;

const reg_email = /[0-9a-z_]+@[0-9a-z_^.]+.[a-z]{2,3}/i;
const reg_pass = /^[A-Za-z0-9]{4,20}$/;

const email = obj.email.value;
const name = obj.name.value;
const lname = obj.lname.value;
const password = obj.password.value;
const elEmail = document.querySelector('.form__item__input--email');
const elName = document.querySelector('.form__item__input--name');
const elLname = document.querySelector('.form__item__input--lname');
const elPassword = document.querySelector('.form__item__input--pass');

const classError = 'form__item--invalid';

  if(reg_email.exec(email) == null || email == "") {
      return_value = false;
      elEmail.classList.add(classError);
  }else {
      if (elEmail.classList.contains(classError))
        elEmail.classList.remove(classError);
  }

  if (name == "") {
      return_value = false;
      elName.classList.add(classError);
  }else {
      if (elName.classList.contains(classError))
        elName.classList.remove(classError);
  }

  if (lname == "") {
      return_value = false;
      elLname.classList.add(classError);
  }else {
      if (elLname.classList.contains(classError))
        elLname.classList.remove(classError);
  }

  if (reg_pass.exec(password) == null || password == "") {
      return_value = false;
      elPassword.classList.add(classError);
  }else {
      if (elPassword.classList.contains(classError))
        elPassword.classList.remove(classError);
  }
  return return_value;
}
