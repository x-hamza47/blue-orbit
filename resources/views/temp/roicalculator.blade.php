<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">

            <!-- LEFT -->
            <div class="lg:col-span-6">
                <div class="mb-12">
                    <h2 class="font-black text-(--color-secondary) leading-tight text-[clamp(1.875rem,5vw,3rem)] mb-2">
                        ROI <span class="text-(--color-primary)">Calculator</span>
                    </h2>
                    <p class="text-gray-500 font-medium leading-relaxed text-base sm:text-lg">
                        Enter your current metrics to see how our customized digital marketing strategies can scale your
                        monthly revenue and lead generation.
                    </p>
                </div>

                <div class="space-y-6">

                    <!-- Budget -->
                    <div>
                        <label class="block text-(--color-secondary) font-black uppercase tracking-widest sm:text-xs text-[10px] mb-2.5">
                            Monthly Budget ($)
                        </label>
                        <input type="number" id="roi-budget"
                            value="2000"
                            class="w-full bg-[#F8FAFF] border-2 border-(--color-primary)/30 focus:border-(--color-primary) focus:bg-white rounded-xl px-4 py-3 outline-none font-bold">
                    </div>

                    <!-- Industry -->
                    <div>
                        <label class="block text-(--color-secondary) font-black uppercase tracking-widest sm:text-xs text-[10px] mb-2.5">
                            Industry
                        </label>
                        <select id="roi-industry"
                            class="w-full bg-[#F8FAFF] border-2 border-(--color-primary)/30 focus:border-(--color-primary) focus:bg-white rounded-xl px-4 py-3 outline-none font-bold">

                            @foreach($section['data']['industries'] ?? [] as $industry)
                                <option value="{{ $industry['value'] }}">
                                    {{ $industry['label'] }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Traffic -->
                    <div>
                        <label class="block text-(--color-secondary) font-black uppercase tracking-widest sm:text-xs text-[10px] mb-2.5">
                            Current Monthly Traffic
                        </label>
                        <input type="number" id="roi-traffic"
                            value="1500"
                            class="w-full bg-[#F8FAFF] border-2 border-(--color-primary)/30 focus:border-(--color-primary) focus:bg-white rounded-xl px-4 py-3 outline-none font-bold">
                    </div>

                </div>
            </div>

            <!-- RIGHT -->
            <div class="lg:col-span-6">
                <div class="bg-(--color-secondary) p-8 rounded-3xl shadow-xl relative overflow-hidden">

                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-(--color-primary) rounded-full blur-[10px] opacity-20"></div>

                    <div class="relative z-10 space-y-10">

                        <!-- Leads -->
                        <div>
                            <p class="text-(--color-primary) font-black uppercase tracking-[0.2em] text-xs mb-4">
                                Projected Leads (Month 3)
                            </p>
                            <div class="flex items-baseline gap-2">
                                <span id="out-leads" class="text-white font-black text-[clamp(2.5rem,5.5vw,4rem)]">0</span>
                                <span class="text-gray-400 font-bold">leads</span>
                            </div>
                        </div>

                        <!-- Revenue -->
                        <div>
                            <p class="text-(--color-primary) font-black uppercase tracking-[0.2em] text-xs mb-4">
                                Projected Revenue (Month 6)
                            </p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-white font-black text-[clamp(2.5rem,5.5vw,4rem)]">$</span>
                                <span id="out-revenue" class="text-white font-black text-[clamp(2.5rem,5.5vw,4rem)]">0</span>
                            </div>
                        </div>

                        <hr class="border-white/10">

                        <!-- CTA -->
                        <button class="w-full bg-(--color-primary) hover:bg-white hover:text-(--color-primary) text-white py-5 rounded-xl font-black uppercase tracking-widest text-sm transition">
                            {{ $section['data']['button_text'] ?? 'Claim Now' }}
                        </button>

                        <p class="text-center text-gray-400 text-[10px] font-bold uppercase tracking-widest">
                            {{ $section['data']['disclaimer'] ?? '' }}
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    const budgetInput = document.getElementById('roi-budget');
    const trafficInput = document.getElementById('roi-traffic');
    const industrySelect = document.getElementById('roi-industry');

    const outLeads = document.getElementById('out-leads');
    const outRevenue = document.getElementById('out-revenue');

    // Backend Data (FIXED)
    const industries = @json($section['data']['industries'] ?? []);

    const budgetCoefficient = {{ $section['data']['budget_coefficient'] ?? 0.04 }};
    const trafficCoefficient = {{ $section['data']['traffic_coefficient'] ?? 0.066 }};
    const revenueMultiplier = {{ $section['data']['revenue_multiplier'] ?? 133.33 }};

    function getIndustryMultiplier(value) {
        const found = industries.find(i => i.value === value);
        return found ? parseFloat(found.multiplier) : 1;
    }

    function calculateROI() {
        const budget = parseFloat(budgetInput.value) || 0;
        const traffic = parseFloat(trafficInput.value) || 0;
        const industryMultiplier = getIndustryMultiplier(industrySelect.value);

        const leads = Math.round(
            (budget * budgetCoefficient) +
            (traffic * trafficCoefficient * industryMultiplier)
        );

        const revenue = Math.round(leads * revenueMultiplier);

        outLeads.innerText = leads.toLocaleString();
        outRevenue.innerText = revenue.toLocaleString();
    }

    [budgetInput, trafficInput, industrySelect].forEach(el => {
        el.addEventListener('input', calculateROI);
    });

    calculateROI();
</script>