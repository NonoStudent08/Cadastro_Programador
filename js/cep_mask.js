document.addEventListener("DOMContentLoaded", () => {
  const cepInput = document.getElementById("cep");

  const formatCep = () => {
    const value = cepInput.value.replace(/\D/g, "");

    let cepValue = value;

    if (value.length > 5) {
      cepValue = value.substring(0, 5) + "-" + value.substring(5);
    }

    cepInput.value = cepValue;
  };

  cepInput.addEventListener("input", formatCep);

  window.addEventListener("load", formatCep);
});
