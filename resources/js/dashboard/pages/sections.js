import { initDynamicItems } from "../modules/dynamic-items";
import { initGlobalForms } from "../modules/forms";

const modal = document.getElementById("sectionModal");
const form = document.getElementById("sectionForm");
const formContainer = document.getElementById("formContainer");
const typeSelect = document.getElementById("sectionType");
const typeInput = document.getElementById("typeInput");
const modalTitle = document.getElementById("modalTitle");

function switchTab(tab) {
    const isContent = tab === "content";

    document
        .getElementById("panelContent")
        .classList.toggle("hidden", !isContent);
    document.getElementById("panelAuto").classList.toggle("hidden", isContent);

    document
        .getElementById("tabContent")
        .classList.toggle("bg-white", isContent);
    document
        .getElementById("tabContent")
        .classList.toggle("text-[#4373F6]", isContent);
    document
        .getElementById("tabContent")
        .classList.toggle("shadow-sm", isContent);
    document
        .getElementById("tabContent")
        .classList.toggle("text-gray-400", !isContent);

    document.getElementById("tabAuto").classList.toggle("bg-white", !isContent);
    document
        .getElementById("tabAuto")
        .classList.toggle("text-[#4373F6]", !isContent);
    document
        .getElementById("tabAuto")
        .classList.toggle("shadow-sm", !isContent);
    document
        .getElementById("tabAuto")
        .classList.toggle("text-gray-400", isContent);
}

 function addSystemSection(type) {
     const form = document.getElementById("sectionForm");

     axios
         .post(form.dataset.store, {
             type,
         })
         .then((res) => {
             closeModal();
             showToast({
                 title: "Section added successfully",
                 text: res.data.message,
                 type: "success",
             });
             setTimeout(() => location.reload(), 2500);
         })
         .catch((err) => {
             showToast({
                 title: "Error",
                 text: err.response?.data?.message || "Something went wrong",
                 type: "error",
             });
         });
 }

function openModal() {
    document.getElementById("submitBtn").classList.add("hidden");
    switchTab("content"); 
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
            if (res.status === 204 || !res.data) {
                formContainer.innerHTML = "";
                return;
            }

            formContainer.innerHTML = res.data;
            document.getElementById("submitBtn").classList.remove("hidden");
            initDynamicItems(formContainer);
        });
}

function editSection(id) {
    axios
        .get(form.dataset.show.replace(":id", id))
        .then((res) => {
            const section = res.data.section;

            if (section.system) {
                showToast({
                    type: "info",
                    title: "System Section",
                    text: "This section is managed automatically and cannot be edited.",
                });
                return;
            }
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
    switchTab,
    addSystemSection,
});

initGlobalForms();
