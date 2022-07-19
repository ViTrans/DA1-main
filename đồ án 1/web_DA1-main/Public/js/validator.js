function validator(options) {
  const selectorRules = {};
  function validate(inputElement, rule) {
    const errorElement = inputElement.parentElement.parentElement.querySelector(
      options.errorSelector
    );
    let errorMessage;

    let rules = selectorRules[rule.selector];
    let rulesLength = rules.length;
    for (let i = 0; i < rulesLength; i++) {
      errorMessage = rules[i](inputElement.value);
      if (errorMessage) break;
    }

    if (errorMessage) {
      errorElement.innerText = errorMessage;
      inputElement.classList.add('message_error');
    } else {
      errorElement.innerText = '';
      inputElement.classList.remove('message_error');
    }

    return !errorMessage;
  }

  const formElement = document.querySelector(options.form);

  formElement.onsubmit = function (event) {
    let isFormValid = true;
    options.rules.forEach(function (rule) {
      const inputElement = formElement.querySelector(rule.selector);
      let isValid = validate(inputElement, rule);
      if (!isValid) {
        isFormValid = false;
      }
    });
    if (!isFormValid) {
      event.preventDefault();
    }

    // check input image
    // const imgElement = document.querySelector('#imgInp');
    // if (imgElement.value == '') {
    //   event.preventDefault();
    //   //   ------ Editing --------
    //   // (function tempAlert(msg, duration) {
    //   //   var el = document.createElement('div');
    //   //   el.setAttribute(
    //   //     'style',
    //   //     'position:absolute;bottom:16%;left:365px;background-color:white;color:red;font-weight:300;font-size:15px'
    //   //   );
    //   //   el.innerHTML = msg;
    //   //   setTimeout(function () {
    //   //     el.parentNode.removeChild(el);
    //   //   }, duration);
    //   //   document.body.appendChild(el);
    //   // })('Bạn chưa chọn hình ảnh cho sản phẩm', 5000);
    // }
  };

  if (formElement) {
    options.rules.forEach(function (rule) {
      const inputElement = formElement.querySelector(rule.selector);

      if (Array.isArray(selectorRules[rule.selector])) {
        selectorRules[rule.selector].push(rule.test);
      } else {
        selectorRules[rule.selector] = [rule.test];
      }
      if (inputElement) {
        inputElement.onblur = function () {
          validate(inputElement, rule);
        };

        inputElement.oninput = function () {
          const errorElement =
            inputElement.parentElement.parentElement.querySelector(
              options.errorSelector
            );
          errorElement.innerText = '';
          inputElement.classList.remove('message_error');
        };
      }
    });
  }
}

// Rules
validator.isRequired = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim() ? undefined : message || 'Vui lòng nhập thông tin';
    },
  };
};
validator.isEmail = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      return regex.test(value) ? undefined : message || 'Vui lòng nhập email';
    },
  };
};

validator.minLength = function (selector, min, message) {
  return {
    selector: selector,
    test: function (value) {
      return value.length >= min
        ? undefined
        : message || `Vui lòng nhập tối thiểu ${min} ký tự`;
    },
  };
};

validator.isCheckPass = function (selector, getValuePass, message) {
  return {
    selector: selector,
    test: function (value) {
      return value === getValuePass()
        ? undefined
        : message || 'Giá trị nhập vào không chính xác';
    },
  };
};

validator.isPhone = function (selector, message) {
  return {
    selector: selector,
    test: function (value) {
      const regex = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
      return regex.test(value)
        ? undefined
        : message || 'Vui lòng nhập số điện thoại';
    },
  };
};
