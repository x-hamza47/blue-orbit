export function initColorPicker(container) {
    const input = container.querySelector("[data-color-input]");
    const target = container.querySelector("[data-color-target]");

    if (!input || !target) return;

    input.addEventListener("input", () => {
        target.style.backgroundColor = input.value + "20";
        target.style.color = input.value;
    });
}
