import { renderers } from "./renderers";
import { initIconPreview } from "./iconPreview";
import { CONFIGS } from "./sectionConfigs";

let uid = 0;
let makeId = () => `uid-${Date.now()}-${uid++}`;

//! ===================================
//!  Field Builder
//! ===================================

function buildField(field, index, data = {}) {
   const name = `items[${index}][${field.key}]`;
    const errorId = `error-items.${index}.${field.key}`;

    const resolved = {
        ...field,
        name,
        errorId,
        value: data[field.key] ?? field.default ?? "",
    };

    if (field.type === "icon") {
        resolved.previewId = makeId();
    }

    return resolved;
}

//! ===================================
//!  Layout Builder
//! ===================================
function buildLayout(layout, fieldsHtml) {
    if (!layout.length) {
        return `<div class="space-y-4">${fieldsHtml.join("")}</div>`;
    }

    const pool = [...fieldsHtml];
    const rows = [];

    layout.forEach((row) => {
        if (row === "full") {
            rows.push(`<div class="mt-4">${pool.shift() || ""}</div>`);
            return;
        }

        const cols = pool.splice(0, row).join("");

        rows.push(`
            <div class="grid grid-cols-1 md:grid-cols-${row} gap-4 mt-4">
                ${cols}
            </div>
        `);
    });
    pool.forEach((f) => rows.push(`<div class="mt-4">${f}</div>`));

    return rows.join("");
}

//! ===================================
//!  Card Render
//! ===================================

function renderCard(config, index, data = {}) {
    const fieldsHtml = config.fields.map((field) => {
        const renderer = renderers[field.type];
        if (!renderer) {
            console.warn("Missing renderer for type:", field.type);
            return "";
        }
        return renderer(buildField(field, index, data));
    });

    return `
    <div class="js-dynamic-item bg-gray-50 border border-gray-100 rounded-xl p-4 relative">

        <button type="button" data-remove
            class="absolute top-3 right-3 text-gray-400 hover:text-red-500">
            ✕
        </button>

        ${buildLayout(config.layout ?? [], fieldsHtml)}

    </div>`;
}
//! ===================================
//!  Reiindex
//! ===================================
function reindex(container) {
    container.querySelectorAll(".js-dynamic-item").forEach((card, i) => {
        card.dataset.index = i;

        card.querySelectorAll("[name]").forEach((input) => {
            input.name = input.name.replace(/items\[\d+\]/, `items[${i}]`);
        });

        card.querySelectorAll("[id^='error-items']").forEach((el) => {
            el.id = el.id.replace(/error-items\.\d+/, `error-items.${i}`);
        });
    });
}
//! ===================================
//! INIT WRAPPER
//! ===================================

function initWrapper(wrapper) {
    const type = wrapper.dataset.type;
    const config = CONFIGS[type];

    if (!config) {
        console.error("Invalid config type:", type);
        return;
    }

    // const config = JSON.parse(wrapper.dataset.config);
    const existing = JSON.parse(wrapper.dataset.existing || "[]");

    const container = wrapper.querySelector("[data-dynamic-container]");
    const addBtn = wrapper.querySelector("[data-add]");

    if (!container) return;

    existing.forEach((data, i) => {
        container.insertAdjacentHTML("beforeend", renderCard(config, i, data));
    });

    if (existing.length) {
        lucide.createIcons({ el: container });
        initIconPreview(container);
    }

    syncBtn(addBtn, container, config.max);

    addBtn?.addEventListener("click", () => {
        const count = container.querySelectorAll(".js-dynamic-item").length;

        if (config.max && count >= config.max) return;

        container.insertAdjacentHTML("beforeend", renderCard(config, count));

        const newCard = container.lastElementChild;

        lucide.createIcons({ el: newCard });
        initIconPreview(newCard);

        syncBtn(addBtn, container, config.max);
    });

    container.addEventListener("click", (e) => {
        const btn = e.target.closest("[data-remove]");
        if (!btn) return;

        const card = btn.closest(".js-dynamic-item");

        card.remove();

        reindex(container);
        syncBtn(addBtn, container, config.max);
    });
}

//! ===================================
//! Button State
//! ===================================
function syncBtn(btn, container, max) {
    if (!btn || !max) return;

    const count = container.querySelectorAll(".js-dynamic-item").length;

    const disabled = count >= max;

    btn.disabled = disabled;
    btn.classList.toggle("opacity-50", disabled);
    btn.classList.toggle("cursor-not-allowed", disabled);
}

//! ===================================
//! INIT
//! ===================================
export function initDynamicItems() {
    document.querySelectorAll("[data-dynamic-wrapper]").forEach(initWrapper);
}
