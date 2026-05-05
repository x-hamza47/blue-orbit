<div class="space-y-6 text-left text-base">

    <!-- SECTION: CONTENT -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
        <h3 class="text-xs font-black text-gray-500 uppercase mb-4 tracking-wider">
            Content
        </h3>

        <div class="space-y-4">

            <div>
                <label class="text-xs font-semibold text-gray-500">Heading *</label>
                <textarea name="heading" rows="3"
                    placeholder="Ready to grow? Let's create your winning strategy..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none"
                >{{ $existing['heading'] ?? '' }}</textarea>
                <small id="error-heading" class="text-red-500 text-xs hidden"></small>
            </div>

            <div>
                <label class="text-xs font-semibold text-gray-500">Subheading</label>
                <input type="text" name="subheading"
                    value="{{ $existing['subheading'] ?? '' }}"
                    placeholder="Build around your goals, backed by data..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-subheading" class="text-red-500 text-xs hidden"></small>
            </div>

        </div>
    </div>

    <!-- SECTION: BUTTON -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
        <h3 class="text-xs font-black text-gray-500 uppercase mb-4 tracking-wider">
            Call To Action
        </h3>

        <div class="space-y-4">

            <div>
                <label class="text-xs font-semibold text-gray-500">Button Text *</label>
                <input type="text" name="button_text"
                    value="{{ $existing['button_text'] ?? '' }}"
                    placeholder="Book Your Free Call"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-button_text" class="text-red-500 text-xs hidden"></small>
            </div>

            <div>
                <label class="text-xs font-semibold text-gray-500">Button Link</label>
                <input type="text" name="button_link"
                    value="{{ $existing['button_link'] ?? '' }}"
                    placeholder="/booking or https://..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-button_link" class="text-red-500 text-xs hidden"></small>
            </div>

        </div>
    </div>

</div>