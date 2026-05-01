import "../bootstrap";
import { showToast } from "../helpers/toast";
import { initGLobalDelete } from "./modules/global-delete";
import { initGlobalSortable } from "./modules/global-sortable";

initGlobalSortable();
initGLobalDelete();
window.addEventListener("DOMContentLoaded", () => {
    window.showToast = showToast;
});
