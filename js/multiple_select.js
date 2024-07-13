document.addEventListener("DOMContentLoaded", () => {
  const selectElement = document.getElementById("multipleSelect");
  const submitButton = document.getElementById("addBtn");
  const selectedValuesGrid = document.getElementById("selectedValuesGrid");

  submitButton.addEventListener("click", () => {
    const selectedOptions = Array.from(selectElement.selectedOptions).map(
      (option) => option.value
    );

    selectedValuesGrid.innerHTML = "";

    selectedOptions.forEach((value) => {
      const gridItem = document.createElement("div");
      gridItem.className = "grid-item";
      gridItem.textContent = value;
      selectedValuesGrid.appendChild(gridItem);
    });
  });
});
