import "../bootstrap";
import { showToast } from "../helpers/toast";

window.addEventListener("DOMContentLoaded", () => {
    window.showToast = showToast;
});
