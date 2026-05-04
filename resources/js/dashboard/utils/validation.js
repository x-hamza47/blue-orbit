export const validation = {
    clear(container = document) {
        container.querySelectorAll('[id^="error-"]').forEach((el) => {
            el.innerText = "";
            el.classList.add("hidden");
        });
    },

    set(errors, container = document) {
        Object.keys(errors).forEach((key) => {
            const escapedKey = key.replace(/\./g, "\\.");

            const el =
                container.querySelector(`#error-${escapedKey}`) ||
                document.querySelector(`#error-${escapedKey}`);

            if (el) {
                el.innerText = errors[key][0];
                el.classList.remove("hidden");
            }
        });
    },

    handle(errors, container = document) {
        this.clear(container);
        this.set(errors, container);
    },
};
