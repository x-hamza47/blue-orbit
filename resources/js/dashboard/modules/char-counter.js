export function initCharCounter(container) {
    const textarea = container.querySelector("[data-char-count]");
    const current = container.querySelector("[data-char-current]");

    if (!textarea || !current) return;

    const max = textarea.getAttribute("maxlength") || 120;

    const update = () => {
        const len = textarea.value.length;
        current.textContent = len;

        if (len > max * 0.9) {
            current.classList.replace("text-[--color-primary]", "text-red-500");

        } else {
            current.classList.replace("text-red-500", "text-[--color-primary]");
        }
    };

    textarea.addEventListener("input", update);

    update();
}
