function validateLogin(obj){
let return_value = true;

const reg_email = /[0-9a-z_]+@[0-9a-z_^.]+.[a-z]{2,3}/i;
const reg_pass = /^[A-Za-z0-9]{4,20}$/;

const email = obj.email.value;
const password = obj.password.value;
const elEmail = document.querySelector('.form__item__input--email');
const elPassword = document.querySelector('.form__item__input--pass');

const classError = 'form__item--invalid';

  if(reg_email.exec(email) == null || email == "") {
      return_value = false;
      elEmail.classList.add(classError);
  }else {
      if (elEmail.classList.contains(classError))
        elEmail.classList.remove(classError);
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
