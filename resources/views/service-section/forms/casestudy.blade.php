<div class="grid grid-cols-1 gap-6 text-base text-left">

    <!-- SECTION HEADER -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Case Study Section
        </h3>

        <div>
            <label class="text-xs font-semibold text-gray-500">Heading Left</label>
            <input type="text" name="heading_main"
                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none"
                placeholder="Client">
        </div>

        <div class="mt-4">
            <label class="text-xs font-semibold text-gray-500">Heading Highlight</label>
            <input type="text" name="heading_highlight"
                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none"
                placeholder="Case Studies">
        </div>
    </div>

    <!-- ITEMS -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider">
                Case Study Items
            </h3>

            <button type="button" id="addCaseStudyBtn" onclick="addCaseStudy()"
                class="px-3 py-1.5 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg shadow hover:bg-[#010521] transition">
                + Add Case Study
            </button>
        </div>

        <div id="caseContainer" class="space-y-4"></div>

    </div>

</div>
