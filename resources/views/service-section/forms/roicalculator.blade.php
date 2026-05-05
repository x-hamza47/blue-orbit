<div class="grid grid-cols-1 gap-6 text-base text-left">

    <!-- FORMULA -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Formula Coefficients
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div>
                <label class="text-xs font-semibold text-gray-500">Budget Coefficient *</label>
                <input type="number" step="0.001" name="budget_coefficient"
                    value="{{ $existing['budget_coefficient'] ?? 0.04 }}"
                    placeholder="e.g. 0.04"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-budget_coefficient" class="text-red-500 text-xs hidden"></small>
            </div>

            <div>
                <label class="text-xs font-semibold text-gray-500">Traffic Coefficient *</label>
                <input type="number" step="0.001" name="traffic_coefficient"
                    value="{{ $existing['traffic_coefficient'] ?? 0.066 }}"
                    placeholder="e.g. 0.066"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-traffic_coefficient" class="text-red-500 text-xs hidden"></small>
            </div>

            <div>
                <label class="text-xs font-semibold text-gray-500">Revenue Multiplier *</label>
                <input type="number" step="0.01" name="revenue_multiplier"
                    value="{{ $existing['revenue_multiplier'] ?? 133.33 }}"
                    placeholder="e.g. 133.33"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-revenue_multiplier" class="text-red-500 text-xs hidden"></small>
            </div>

        </div>
    </div>

    <!-- CTA -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Call To Action
        </h3>
        <div class="space-y-4">

            <div>
                <label class="text-xs font-semibold text-gray-500">Button Text *</label>
                <input type="text" name="button_text"
                    value="{{ $existing['button_text'] ?? '' }}"
                    placeholder="Claim Your Free Strategy Session"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-button_text" class="text-red-500 text-xs hidden"></small>
            </div>

            <div>
                <label class="text-xs font-semibold text-gray-500">Disclaimer Text</label>
                <input type="text" name="disclaimer"
                    value="{{ $existing['disclaimer'] ?? '' }}"
                    placeholder="Based on historical industry benchmarks"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-disclaimer" class="text-red-500 text-xs hidden"></small>
            </div>

        </div>
    </div>

    <!-- INDUSTRIES -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5">

        <div data-dynamic-wrapper
             data-type="roicalculator"
             data-existing='@json($existing["industries"] ?? [])'>

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider">
                    Industries
                </h3>
                <button type="button" data-add
                    class="px-3 py-1.5 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg shadow hover:bg-[#010521] transition">
                    + Add Industry
                </button>
            </div>

            <div data-dynamic-container class="space-y-4"></div>

            <small id="error-industries" class="text-red-500 text-xs hidden mt-2 block"></small>

        </div>
    </div>

</div>