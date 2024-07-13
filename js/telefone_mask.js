document.addEventListener("DOMContentLoaded", () => {
  const telefoneInput = document.getElementById("telefone");

  const formatTelefone = () => {
    const value = telefoneInput.value.replace(/\D/g, "");
    let telefoneInputValue = value;

    if (value.length > 1 && value.length <= 2) {
      telefoneInputValue = "(" + value.substring(0, 1) + value.substring(1);
    }

    if (value.length == 3) {
      telefoneInputValue =
        "(" + value.substring(0, 2) + ") 9" + value.substring(3);
    }

    if (value.length > 3 && value.length <= 7) {
      telefoneInputValue =
        "(" + value.substring(0, 2) + ") 9 " + value.substring(3);
    }
    if (value.length > 7) {
      telefoneInputValue =
        "(" +
        value.substring(0, 2) +
        ") " +
        value.substring(2, 3) +
        " " +
        value.substring(3, 7) +
        "-" +
        value.substring(7);
    }

    telefoneInput.value = telefoneInputValue;
  };

  telefoneInput.addEventListener("input", formatTelefone);

  window.addEventListener("load", formatTelefone);
});
