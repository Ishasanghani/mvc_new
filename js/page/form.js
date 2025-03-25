class FormValidator {
    constructor(form) {
      this.form = form;
      this.validationRules = {
        "validate-required": this.validateRequired,
        "validate-zipcode": this.validateZipcode,
        "validate-email":this.validateEmail,
        "validate-name":this.validateName,
        "validate-phone":this.validatePhone,
      };
  
      this.observeInputs();
      this.setupFormSubmission();
    }
  
    validateRequired(input) {
      return input.value.trim() ? "" : "This field is required";
    }
  
    validateZipcode(input) {
      return /^[0-9]{6}$/.test(input.value) ? "" : "Only 6 digits allowed";
    }

    validateEmail(input){
        return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(input.value) ?"":"please add a correct mail"
    }

    validateName(input){
        return /^[A-Za-z]{2,}$/.test(input.value) ?"":"Enter valid input";
    }

    validatePhone(input){
        return /^[0-9]{10}$/.test(input.value)?"":"Enter a 10 digit phone number";
    }
  
    validateInput(input) {
      let errorMessage = "";
      Object.keys(this.validationRules).forEach((rule) => {
        if (input.classList.contains(rule)) {
          let error = this.validationRules[rule](input);
          if (error) errorMessage = error;
        }
      });
      this.showError(input, errorMessage);
      this.toggleSubmitButton();
    }
  
    showError(input, errorMessage) {
      let errorDiv = input.parentNode.querySelector(".error-message");
  
      if (errorMessage) {
          if (!errorDiv) {
              errorDiv = document.createElement("div");
              errorDiv.classList.add("error-message", "text-danger", "mt-1");
              input.parentNode.appendChild(errorDiv);
          }
          errorDiv.textContent = errorMessage;
      } else if (errorDiv) {
          errorDiv.remove(); // Remove error if no message
      }
    }
  
    toggleSubmitButton() {
      const allInput = this.form.querySelectorAll("input");
      let isValid = true;
      allInput.forEach((input) => {
        if (
          input.parentNode.querySelector(".error-message") &&
          input.parentNode.querySelector(".error-message").textContent !== ""
        ) {
          isValid = false;
        }
      });
  
      const submitButton = this.form.querySelector("button[type='submit']");
      if (submitButton) {
        submitButton.disabled = !isValid;
      }
    }
  
    observeInputs() {
      this.form.addEventListener("input", (event) => {
        if (event.target.tagName === "INPUT") {
          this.validateInput(event.target);
        }
      });
  
      let observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
          mutation.addedNodes.forEach((node) => {
            if (node.tagName === "INPUT") this.validateInput(node);
          });
        });
      });
  
      observer.observe(this.form, { childList: true, subtree: true });
    }
  
    setupFormSubmission() {
      this.form.addEventListener("submit", (event) => {
        let isValid = true;
        const allInputs = this.form.querySelectorAll("input");
  
        allInputs.forEach((input) => {
          this.validateInput(input);
          if (
            input.parentNode.querySelector(".error-message") &&
            input.parentNode.querySelector(".error-message").textContent !== ""
          ) {
            isValid = false;
          }
        });
  
        if (!isValid) {
          event.preventDefault(); // Block form submission
          alert("Please fix validation errors before submitting.");
        }
      });
    }
  }
  
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("form").forEach((form) => {
      new FormValidator(form);
    });
  });
  