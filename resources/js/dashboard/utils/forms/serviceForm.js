export function serviceForm(data = {}) {
    return `
    <div class="space-y-6 text-sm">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-6 gap-y-5">
            
            <!-- TITLE -->
            <div class="group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2 group-focus-within:text-[--color-primary] transition-colors">
                    Service Title
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[--color-primary] transition-colors">
                        <i data-lucide="type" class="w-4 h-4"></i>
                    </span>
                    <input
                        type="text"
                        name="title"
                        value="${data.title ?? ""}"
                        data-slug-source
                        data-slug-suffix="services"
                        placeholder="Web Development, SEO..."
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 
                               focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10 
                               outline-none transition-all bg-white font-medium placeholder:text-gray-300"
                    >
                </div>
                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-title"></p>
            </div>

            <!-- SLUG -->
            <div class="group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2 group-focus-within:text-[--color-primary] transition-colors">
                    Slug
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                        <i data-lucide="link" class="w-4 h-4"></i>
                    </span>
                    <input
                        type="text"
                        name="slug"
                        value="${data.slug ?? ""}"
                        data-slug-target
                        placeholder="auto-generated-slug"
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-100 
                               bg-gray-50/50 text-gray-500
                               focus:border-[--color-primary] outline-none transition-all"
                        readonly
                    >
                </div>
                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-slug"></p>
            </div>

            <!-- ICON & THEME CARD -->
            <div class="lg:col-span-2 bg-[#F8FAFF] border border-[#E8EFFF] rounded-2xl p-5 relative overflow-hidden">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-4">
                    Visual Identity
                </label>

                <div class="flex flex-wrap md:flex-nowrap items-center gap-6">
                    <!-- ICON PREVIEW -->
                    <div
                        data-color-target
                        class="w-16 h-16 flex items-center justify-center rounded-2xl border-2 border-white shadow-sm transition-all duration-300"
                        style="background:${data.color ?? "#4373F6"}20; color:${data.color ?? "#4373F6"}"
                    >
                        <i data-lucide="${data.icon ?? "star"}" class="w-7 h-7"></i>
                    </div>

                    <div class="flex flex-1 items-center gap-3 w-full">
                        <!-- COLOR PICKER -->
                        <input
                            type="color"
                            name="color"
                            value="${data.color ?? "#4373F6"}"
                            data-color-input
                            class="w-12 h-12 rounded-xl border-2 border-white shadow-sm cursor-pointer hover:scale-105 transition-transform"
                        >

                        <!-- ICON INPUT -->
                        <div class="relative flex-1 group/input">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within/input:text-[--color-primary]">
                                <i data-lucide="sparkles" class="w-4 h-4"></i>
                            </span>
                            <input
                                type="text"
                                name="icon"
                                value="${data.icon ?? ""}"
                                data-icon-input
                                data-type="lucide"
                                data-target="[data-color-target]"
                                placeholder="lucide icon (star, zap, home)"
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 
                                       focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10 
                                       outline-none transition-all bg-white"
                            >
                        </div>
                    </div>
                </div>

                <!-- HELP LINK -->
                <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                    <a href="https://lucide.dev/icons" target="_blank"
                       class="text-[11px] text-[--color-primary] font-bold hover:underline flex items-center gap-1">
                        BROWSE LUCIDE LIBRARY <i data-lucide="external-link" class="w-3 h-3"></i>
                    </a>
                    <span class="text-[10px] font-medium text-gray-400">Live Preview Enabled</span>
                </div>

                <p id="error-icon" class="text-[11px] text-red-500 mt-2 hidden"></p>
                <p id="error-color" class="text-[11px] text-red-500 mt-1 hidden"></p>
            </div>

            <!-- DESCRIPTION -->
            <div class="lg:col-span-2 group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2 group-focus-within:text-[--color-primary]">
                    Service Description
                </label>
                <textarea
                    name="desc"
                    rows="3"
                    maxlength="120"
                    data-char-count
                    placeholder="Briefly explain what this service offers..."
                    class="w-full p-4 rounded-xl border border-gray-200 
                        focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10 
                        outline-none resize-none transition-all bg-white font-medium"
                >${data.desc ?? ""}</textarea>

                <div class="flex justify-between mt-2 px-1">
                    <p class="text-[11px] text-gray-400">Keep it short and clear.</p>
                    <p class="text-[11px] font-bold text-gray-400">
                        <span data-char-current class="text-[--color-primary]">0</span>/120
                    </p>
                </div>
                <p id="error-desc" class="text-[11px] text-red-500 mt-1 hidden"></p>
            </div>
        </div>
    </div>
    `;
}
