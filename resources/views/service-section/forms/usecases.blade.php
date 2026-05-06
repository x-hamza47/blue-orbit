@php $d = $existing ?? []; @endphp

<div class="grid grid-cols-1 gap-6 text-base text-left">

    {{-- SECTION: HEADER --}}
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">Section Header</h3>
        <div class="space-y-4">
            <div>
                <label class="text-xs font-semibold text-gray-500">Main Heading *</label>
                <input type="text" name="heading" value="{{ $d['heading'] ?? '' }}"
                    placeholder="Impactful Marketing for Your Specific Industry"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-heading" class="text-red-500 text-xs hidden"></small>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500">Highlighted Part *</label>
                <input type="text" name="heading_highlight" value="{{ $d['heading_highlight'] ?? '' }}"
                    placeholder="Your Specific Industry"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <p class="text-[10px] text-gray-400 mt-1">This part will be highlighted in blue inside the heading.</p>
                <small id="error-heading_highlight" class="text-red-500 text-xs hidden"></small>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500">Subheading</label>
                <textarea name="subheading" rows="3"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">{{ $d['subheading'] ?? '' }}</textarea>
                <small id="error-subheading" class="text-red-500 text-xs hidden"></small>
            </div>
        </div>
    </div>

    {{-- SECTION: INDUSTRY CARDS --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">Industry Cards</h3>

        <div data-dynamic-wrapper data-type="usecases"
            data-existing='@json($d["items"] ?? [])'>

            <div data-dynamic-container class="space-y-4"></div>

            <small id="error-items" class="text-red-500 text-xs hidden mt-2 block"></small>

            <button type="button" data-add
                class="px-3 mt-4 py-1.5 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg shadow hover:bg-[#010521] transition">
                + Add Industry
            </button>

        </div>
    </div>

    {{-- SECTION: CTA BANNER --}}
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">CTA Banner</h3>
        <div class="space-y-4">
            <div>
                <label class="text-xs font-semibold text-gray-500">CTA Heading</label>
                <input type="text" name="cta_heading" value="{{ $d['cta_heading'] ?? '' }}"
                    placeholder="Don't see your industry here?"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-cta_heading" class="text-red-500 text-xs hidden"></small>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500">CTA Subheading</label>
                <input type="text" name="cta_subheading" value="{{ $d['cta_subheading'] ?? '' }}"
                    placeholder="We've worked with 30+ industries..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-cta_subheading" class="text-red-500 text-xs hidden"></small>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-500">Button Text</label>
                    <input type="text" name="cta_button_text" value="{{ $d['cta_button_text'] ?? '' }}"
                        placeholder="View All 30+ Sectors"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                    <small id="error-cta_button_text" class="text-red-500 text-xs hidden"></small>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-500">Button Link</label>
                    <input type="text" name="cta_button_link" value="{{ $d['cta_button_link'] ?? '' }}"
                        placeholder="/services"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                    <small id="error-cta_button_link" class="text-red-500 text-xs hidden"></small>
                </div>
            </div>
        </div>
    </div>

</div>