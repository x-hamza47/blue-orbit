import { initToggleStatus } from "../modules/toggleStatus";
import { initAuthorDynamicForms } from "../utils/author-dynamic-form";

initAuthorDynamicForms();
initToggleStatus({
    field: "is_active",
    url: (id) => `/dashboard/authors/${id}/toggle-status`,
});
