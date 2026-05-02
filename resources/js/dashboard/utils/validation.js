export const validation = {
    clear(container) {
        container.querySelectorAll('[id^="error-"]').forEach((el) => {
            el.innerText = "";
            el.classList.add("hidden");
        });
    },

    set(errors, container) {
        Object.keys(errors).forEach((key) => {
            const el = container.querySelector(`#error-${key}`);
            if (el) {
                el.innerText = errors[key][0];
                el.classList.remove("hidden");
            }
        });
    },

    handle(errors, container) {
        this.clear(container);
        this.set(errors, container);
    },
};
