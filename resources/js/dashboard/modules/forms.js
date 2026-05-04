import api from "../utils/api";

export function initGlobalForms() {
    document.querySelectorAll(".js-form").forEach((form) => {
        form.addEventListener("submit", async (e) => {
            
            e.preventDefault();
            const url = form.dataset.url;
            const method = form.dataset.method || "post";

            const formData = new FormData(form);

            try {
               await api.request({
                    method,
                    url,
                    data: formData,
                    container: form, 
                });

               
                if (form.dataset.success === "reload") {
                    location.reload();
                }

                if (form.dataset.success === "close-modal") {
                    document
                        .getElementById(form.dataset.modal)
                        ?.classList.add("hidden");
                }
            } catch (err) {
               
            }
        });
    });
}
