<div class="space-y-6 text-left text-base">

    <!-- SECTION: HERO CONTENT -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
        <h3 class="text-xs font-black text-gray-500 uppercase mb-4 tracking-wider">
            Hero Content
        </h3>

        <div class="space-y-4">

            <!-- Heading -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Main Heading *</label>
                <textarea name="heading" rows="3"
                    placeholder="Enter main hero heading..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none"></textarea>
                <p class="text-xs text-red-500 mt-1 hidden" id="error-heading"></p>
            </div>

            <!-- Sub Heading -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Sub Heading</label>
                <input type="text" name="subheading"
                    placeholder="Enter supporting subtitle..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <p class="text-xs text-red-500 mt-1 hidden" id="error-subheading"></p>
            </div>

        </div>
    </div>

    <!-- SECTION: CTA -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
        <h3 class="text-xs font-black text-gray-500 uppercase mb-4 tracking-wider">
            Call To Action
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="text-xs font-semibold text-gray-500">Button Text *</label>
                <input type="text" name="button_text"
                    placeholder="e.g. Get Started"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <p class="text-xs text-red-500 mt-1 hidden" id="error-button_text"></p>
            </div>

            <div>
                <label class="text-xs font-semibold text-gray-500">Button Link</label>
                <input type="text" name="button_link"
                    placeholder="/contact or https://..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <p class="text-xs text-red-500 mt-1 hidden" id="error-button_link"></p>
            </div>

        </div>

        <div class="mt-4">
            <label class="text-xs font-semibold text-gray-500">Input Placeholder</label>
            <input type="text" name="input_placeholder"
                placeholder="e.g. Enter website URL"
                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
        </div>
    </div>

    <!-- SECTION: SOCIAL PROOF -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
        <h3 class="text-xs font-black text-gray-500 uppercase mb-4 tracking-wider">
            Social Proof
        </h3>

        <div class="space-y-4">

            <div>
                <label class="text-xs font-semibold text-gray-500">Review Text</label>
                <textarea name="review_text" rows="3"
                    placeholder="Customer testimonial..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none"></textarea>
                <p class="text-xs text-red-500 mt-1 hidden" id="error-review_text"></p>
            </div>

            <div>
                <label class="text-xs font-semibold text-gray-500">Reviewer Name</label>
                <input type="text" name="reviewer_name"
                    placeholder="e.g. John Doe"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <p class="text-xs text-red-500 mt-1 hidden" id="error-reviewer_name"></p>
            </div>

        </div>
    </div>

    <!-- SECTION: MEDIA -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
        <h3 class="text-xs font-black text-gray-500 uppercase mb-4 tracking-wider">
            Media
        </h3>

        <div>
            <label class="text-xs font-semibold text-gray-500">Image URL</label>
            <input type="text" name="image"
                placeholder="Paste image URL"
                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
            <p class="text-xs text-red-500 mt-1 hidden" id="error-image"></p>
        </div>
    </div>

</div>