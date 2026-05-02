import api from "../utils/api";
import { serviceForm } from "../utils/forms/serviceForm";
import { initServiceUI } from "../utils/service-ui-init";

export function openServiceForm({
    service = null,
    url,
    method = "post",
    title = "Form",
}) {
    Swal.fire({
        title,
        width: "700px",
        showCancelButton: true,
        confirmButtonText: service ? "Update" : "Create",
        confirmButtonColor: "#4373F6",
        customClass: {
            popup: "custom-swal-popup rounded-2xl overflow-hidden",
            title: "custom-swal-header",
            htmlContainer: "custom-swal-body",
            actions: "custom-swal-actions",
        },

        html: `<form id="serviceForm">${serviceForm(service || {})}</form>`,

        didOpen: () => {
            initServiceUI(Swal.getPopup());
        },

        preConfirm: async () => {
            const popup = Swal.getPopup();
            const form = popup.querySelector("#serviceForm");

            const payload = Object.fromEntries(new FormData(form).entries());

             try {
               await api.request({
                     method,
                     url,
                     data: payload,
                     container: popup,
                 });
            
                 return true;
             } catch (err) {
            
                 return false;
             }
        },
    });
}
