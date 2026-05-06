export const renderers = {
    text: ({ name, errorId, label = "", value = "", placeholder = "" }) => `
    <div>
        <label class="text-xs font-semibold text-gray-500">${label}</label>
        <input
            type="text"
            name="${name}"
            value="${esc(value)}"
            placeholder="${esc(placeholder)}"
            class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none"
        >
        <small id="${errorId}" class="text-red-500 text-xs hidden"></small>
    </div>
    `,
    textarea: ({
        name,
        errorId,
        label = "",
        value = "",
        placeholder = "",
        rows = 2,
    }) => `
    <div>
        <label class="text-xs font-semibold text-gray-500">${label}</label>
        <textarea
            name="${name}"
            rows="${rows}"
            placeholder="${esc(placeholder)}"
            class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none"
        >${esc(value)}</textarea>
        <small id="${errorId}" class="text-red-500 text-xs hidden"></small>
    </div>
    `,
    number: ({
        name,
        errorId,
        label = "",
        value = "",
        placeholder = "",
        min = "",
        max = "",
        step = 1,
    }) => `
        <div>
            <label class="text-xs font-semibold text-gray-500">${label}</label>

            <input
                type="number"
                name="${name}"
                value="${esc(value)}"
                placeholder="${esc(placeholder)}"
                min="${min}"
                max="${max}"
                step="${step}"
                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none"
            >

            <small id="${errorId}" class="text-red-500 text-xs hidden"></small>
        </div>
        `,
    icon: ({
        name,
        errorId,
        label = "",
        value = "",
        placeholder = "e.g. zap",
        previewDefault = "zap",
        previewId,
        iconType = "lucide",
    }) => {
        const iconName = value.trim() || previewDefault;
        const preview =
            iconType === "devicon"
                ? `<i class="${esc(iconName)}"></i>`
                : `<i data-lucide="${esc(iconName)}"></i>`;

        const browseLink =
            iconType === "devicon"
                ? `https://devicon.dev"`
                : `https://lucide.dev/icons"`;

        return `
            <div>
                <label class="text-xs font-semibold text-gray-500">${label}</label>
                <div class="flex items-center gap-3 mt-2">
                    <input type="text"
                        name="${name}"
                        value="${esc(value)}"
                        data-icon-input
                        data-type="${iconType}"
                        data-target="#${previewId}"
                        placeholder="${placeholder}"
                        class="w-full p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

                    <div id="${previewId}"
                        class="w-11 h-11 shrink-0 flex items-center justify-center bg-white border rounded-lg text-gray-600">
                         ${preview}
                    </div>

                    </div>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-2">
    
                        <a href="${browseLink}" target="_blank"
                        class="text-[#4373F6] font-semibold hover:underline">
                            Browse ${iconType === "devicon" ? "Devicon" : "Lucide"} icons
                        </a>

                        <span class="text-gray-300">→</span>

                        <span class="text-gray-400">
                            copy icon name only
                        </span>
                     </p>
                <small id="${errorId}" class="text-red-500 text-xs hidden"></small>
            </div>
        `;
    },
    checkbox: ({ name, label = "", value = 0 }) => {
        const id = `${name}-${Math.random().toString(36).slice(2, 8)}`;
        return `
            <div class="flex items-center gap-2">
                    <input type="hidden" name="${name}" value="0">

                    <input type="checkbox"
                        name="${name}"
                        value="1"
                        id="${id}"
                        ${value == 1 || value === "1" ? "checked" : ""}
                        class="w-4 h-4 accent-[#4373F6]">

                    <label class="text-xs font-semibold text-gray-500" for="${id}">
                        ${label}
                    </label>
                </div>
            `;
    },

    select: ({ name, errorId, label = "", value = "", options = [] }) => {
        const opts = options
            .map((o) => (typeof o === "string" ? { value: o, label: o } : o))
            .map(
                (o) =>
                    `<option value="${esc(o.value)}" ${o.value === value ? "selected" : ""}>${esc(o.label)}</option>`,
            )
            .join("");

        return `
            <div>
                <label class="text-xs font-semibold text-gray-500">${label}</label>
                <select
                    name="${name}"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none bg-white"
                >
                    <option value="" disabled ${!value ? "selected" : ""}>Select…</option>
                    ${opts}
                </select>
                <small id="${errorId}" class="text-red-500 text-xs hidden"></small>
            </div>`;
    },
    repeater: ({
        name,
        label = "",
        value = [],
        placeholder = "",
        max = 10,
        errorId,
    }) => {
        const rows = (Array.isArray(value) && value.length ? value : [""])
            .map(
                (v) => `
        <div class="flex gap-2 nested-point-item">
            <input type="text" name="${name}[]" value="${esc(v)}"   {{-- ← [] here --}}
                placeholder="${esc(placeholder)}"
                class="flex-1 p-2.5 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none text-sm">
            <button type="button" data-remove-point
                class="w-9 h-9 shrink-0 rounded-xl bg-red-50 text-red-400 hover:bg-red-500 hover:text-white transition flex items-center justify-center text-xs">✕</button>
        </div>`,
            )
            .join("");

        return `
        <div>
            <label class="text-xs font-semibold text-gray-500">${label}</label>
            <div class="nested-repeater mt-2 space-y-2" 
                data-nested-key="${name}" 
                data-max="${max}">
                ${rows}
            </div>
            <button type="button" data-add-point
                class="mt-2 text-[11px] font-bold text-[#4373F6] uppercase tracking-widest hover:underline">
                + Add ${label}
            </button>
            <small id="${errorId}" class="text-red-500 text-xs hidden"></small>
        </div>
    `;
    },
};

function esc(str) {
    return String(str ?? "")
        .replace(/&/g, "&amp;")
        .replace(/"/g, "&quot;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;");
}
