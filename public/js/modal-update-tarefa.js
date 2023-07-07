const openModalButtonU = document.querySelector("#update-tarefa");
const closeModalButtonU = document.querySelector("#fecha-modal-update");
const modalU = document.querySelector("#modal-update-tarefa");

const toggleModalU = () => {
  modalU.classList.toggle("hide");
  fade.classList.toggle("hide");
};

[openModalButtonU, closeModalButtonU, fade].forEach((el) => {
  el.addEventListener("click", () => toggleModalU());
});