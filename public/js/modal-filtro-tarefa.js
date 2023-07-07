const openModalButtonF = document.querySelector("#filtro_tarefa");
const closeModalButtonF = document.querySelector("#fecha-modal-busca");
const modalF = document.querySelector("#modal-busca-tarefa");

const toggleModalF = () => {
  modalF.classList.toggle("hide");
  fade.classList.toggle("hide");
};

[openModalButtonF, closeModalButtonF, fade].forEach((el) => {
  el.addEventListener("click", () => toggleModalF());
});