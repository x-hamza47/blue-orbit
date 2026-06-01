<div class="grid grid-cols-1 gap-6 text-base text-left">

    {{-- ================= HEADER ================= --}}
    <div class="bg-gray-300 border border-gray-100 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Section Header
        </h3>

        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-500">Heading</label>
                    <input type="text" name="heading" value="{{ $existing['heading'] ?? '' }}"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                    <small id="error-heading" class="text-red-500 text-xs hidden"></small>
                </div>

                <div>
                    <label class="text-xs font-semibold text-gray-500">Highlight Text</label>
                    <input type="text" name="highlight" value="{{ $existing['highlight'] ?? '' }}"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                    <small id="error-highlight" class="text-red-500 text-xs hidden"></small>
                </div>
            </div>


            <div>
                <label class="text-xs font-semibold text-gray-500">Subheading (paragraph)</label>
                <textarea name="subheading" rows="2"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">{{ $existing['subheading'] ?? '' }}</textarea>
                <small id="error-subheading" class="text-red-500 text-xs hidden"></small>
            </div>

        </div>
    </div>

    {{-- ================= PLANS ================= --}}
    <div class="bg-gray-300 border border-gray-100 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Plan Columns
        </h3>

        <div class="grid grid-cols-1 gap-4">

            @php
                $plans = $existing['plans'] ?? [
                    ['name' => '', 'price' => '', 'highlighted' => 1, 'badge' => ''],
                    ['name' => '', 'price' => '', 'highlighted' => 1, 'badge' => ''],
                    ['name' => '', 'price' => '', 'highlighted' => 0, 'badge' => ''],
                ];
            @endphp

            @foreach ($plans as $pi => $plan)
                <div class="bg-blue-50 border border-gray-100 rounded-2xl p-4">

                    <p class="text-xs font-black text-gray-400 uppercase tracking-wider mb-3">
                        Plan {{ $pi + 1 }}
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center gap-2 mt-6 col-span-full">
                            @php $cbId = 'plan-highlighted-' . $pi; @endphp
                            <input type="hidden" name="plans[{{ $pi }}][highlighted]" value="0">
                            <input type="checkbox" name="plans[{{ $pi }}][highlighted]" value="1"
                                id="{{ $cbId }}" {{ ($plan['highlighted'] ?? 0) == 1 ? 'checked' : '' }}
                                class="w-4 h-4 accent-[#4373F6]">
                            <label for="{{ $cbId }}" class="text-xs font-semibold text-gray-500">
                                Highlighted Column (dark header)
                            </label>
                        </div>

                        <div>
                            <label class="text-xs font-semibold text-gray-500">Plan Name *</label>
                            <input type="text" name="plans[{{ $pi }}][name]"
                                value="{{ $plan['name'] ?? '' }}" placeholder="e.g. Starter SEO"
                                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                            <small id="error-plans.{{ $pi }}.name"
                                class="text-red-500 text-xs hidden"></small>
                        </div>

                        <div>
                            <label class="text-xs font-semibold text-gray-500">Price Range *</label>
                            <input type="text" name="plans[{{ $pi }}][price]"
                                value="{{ $plan['price'] ?? '' }}" placeholder="e.g. $750 – $1,500 / mo"
                                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                            <small id="error-plans.{{ $pi }}.price"
                                class="text-red-500 text-xs hidden"></small>
                        </div>

                        <div class="col-span-2">
                            <label class="text-xs font-semibold text-gray-500">Badge Label <span
                                    class="text-gray-300">(optional — e.g. Most Popular)</span></label>
                            <input type="text" name="plans[{{ $pi }}][badge]"
                                value="{{ $plan['badge'] ?? '' }}" placeholder="Leave blank for none"
                                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                        </div>



                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- ================= ROWS ================= --}}
    <div class="bg-blue-400 border border-gray-200 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-100 uppercase tracking-wider mb-1">
            Pricing Rows
        </h3>
        <p class="text-xs text-gray-800 mb-4">Add up to 12 feature rows. Each row maps one value per plan column.</p>

        <div data-dynamic-wrapper data-type="pricing_rows" data-existing='@json($existing['rows'] ?? [])'>

            <div data-dynamic-container class="space-y-4"></div>

            <small id="error-rows" class="text-red-500 text-xs hidden"></small>

            <button type="button" data-add
                class="px-3 swal2-confirm py-1.5 mt-4 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg hover:bg-[#010521] transition">
                + Add Row
            </button>

        </div>

    </div>

    {{-- ================= FOOTER ================= --}}
    <div class="bg-gray-300 border border-gray-100 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Footer
        </h3>

        <div class="space-y-4">

            <div>
                <label class="text-xs font-semibold text-gray-500">Footer Note</label>
                <input type="text" name="footer_note" value="{{ $existing['footer_note'] ?? '' }}"
                    placeholder="e.g. ✓ Free initial SEO audit · No setup fees · Cancel anytime"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                <small id="error-footer_note" class="text-red-500 text-xs hidden"></small>
            </div>

            {{-- CTAs --}}
            <div class="bg-blue-50 border border-gray-100 rounded-2xl p-4">

                <p class="text-xs font-black text-gray-400 uppercase tracking-wider mb-3">CTA Buttons</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    @php
                        $ctas = $existing['ctas'] ?? [
                            ['label' => '', 'url' => '#', 'primary' => 1],
                            ['label' => '', 'url' => '#', 'primary' => 0],
                        ];
                    @endphp

                    @foreach ($ctas as $ci => $cta)
                        <div class="border border-gray-100 rounded-xl p-3 space-y-3">

                            <p class="text-[10px] font-black text-gray-300 uppercase tracking-widest">
                                Button {{ $ci + 1 }} {{ $ci === 0 ? '(Primary)' : '(Outline)' }}
                            </p>

                            <div>
                                <label class="text-xs font-semibold text-gray-500">Label</label>
                                <input type="text" name="ctas[{{ $ci }}][label]"
                                    value="{{ $cta['label'] ?? '' }}" placeholder="e.g. Get a Custom Quote"
                                    class="w-full mt-1.5 p-2.5 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none text-sm">
                                <small id="error-ctas.{{ $ci }}.label"
                                    class="text-red-500 text-xs hidden"></small>
                            </div>

                            <div>
                                <label class="text-xs font-semibold text-gray-500">URL</label>
                                <input type="text" name="ctas[{{ $ci }}][url]"
                                    value="{{ $cta['url'] ?? '#' }}" placeholder="/contact"
                                    class="w-full mt-1.5 p-2.5 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none text-sm">
                            </div>

                            <input type="hidden" name="ctas[{{ $ci }}][primary]"
                                value="{{ $cta['primary'] ?? ($ci === 0 ? 1 : 0) }}">

                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

</div>
