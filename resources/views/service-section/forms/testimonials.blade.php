<div class="grid grid-cols-1 gap-6 text-left">

    <!-- HEADER -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Section Header
        </h3>

        <div class="space-y-4">

            <div>
                <label class="text-xs font-semibold text-gray-500">Heading *</label>
                <input type="text" name="heading"
                    value="{{ $existing['heading'] ?? '' }}"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-heading" class="text-red-500 text-xs hidden"></small>
            </div>

            <div>
                <label class="text-xs font-semibold text-gray-500">Highlight *</label>
                <input type="text" name="highlight"
                    value="{{ $existing['highlight'] ?? '' }}"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-highlight" class="text-red-500 text-xs hidden"></small>
            </div>

        </div>
    </div>

    <!-- ITEMS -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Testimonials
        </h3>

        <div data-dynamic-wrapper
             data-type="testimonials"
             data-existing='@json($existing["items"] ?? [])'>

            <div data-dynamic-container class="space-y-6"></div>

            <small id="error-items" class="text-red-500 text-xs hidden"></small>

            <button type="button" data-add
                class="px-3 py-1.5 mt-4 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg hover:bg-[#010521] transition">
                + Add Testimonial
            </button>

        </div>

    </div>

</div>