<div class="grid grid-cols-1 gap-6 text-base text-left">

    {{-- Section Header Fields --}}
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Services Section
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-xs font-semibold text-gray-500">Heading</label>
                <input type="text" name="heading"
                    value="{{ $existing['heading'] ?? '' }}"
                    placeholder="Our Digital"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500">Heading Highlight</label>
                <input type="text" name="heading_highlight"
                    value="{{ $existing['heading_highlight'] ?? '' }}"
                    placeholder="Marketing Services"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
            </div>
        </div>

        <div class="mt-4">
            <label class="text-xs font-semibold text-gray-500">Subheading</label>
            <textarea name="subheading" rows="3"
                placeholder="Digital marketing services at Blue Orbit..."
                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">{{ $existing['subheading'] ?? '' }}</textarea>
        </div>
    </div>

    {{-- Dynamic Service Cards --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-5">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider">
                Service Items
            </h3>
        </div>

        <div data-dynamic-wrapper
             data-type="services"
             data-existing='@json($existing["items"] ?? [])'>

            <div data-dynamic-container class="space-y-4"></div>

            <small id="error-items" class="text-red-500 text-xs hidden mt-2 block"></small>

            <button type="button" data-add
                class="px-3 mt-4 py-1.5 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg shadow hover:bg-[#010521] transition">
                + Add Service
            </button>

        </div>
    </div>

</div>