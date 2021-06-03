let hasButtonConfirm = document.getElementsByClassName("button-confirm").length;
let buttonClose = document.getElementsByClassName("button-close")[0];
if (hasButtonConfirm) {
  let button = document.getElementsByClassName("button-confirm")[0];
  let buttonSucces = document.getElementsByClassName("button-success")[0];
  let succsesBlock = document.getElementsByClassName("success")[0];
  let flag = false;
    button.addEventListener('click', function() {
      document.body.style = 'overflow: hidden;';
      document.getElementsByClassName('modal-wrapper')[0].style = 'display:flex;';
    });

      succsesBlock.style.opacity = 0;
      succsesBlock.style.transition = "opacity 1s";

    buttonSucces.addEventListener('click', function() {
      flag = true;
      succsesBlock.style.opacity = 1;
      succsesBlock.style.visibility = 'visible';
      setTimeout(() => {
        document.getElementsByClassName('modal-wrapper')[0].style = 'display:none;';
        window.location.href = 'index.php';
      }, 5000);
    });
  buttonClose.addEventListener('click', function() {
    if (flag) {
      window.location.href = 'index.php';
    }
    document.getElementsByClassName('modal-wrapper')[0].style = 'display:none;';
  });
}

let hasModal = document.getElementsByClassName("modal").length;
  if (hasModal && !hasButtonConfirm) {
    buttonClose.addEventListener('click', function() {
    document.getElementsByClassName('modal-wrapper')[0].style = 'display:none;';
    document.body.classList.remove('overflow-h');
  });
}
