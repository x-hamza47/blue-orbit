export function authorForm(data = {}) {
    return `
    <div class="space-y-6 text-sm">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-6 gap-y-5">

            <!-- NAME -->
            <div class="group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2
                              group-focus-within:text-[--color-primary] transition-colors">
                    Full Name
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400
                                 group-focus-within:text-[--color-primary] transition-colors">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </span>
                    <input type="text" name="name" value="${data.name ?? ""}"
                        data-slug-source
                        data-slug-suffix="authors"
                        placeholder="Jane Doe"
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                               focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10
                               outline-none transition-all bg-white font-medium placeholder:text-gray-300">
                </div>
                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-name"></p>
            </div>

            <!-- SLUG -->
            <div class="group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2
                              group-focus-within:text-[--color-primary] transition-colors">
                    Slug
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                        <i data-lucide="link" class="w-4 h-4"></i>
                    </span>
                    <input type="text" name="slug" value="${data.slug ?? ""}"
                        data-slug-target
                        placeholder="auto-generated-slug"
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-100
                               bg-gray-50/50 text-gray-500
                               focus:border-[--color-primary] outline-none transition-all"
                        >
                </div>
                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-slug"></p>
            </div>

            <!-- DESIGNATION -->
            <div class="group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2
                              group-focus-within:text-[--color-primary] transition-colors">
                    Designation
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400
                                 group-focus-within:text-[--color-primary] transition-colors">
                        <i data-lucide="briefcase" class="w-4 h-4"></i>
                    </span>
                    <input type="text" name="designation" value="${data.designation ?? ""}"
                        placeholder="Senior Developer"
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                               focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10
                               outline-none transition-all bg-white font-medium placeholder:text-gray-300">
                </div>
                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-designation"></p>
            </div>

            <!-- COMPANY -->
            <div class="group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2
                              group-focus-within:text-[--color-primary] transition-colors">
                    Company
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400
                                 group-focus-within:text-[--color-primary] transition-colors">
                        <i data-lucide="building-2" class="w-4 h-4"></i>
                    </span>
                    <input type="text" name="company" value="${data.company ?? ""}"
                        placeholder="Acme Corp"
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                               focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10
                               outline-none transition-all bg-white font-medium placeholder:text-gray-300">
                </div>
                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-company"></p>
            </div>

            <!-- LINKEDIN -->
            <div class="group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2
                              group-focus-within:text-[--color-primary] transition-colors">
                    LinkedIn URL
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400
                                 group-focus-within:text-[--color-primary] transition-colors">
                        <i data-lucide="linkedin" class="w-4 h-4"></i>
                    </span>
                    <input type="url" name="linkedin_url" value="${data.linkedin_url ?? ""}"
                        placeholder="https://linkedin.com/in/username"
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                               focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10
                               outline-none transition-all bg-white font-medium placeholder:text-gray-300">
                </div>
                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-linkedin_url"></p>
            </div>

            <!-- TWITTER -->
            <div class="group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2
                              group-focus-within:text-[--color-primary] transition-colors">
                    Twitter / X URL
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400
                                 group-focus-within:text-[--color-primary] transition-colors">
                        <i data-lucide="twitter" class="w-4 h-4"></i>
                    </span>
                    <input type="url" name="twitter_url" value="${data.twitter_url ?? ""}"
                        placeholder="https://x.com/username"
                        class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                               focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10
                               outline-none transition-all bg-white font-medium placeholder:text-gray-300">
                </div>
                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-twitter_url"></p>
            </div>

            <!-- BIO -->
            <div class="lg:col-span-2 group">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2
                              group-focus-within:text-[--color-primary] transition-colors">
                    Bio
                </label>
                <textarea name="bio" rows="3" maxlength="300"
                    data-char-count data-char-type="bio"
                    placeholder="A short bio about the author..."
                    class="w-full p-4 rounded-xl border border-gray-200
                           focus:border-[--color-primary] focus:ring-4 focus:ring-[--color-primary]/10
                           outline-none resize-none transition-all bg-white font-medium"
                >${data.bio ?? ""}</textarea>
                <div class="flex justify-between mt-2 px-1">
                    <p class="text-[11px] text-gray-400">Keep it short and clear.</p>
                    <p class="text-[11px] font-bold text-gray-400">
                        <span data-char-current data-char-type="bio" class="text-[--color-primary]">0</span>/300
                    </p>
                </div>
                <p class="text-[11px] text-red-500 mt-1 hidden" id="error-bio"></p>
            </div>

            <!-- AVATAR UPLOAD -->
            <div class="lg:col-span-2">
                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-3">
                    Profile Photo
                </label>

                <div class="flex items-center gap-5">

                    <!-- PREVIEW -->
                    <div id="avatar-preview"
                        class="w-16 h-16 rounded-2xl bg-gray-100 border-2 border-white shadow-sm
                               flex items-center justify-center text-gray-300 overflow-hidden shrink-0">
                        ${data.image
                            ? `<img src="/storage/${data.image}" class="w-full h-full object-cover">`
                            : `<i data-lucide="user" class="w-6 h-6"></i>`
                        }
                    </div>

                    <!-- FILE INPUT -->
                    <label class="flex-1 flex flex-col items-center justify-center gap-2 p-5
                                  rounded-2xl border-2 border-dashed border-gray-200
                                  hover:border-[--color-primary] hover:bg-[--color-primary]/5
                                  cursor-pointer transition-all group/upload">
                        <i data-lucide="upload-cloud" class="w-5 h-5 text-gray-400 group-hover/upload:text-[--color-primary] transition-colors"></i>
                        <span class="text-[11px] font-bold text-gray-400 group-hover/upload:text-[--color-primary] uppercase tracking-widest transition-colors">
                            Click to upload
                        </span>
                        <span class="text-[10px] text-gray-300">JPG, PNG, WEBP — max 4 MB</span>
                        <input type="file" name="image" accept="image/*" class="sr-only" id="avatar-input">
                    </label>
                </div>

                <p class="text-[11px] text-red-500 mt-1.5 hidden" id="error-image"></p>
            </div>

        </div>
    </div>
    `;
}