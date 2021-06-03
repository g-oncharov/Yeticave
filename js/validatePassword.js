function validatePassword(obj){
let return_value = true;

const reg_pass = /^[A-Za-z0-9]{4,20}$/;

const password = obj.password.value;
const password2 = obj.password2.value;
const elPassword = document.querySelector('.form__item__input--pass-old');
const elPassword2 = document.querySelector('.form__item__input--pass-new');

const classError = 'form__item--invalid';

  if(reg_pass.exec(password) == null || password == "") {
      return_value = false;
      elPassword.classList.add(classError);
  }else {
      if (elPassword.classList.contains(classError))
        elPassword.classList.remove(classError);
  }

  if (reg_pass.exec(password2) == null || password2 == "") {
      return_value = false;
      elPassword2.classList.add(classError);
  }else {
      if (elPassword2.classList.contains(classError))
        elPassword2.classList.remove(classError);
  }
  return return_value;
}
