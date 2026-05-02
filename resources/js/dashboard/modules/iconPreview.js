export function initIconPreview(container) {
    const inputs = container.querySelectorAll("[data-icon-input]");

    inputs.forEach((input) => {
        const type = input.dataset.type ?? "lucide";
        const box = container.querySelector(input.dataset.target);

        if (!box) return;

        input.addEventListener("input", () => {
            const value = input.value.trim();

            if (type === "lucide") {
                box.innerHTML = `<i data-lucide="${value}"></i>`;
                lucide.createIcons();
            }

            if (type === "devicon") {
                box.innerHTML = `<i class="${value}"></i>`;
            }
        });
    });
}
