const modalAddDosen = document.getElementById("modalAddDosen")
const openModalAddDosen = document.getElementById("openModalAddDosen")
const closeModalAddDosen = document.getElementById("closeModalAddDosen")

openModalAddDosen?.addEventListener("click", () => {
  modalAddDosen?.classList.remove("hidden")
})

closeModalAddDosen?.addEventListener("click", () => {
  modalAddDosen?.classList.add("hidden")
})

const modalEditDosen = document.getElementById("modalEditDosen")
const openModalEditDosen = document.getElementById("openModalEditDosen")
const closeModalEditDosen = document.getElementById("closeModalEditDosen")

openModalEditDosen?.addEventListener("click", () => {
  modalEditDosen?.classList.remove("hidden")
})

closeModalEditDosen?.addEventListener("click", () => {
  modalEditDosen?.classList.add("hidden")
})

const modalAddJurusan = document.getElementById("modalAddJurusan")
const openModalAddJurusan = document.getElementById("openModalAddJurusan")
const closeModalAddJurusan = document.getElementById("closeModalAddJurusan")

openModalAddJurusan?.addEventListener("click", () => {
  modalAddJurusan?.classList.remove("hidden")
})

closeModalAddJurusan?.addEventListener("click", () => {
  modalAddJurusan?.classList.add("hidden")
})

const modalEditJurusan = document.getElementById("modalEditJurusan")
const openModalEditJurusan = document.getElementById("openModalEditJurusan")
const closeModalEditJurusan = document.getElementById("closeModalEditJurusan")

openModalEditJurusan?.addEventListener("click", () => {
  modalEditJurusan?.classList.remove("hidden")
})

closeModalEditJurusan?.addEventListener("click", () => {
  modalEditJurusan?.classList.add("hidden")
})

const logoutBtn = document.getElementById("logoutBtn")
const logoutModal = document.getElementById("logoutModal")
const cancelLogout = document.getElementById("cancelLogout")

logoutBtn?.addEventListener("click", () => {
  logoutModal?.classList.remove("hidden")
})

cancelLogout?.addEventListener("click", () => {
  logoutModal?.classList.add("hidden")
})
