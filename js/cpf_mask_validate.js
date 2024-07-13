document.addEventListener("DOMContentLoaded", () => {
  const cpfInput = document.getElementById("cpf");

  const formatCPF = () => {
    const value = cpfInput.value.replace(/\D/g, "");
    let cpfValue = value;

    if (value.length > 3 && value.length <= 6) {
      cpfValue = value.substring(0, 3) + "." + value.substring(3);
    }

    if (value.length > 6 && value.length <= 9) {
      cpfValue =
        value.substring(0, 3) +
        "." +
        value.substring(3, 6) +
        "." +
        value.substring(6);
    }

    if (value.length > 9) {
      cpfValue =
        value.substring(0, 3) +
        "." +
        value.substring(3, 6) +
        "." +
        value.substring(6, 9) +
        "-" +
        value.substring(9);
    }
    cpfInput.value = cpfValue;
  };

  cpfInput.addEventListener("input", formatCPF);

  cpfInput.addEventListener("input", () => {
    const cpf = cpfInput.value.replace(/\D/g, "");

    let isValid = validateCpf(cpf);

    if (!isValid) {
      displayErrorMessage("CPF inválido!");
      markAsInvalidInput();
    } else {
      clearErrorMessage();
      markAsValidInput();
    }
  });

  window.addEventListener("load", formatCPF);
});

function validateCpf(cpf) {
  if (/^(\d)\1+$/.test(cpf)) return false;

  let sum = 0;

  for (let i = 0; i < 9; i++) {
    sum += parseInt(cpf.charAt(i) * (10 - i));
  }

  let dv1 = 11 - (sum % 11);
  if (dv1 >= 10) dv1 = 0;
  if (dv1 !== parseInt(cpf.charAt(9))) return false;

  sum = 0;

  for (let i = 0; i < 10; i++) {
    sum += parseInt(cpf.charAt(i) * (11 - i));
  }

  let dv2 = 11 - (sum % 11);
  if (dv2 >= 10) dv2 = 0;
  if (dv2 !== parseInt(cpf.charAt(10))) return false;

  return true;
}

function displayErrorMessage(message) {
  document.getElementById("cpfErrorMessage").innerText = message;
  document.getElementById("cpfErrorMessage").style.visibility = "visible";
}

function clearErrorMessage() {
  document.getElementById("cpfErrorMessage").style.visibility = "hidden";
  document.getElementById("cpfErrorMessage").innerText = ".";
}

function markAsInvalidInput() {
  document.getElementById("cpf").style.borderColor = "red";
  document.querySelector("#div-cpf").classList.add("invalid");
}

function markAsValidInput() {
  document.getElementById("cpf").style.borderColor = "";
  document.querySelector("#div-cpf").classList.remove("invalid");
}
