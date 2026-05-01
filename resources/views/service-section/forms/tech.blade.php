<div class="grid grid-cols-1 gap-6 text-base text-left">

    <!-- HEADER -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5 order-last">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Section Header
        </h3>

        <div class="space-y-4">

            <!-- Heading -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Heading *</label>
                <input type="text" name="heading"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-heading" class="text-red-500 text-xs hidden"></small>
            </div>

            <!-- Subheading -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Description</label>
                <textarea name="subheading" rows="3"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none"></textarea>
                <small id="error-subheading" class="text-red-500 text-xs hidden"></small>
            </div>

        </div>
    </div>

    <!-- ITEMS -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5 order-first">

        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider">
            Items
        </h3>


        <div id="itemsContainer" class="space-y-3"></div>

        <button type="button" onclick="addItem()"
            class="px-3 py-1.5 mt-4 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg hover:bg-[#010521] transition">
            + Add Item
        </button>
    </div>

</div>
