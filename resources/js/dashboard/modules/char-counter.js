export function initCharCounter(container) {
    const textareas = container.querySelectorAll("[data-char-count]");

    textareas.forEach((textarea) => {
        const type = textarea.getAttribute("data-char-type");
        const current = container.querySelector(
            `[data-char-current][data-char-type="${type}"]`
        );

        if (!current) return;

        const max = textarea.getAttribute("maxlength") || 120;

        const update = () => {
            const len = textarea.value.length;
            current.textContent = len;

            current.classList.remove("text-red-500", "text-[--color-primary]");

            if (len > max * 0.9) {
                current.classList.add("text-red-500");
            } else {
                current.classList.add("text-[--color-primary]");
            }
        };

        textarea.addEventListener("input", update);
        update();
    });
}