import { initCharCounter } from "../modules/char-counter";
import { initColorPicker } from "../modules/color-picker";
import { initSlug } from "../modules/getSlug";
import { initIconPreview } from "../modules/iconPreview";

export const initServiceUI = (container) => {
    lucide.createIcons();
    initColorPicker(container);
    initSlug(container);
    initIconPreview(container);
    initCharCounter(container);
};
