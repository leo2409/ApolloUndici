//SHOW PASSWORD BUTTON
const passwordInput = document.querySelector('input#new-password');
const togglePasswordButton = document.querySelector('button#toggle-password');

function togglePassword() {
  if (passwordInput.type == 'password') {
    passwordInput.type = 'text';
    togglePasswordButton.textContent = 'Hide password';
    togglePasswordButton.setAttribute('aria-label',
      'Hide password.');
  } else {
    passwordInput.type = 'password';
    togglePasswordButton.textContent = 'Show password';
    togglePasswordButton.setAttribute('aria-label',
      'Show password as plain text. ' +
      'Warning: this will display your password on the screen.');
  }
}

//INVALID INPUT
var invalidClassName = 'invalid';
var validClassName = 'valid';
var inputs = document.querySelectorAll('input, select, textarea');
inputs.forEach(function (input) {
  // Add a css class on submit when the input is invalid.
  input.addEventListener('invalid', function () {
    input.classList.add(invalidClassName);
  })

  // Remove the class when the input becomes valid.
  // 'input' will fire each time the user types
  input.addEventListener('input', function () {
    if (input.validity.valid) {
      input.classList.remove(invalidClassName);
      input.classList.add(validClassName);
    } else if(input.classList.contains(validClassName) && !input.validity.valid) {
      input.classList.remove(validClassName);
      input.classList.add(invalidClassName);
    }
  })
})



/*
const validationErrorClass = 'validation-error'
const parentErrorClass = 'has-validation-error'
const inputs = document.querySelectorAll('input, select, textarea')
inputs.forEach(function (input) {
  function checkValidity (options) {
    const insertError = options.insertError
    const parent = input.parentNode
    const error = parent.querySelector(`.${validationErrorClass}`)
      || document.createElement('div')

    if (!input.validity.valid && input.validationMessage) {
      error.className = validationErrorClass
      error.textContent = input.validationMessage

      if (insertError) {
        parent.insertBefore(error, input)
        parent.classList.add(parentErrorClass)
      }
    } else {
      parent.classList.remove(parentErrorClass)
      error.remove()
    }
  }
  input.addEventListener('input', function () {
    // We can only update the error or hide it on input.
    // Otherwise it will show when typing.
    checkValidity({insertError: false})
  })
  input.addEventListener('invalid', function (e) {
    // prevent showing the default display
    e.preventDefault()

    // We can also create the error in invalid.
    checkValidity({insertError: true})
  })
})
*/