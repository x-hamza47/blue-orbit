<div class="grid grid-cols-1 gap-6 text-base text-left">

    <!-- SECTION: HEADER -->
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
                <label class="text-xs font-semibold text-gray-500">Description</label>
                <textarea name="subheading" rows="3"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none"
                >{{ $existing['subheading'] ?? '' }}</textarea>
                <small id="error-subheading" class="text-red-500 text-xs hidden"></small>
            </div>
        </div>
    </div>

    <!-- SECTION: SUPPORT BOX -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Support Box
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-xs font-semibold text-gray-500">Title</label>
                <input type="text" name="support_title"
                    value="{{ $existing['support_title'] ?? '' }}"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-support_title" class="text-red-500 text-xs hidden"></small>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500">Email</label>
                <input type="email" name="support_email"
                    value="{{ $existing['support_email'] ?? '' }}"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-support_email" class="text-red-500 text-xs hidden"></small>
            </div>
            <div class="md:col-span-2">
                <label class="text-xs font-semibold text-gray-500">Support Text</label>
                <textarea name="support_text" rows="2"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none"
                >{{ $existing['support_text'] ?? '' }}</textarea>
                <small id="error-support_text" class="text-red-500 text-xs hidden"></small>
            </div>
        </div>
    </div>

    <!-- SECTION: FAQ LIST -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs mb-4 font-black text-gray-500 uppercase tracking-wider">FAQs</h3>

        <div data-dynamic-wrapper
             data-type="faqs"
             data-existing='@json($existing["faqs"] ?? [])'>

            <div data-dynamic-container class="space-y-4"></div>

            <small id="error-faqs" class="text-red-500 text-xs hidden mt-2 block"></small>

            <button type="button" data-add
                class="px-3 mt-4 py-1.5 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg shadow hover:bg-[#010521] transition">
                + Add Question
            </button>
        </div>
    </div>

</div>