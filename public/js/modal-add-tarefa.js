const openModalButton = document.querySelector("#add_tarefa");
const closeModalButton = document.querySelector("#fecha-modal-tarefa");
const modal = document.querySelector("#modal-tarefa");
const fade = document.querySelector("#fade");

const toggleModal = () => {
  modal.classList.toggle("hide");
  fade.classList.toggle("hide");
};

[openModalButton, closeModalButton, fade].forEach((el) => {
  el.addEventListener("click", () => toggleModal());
});