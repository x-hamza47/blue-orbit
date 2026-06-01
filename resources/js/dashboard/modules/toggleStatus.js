import api from "../utils/api";
import { debounce } from "../utils/debouncer";

export function initToggleStatus({ field = "is_active", url = (id) => `/authors/${id}/toggle-status` } = {}) {
    document.querySelectorAll(".toggle-status").forEach((checkbox) => {
        if (checkbox.dataset.bound) return;
        checkbox.dataset.bound = "true";

        const label = checkbox.closest("label")?.querySelector("span:last-child");

        const handle = debounce(async function () {
            const id = checkbox.dataset.id;
            const newValue = checkbox.checked ? 1 : 0;

            try {
                await api.request({
                    method: "patch",
                    url:    url(id),
                    data:   { [field]: newValue },
                });

                if (label) label.textContent = checkbox.checked ? "Active" : "Hidden";

            } catch {
                checkbox.checked = !checkbox.checked;
                if (label) label.textContent = checkbox.checked ? "Active" : "Hidden";
            }
        }, 600);

        checkbox.addEventListener("change", handle);
    });
}