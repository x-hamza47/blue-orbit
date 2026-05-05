<div class="grid grid-cols-1 gap-6 text-base text-left">

    <!-- SECTION HEADER -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Industries Section
        </h3>
        <div class="space-y-4">
            <div>
                <label class="text-xs font-semibold text-gray-500">Description</label>
                <textarea name="subheading" rows="3"
                    placeholder="Enter section description..."
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none"
                >{{ $existing['subheading'] ?? '' }}</textarea>
                <small id="error-subheading" class="text-red-500 text-xs hidden"></small>
            </div>
        </div>
    </div>

    <!-- ITEMS -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5">

        <div data-dynamic-wrapper
             data-type="industries"
             data-existing='@json($existing["items"] ?? [])'>

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider">
                    Industries Items
                </h3>
                <button type="button" data-add
                    class="px-3 py-1.5 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg shadow hover:bg-[#010521] transition">
                    + Add Industry
                </button>
            </div>

            <div data-dynamic-container class="space-y-4"></div>

            <small id="error-items" class="text-red-500 text-xs hidden mt-2 block"></small>

        </div>
    </div>

</div>