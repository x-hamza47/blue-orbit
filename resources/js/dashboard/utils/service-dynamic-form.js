import { openServiceForm } from "../modules/services-form";

export function initServiceDynamicForms() {
    document.querySelectorAll(".service-open-form").forEach(btn => {
        btn.addEventListener("click", () => {

            let service = null;

            try{
                service = btn.dataset.service ? JSON.parse(btn.dataset.service) : null;
            }catch (e) {
                service = null;
            }

            openServiceForm({
                title: btn.dataset.title || "Form",
                url : btn.dataset.submitUrl,
                method : btn.dataset.method || 'post',
                service
            })
        });
    });
}