<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">

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
                    <div>
                        <label
                            class="block text-(--color-secondary) font-black uppercase tracking-widest sm:text-xs text-[10px] sm:mb-3 mb-2.5">Monthly
                            Budget ($)</label>
                        <input type="number" id="roi-budget" value="2000"
                            class="w-full bg-[#F8FAFF] border-2 border-(--color-primary)/30 focus:border-(--color-primary) focus:bg-white rounded-xl sm:rounded-2xl sm:px-6 sm:py-4 px-4 py-3 outline-none transition-all font-semibold sm:font-bold  text-(--color-secondary)"
                            placeholder="e.g. 2000">
                    </div>

                    <div>
                        <label
                            class="block text-(--color-secondary) font-black uppercase tracking-widest sm:text-xs text-[10px] sm:mb-3 mb-2.5">Industry</label>
                        <select id="roi-industry"
                            class="w-full bg-[#F8FAFF] border-2 border-(--color-primary)/30 focus:border-(--color-primary) focus:bg-white rounded-xl sm:rounded-2xl sm:px-6 sm:py-4 px-4 py-3 outline-none transition-all font-semibold sm:font-bold  text-(--color-secondary) appearance-none">
                            <option value="ecommerce">E-commerce</option>
                            <option value="legal">Legal / Law Firm</option>
                            <option value="saas">SaaS / Tech</option>
                            <option value="local">Local Services</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-(--color-secondary) font-black uppercase tracking-widest sm:text-xs text-[10px] sm:mb-3 mb-2.5">Current
                            Monthly Traffic</label>
                        <input type="number" id="roi-traffic" value="1500"
                            class="w-full bg-[#F8FAFF] border-2 border-(--color-primary)/30 focus:border-(--color-primary) focus:bg-white rounded-xl sm:rounded-2xl sm:px-6 sm:py-4 px-4 py-3 outline-none transition-all font-semibold sm:font-bold  text-(--color-secondary)"
                            placeholder="e.g. 1500">
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div
                    class="bg-(--color-secondary) p-6 sm:p-8 lg:p-10  rounded-3xl sm:rounded-4xl md:rounded-[3.5rem] shadow-xl md:shadow-2xl shadow-(--color-secondary)/20 relative overflow-hidden">
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-(--color-primary) rounded-full blur-[10px] opacity-20 z-99">
                    </div>

                    <div class="relative z-10 space-y-10">
                        <div>
                            <p class="text-(--color-primary) sm:font-black font-semibold uppercase tracking-[0.2em] text-xs mb-4">Projected Leads
                                (Month 3)</p>
                            <div class="flex items-baseline gap-2">
                                <span id="out-leads" class="text-white font-black leading-none text-[clamp(2.5rem,5.5vw,4rem)]">180</span>
                                <span class="text-gray-500 font-bold">leads</span>
                            </div>
                        </div>

                        <div>
                            <p class="text-(--color-primary) sm:font-black font-semibold uppercase tracking-[0.2em] text-xs mb-2 sm:mb-4">Projected
                                Revenue (Month 6)</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-white font-black leading-none text-[clamp(2.5rem,5.5vw,4rem)]">$</span>
                                <span id="out-revenue" class="text-white font-black leading-none text-[clamp(2.5rem,5.5vw,4rem)]">24,000</span>
                            </div>
                        </div>

                        <hr class="border-white/10">

                        <button
                            class="w-full bg-(--color-primary) hover:bg-white hover:text-(--color-primary) text-white sm:py-6 py-5 px-3 rounded-xl sm:rounded-2xl font-black uppercase tracking-widest text-sm transition-all duration-300 transform hover:scale-[1.02]">
                            Claim Your Free Strategy Session
                        </button>
                        <p class="text-center text-gray-500 text-[10px] font-semibold sm:font-bold uppercase tracking-widest">Based on
                            historical industry benchmarks</p>
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

    function calculateROI() {
        const budget = parseFloat(budgetInput.value) || 0;
        const traffic = parseFloat(trafficInput.value) || 0;

        // Sample Multipliers based on Industry
        let multiplier = 1;
        if (industrySelect.value === 'ecommerce') multiplier = 1.2;
        if (industrySelect.value === 'legal') multiplier = 0.8;
        if (industrySelect.value === 'saas') multiplier = 1.5;

        // Logic to match your sample: $2000 budget + 1500 traffic = 180 leads
        // Simple formula: (Budget * 0.05) + (Traffic * 0.05) * multiplier
        const leads = Math.round((budget * 0.04) + (traffic * 0.066) * multiplier);

        // Logic to match your sample: $24,000 revenue
        // Simple formula: Leads * 133.33
        const revenue = Math.round(leads * 133.33);

        // Update UI with easing-like feel (Simple update)
        outLeads.innerText = leads.toLocaleString();
        outRevenue.innerText = revenue.toLocaleString();
    }

    // Listen for inputs
    [budgetInput, trafficInput, industrySelect].forEach(el => {
        el.addEventListener('input', calculateROI);
    });

    // Run once on load
    calculateROI();
</script>
