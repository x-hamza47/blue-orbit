import api from "../utils/api";
import { validation } from "../utils/validation";

export function initGlobalForms(root = document) {
    root.querySelectorAll(".js-form").forEach((form) => {
        if (form.dataset.bound) return; 
        form.dataset.bound = "true";

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const url = form.dataset.url;
            const method = form.dataset.method || "post";

            const formData = new FormData(form);

            if (method.toLowerCase() === "put") {
                formData.append("_method", "PUT");
            }

            try {
                await api.request({
                    method: "post",
                    url,
                    data: new FormData(form),
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
            } catch {
               
            }
        });
    });
}
