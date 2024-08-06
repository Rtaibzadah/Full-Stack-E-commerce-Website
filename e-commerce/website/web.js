const checkbox = document.getElementById('reveal_pass');
const passwordInput = document.getElementById('password');
const repasswordInput = document.getElementById('repassword');

checkbox.addEventListener('change', function() {
  if (checkbox.checked) {
    passwordInput.type = 'text';
    repasswordInput.type = 'text';
  } else {
    passwordInput.type = 'password';
    repasswordInput.type = 'password';
  }
});

