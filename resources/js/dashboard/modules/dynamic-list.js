import { initIconPreview } from "./iconPreview";


const templates = {
    faq: (index, data = {}) => `...`,
    tech: (index, data = {}) => `...`,
    benefit: (index, data = {}) => `...`,
    industry: (index, data = {}) => `...`,
    caseStudy: (index, data = {}) => `...`,
};


function syncButtonState(container) {
    const limit = parseInt(container.dataset.limit || 0);
    const btn = container.dataset.addBtn
        ? document.querySelector(container.dataset.addBtn)
        : null;

    if (!btn || !limit) return;

    const count = container.children.length;
    btn.disabled = count >= limit;
    btn.classList.toggle("opacity-50", count >= limit);
    btn.classList.toggle("cursor-not-allowed", count >= limit);
}

function attachRemove(item, container) {
    item.querySelector("[data-remove]")?.addEventListener("click", () => {
        item.remove();
        syncButtonState(container);
    });
}

export function addListItem(containerId, templateKey, data = {}) {
    const container = document.getElementById(containerId);
    if (!container) return;

    const limit = parseInt(container.dataset.limit || 0);

    if (limit && container.children.length >= limit) {
        showToast({
            type: "error",
            title: "Limit reached",
            text: `Max ${limit} items allowed`,
        });
        return;
    }

    const template = templates[templateKey];
    if (!template) {
        console.warn(`[dynamic-list] No template: "${templateKey}"`);
        return;
    }

    const index = container.children.length;
    const wrapper = document.createElement("div");
    wrapper.innerHTML = template(index, data).trim();
    const item = wrapper.firstElementChild;

    attachRemove(item, container);
    container.appendChild(item);
    syncButtonState(container);

    initIconPreview(item);

    if (typeof lucide !== "undefined") lucide.createIcons();
}


export function initDynamicLists(scope = document) {
    scope.querySelectorAll("[data-dynamic-list-add]").forEach((btn) => {
        const containerId = btn.dataset.dynamicListAdd;
        const templateKey = btn.dataset.template;

        btn.addEventListener("click", () =>
            addListItem(containerId, templateKey),
        );
    });
}
