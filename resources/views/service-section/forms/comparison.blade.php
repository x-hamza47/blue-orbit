<div class="grid grid-cols-1 gap-6 text-base text-left">

    <!-- ================= HEADER ================= -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Section Header
        </h3>

        <div class="space-y-4">

            <!-- Heading -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Heading *</label>
                <input type="text" name="heading" value="{{ $existing['heading'] ?? '' }}"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

                <small id="error-heading" class="text-red-500 text-xs hidden"></small>
            </div>

            <!-- Highlight (Why Choose Us) -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Highlight Text *</label>
                <input type="text" name="highlight" value="{{ $existing['highlight'] ?? '' }}"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

                <small id="error-highlight" class="text-red-500 text-xs hidden"></small>
            </div>

        </div>

        <!-- ================= COLUMN LABELS ================= -->
        <div class="bg-white border border-gray-100 rounded-2xl p-5 mt-2">

            <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
                Column Labels
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Your Label -->
                <div>
                    <label class="text-xs font-semibold text-gray-500">Your Label *</label>
                    <input type="text" name="us_label" value="{{ $existing['us_label'] ?? '' }}"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

                    <small id="error-us_label" class="text-red-500 text-xs hidden"></small>
                </div>

                <!-- Agency -->
                <div>
                    <label class="text-xs font-semibold text-gray-500">Agency Label *</label>
                    <input type="text" name="agency_label" value="{{ $existing['agency_label'] ?? '' }}"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

                    <small id="error-agency_label" class="text-red-500 text-xs hidden"></small>
                </div>

                <!-- DIY -->
                <div>
                    <label class="text-xs font-semibold text-gray-500">DIY Label *</label>
                    <input type="text" name="diy_label" value="{{ $existing['diy_label'] ?? '' }}"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

                    <small id="error-diy_label" class="text-red-500 text-xs hidden"></small>
                </div>

            </div>

        </div>
    </div>



    <!-- ================= ITEMS ================= -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Comparison Rows
        </h3>

        <div data-dynamic-wrapper data-type="comparison" data-existing='@json($existing['items'] ?? [])'>

            <div data-dynamic-container class="space-y-6"></div>

            <small id="error-items" class="text-red-500 text-xs hidden"></small>

            <button type="button" data-add
                class="px-3 py-1.5 mt-4 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg hover:bg-[#010521] transition">
                + Add Row
            </button>

        </div>

    </div>

</div>
