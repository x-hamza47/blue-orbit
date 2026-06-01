import { openAuthorForm } from "../modules/openAuthorForm";

export function initAuthorDynamicForms() {
    document.querySelectorAll(".author-open-form").forEach(btn => {
        btn.addEventListener("click", () => {

            let author = null;

            try {
                author = btn.dataset.author ? JSON.parse(btn.dataset.author) : null;
            } catch (e) {
                author = null;
            }

            openAuthorForm({
                title:  btn.dataset.title  || "Form",
                url:    btn.dataset.submitUrl,
                method: btn.dataset.method || "post",
                author,
            });
        });
    });
}