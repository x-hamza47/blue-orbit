import api from "../utils/api";
import { authorForm } from "../utils/forms/authorForm";
import { initCharCounter } from "./char-counter";
import { initSlug } from "./getSlug";

export function openAuthorForm({
    author = null,
    url,
    method = "post",
    title = "Form",
}) {
    Swal.fire({
        title,
        width: "700px",
        showCancelButton: true,
        confirmButtonText: author ? "Update" : "Create",
        confirmButtonColor: "#4373F6",
        customClass: {
            popup:         "custom-swal-popup rounded-2xl overflow-hidden",
            title:         "custom-swal-header",
            htmlContainer: "custom-swal-body",
            actions:       "custom-swal-actions",
        },

        html: `<form id="authorForm">${authorForm(author || {})}</form>`,

        didOpen: () => {
            const container = Swal.getPopup();
           if (window.lucide) lucide.createIcons({ context: container })
            initCharCounter(container);
            initSlug(container);

            const input   = Swal.getPopup().querySelector("#avatar-input");
            const preview = Swal.getPopup().querySelector("#avatar-preview");

            input?.addEventListener("change", () => {
                const file = input.files[0];
                if (!file) return;
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                };
                reader.readAsDataURL(file);
            });
        },

        preConfirm: async () => {
            const popup = Swal.getPopup();
            const form  = popup.querySelector("#authorForm");

            const payload = new FormData(form);

            try {
                await api.request({
                    method,
                    url,
                    data: payload,
                    container: popup,
                });

                return true;
            } catch {
                return false;
            }
        },
    });
}