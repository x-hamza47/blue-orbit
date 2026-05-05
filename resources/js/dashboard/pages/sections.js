import { initDynamicItems } from "../modules/dynamic-items";
import { initGlobalForms } from "../modules/forms";

// document.addEventListener("DOMContentLoaded", () => {
// window.initDynamicItems = initDynamicItems;
// window.initGlobalForms = initGlobalForms;
// });

const modal = document.getElementById("sectionModal");
const form = document.getElementById("sectionForm");
const formContainer = document.getElementById("formContainer");
const typeSelect = document.getElementById("sectionType");
const typeInput = document.getElementById("typeInput");
const modalTitle = document.getElementById("modalTitle");

function openModal() {
    modalTitle.innerText = "Add Section";

    typeSelect.value = "";
    typeSelect.disabled = false;
    typeSelect.classList.remove("hidden");
    formContainer.innerHTML = "";

    form.dataset.url = form.dataset.store;
    form.dataset.method = "post";

    modal.classList.remove("hidden");
}

function closeModal() {
    modal.classList.add("hidden");
}

function loadForm(section = null) {
    const type = section?.type ?? typeSelect.value;
    if (!type) return;

    typeInput.value = type;

    form.dataset.url = section
        ? form.dataset.update.replace(":id", section.id)
        : form.dataset.store;

    form.dataset.method = section ? "put" : "post";

    axios
        .get(form.dataset.form.replace(":type", type), {
            params: {
                existing: section ? JSON.stringify(section.data) : null,
            },
        })
        .then((res) => {
            formContainer.innerHTML = res.data;
            initDynamicItems(formContainer);
        });
}

function editSection(id) {
    axios
        .get(form.dataset.show.replace(":id", id))
        .then((res) => {
            modalTitle.innerText = "Edit Section";
            typeSelect.value = res.data.section.type;
            typeSelect.disabled = true;
            typeSelect.classList.add("hidden");
            modal.classList.remove("hidden");

            loadForm(res.data.section);
        })
        .catch(() => {
            showToast({
                type: "error",
                title: "Error",
                text: "Failed to load section",
            });
        });
}

Object.assign(window, {
    openModal,
    closeModal,
    loadForm,
    editSection,
});

initGlobalForms();
