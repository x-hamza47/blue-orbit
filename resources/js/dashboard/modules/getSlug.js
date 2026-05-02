import { debounce } from "../utils/debouncer";

export const initSlug = (container) => {
    const title = container.querySelector("[data-slug-source]");
    const slug = container.querySelector("[data-slug-target]");

    if (!title || !slug) return;

    let lastValue = "";

    const suffix = title.dataset.slugSuffix || "";

    const generateSlug = debounce(async () => {
        const name = title.value.trim();

        if (!name || name === lastValue) return;

        lastValue = name;

        const res = await fetch(`/get-slug?name=${encodeURIComponent(name)}`);
        const data = await res.json();

        if (data.status) {
            slug.value = suffix ? `${data.slug}-${suffix}` : data.slug;
        }
    }, 600);

    title.addEventListener("input", generateSlug);
};
