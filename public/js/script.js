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

const sidebarToggle = document.getElementById("sidebarToggle")
const sidebar = document.getElementById("sidebar")
const closeSidebar = document.getElementById("closeSidebar")

sidebarToggle?.addEventListener("click", () => {
  sidebar?.classList.remove("hidden")
})

closeSidebar?.addEventListener("click", () => {
  sidebar?.classList.add("hidden")
})

const modalEksDsn = document.getElementById("modalEksDsn")
const openModalEksDsn = document.getElementById("openModalEksDsn")
const closeModalEksDsn = document.getElementById("closeModalEksDsn")

openModalEksDsn?.addEventListener("click", () => {
  modalEksDsn?.classList.remove("hidden")
})

closeModalEksDsn?.addEventListener("click", () => {
  modalEksDsn?.classList.add("hidden")
})

const openModalEksJur = document.getElementById("openModalEksJur")
const modalEksJur = document.getElementById("modalEksJur")
const closeModalEksJur = document.getElementById("closeModalEksJur")

openModalEksJur?.addEventListener("click", () => {
  modalEksJur?.classList.remove("hidden")
})

closeModalEksJur?.addEventListener("click", () => {
  modalEksJur?.classList.add("hidden")
})

const formValidation = (idForm, idBtn) => {
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById(idForm)
    const submitBtn = document.getElementById(idBtn)

    const inputs = form.querySelectorAll("input, textarea, select")

    function checkForm() {
      let isFormValid = true

      inputs.forEach((input) => {
        if (input.value.trim() === "") {
          isFormValid = false
        }
      })

      submitBtn.disabled = !isFormValid
      submitBtn.classList.toggle("opacity-50", !isFormValid) // optional visual
      submitBtn.classList.toggle("cursor-not-allowed", !isFormValid)
    }

    // Cek form saat input berubah
    inputs.forEach((input) => {
      input.addEventListener("input", checkForm)
      input.addEventListener("change", checkForm)
    })

    // Cek saat pertama dimuat
    checkForm()
  })
}

formValidation("formAddDosen", "submitBtn")
formValidation("formEditDosen", "submitBtnEdit")
formValidation("formAddJurusan", "submitBtn")
formValidation("formEditJurusan", "submitBtn")
formValidation("formLogin", "submitBtn")
