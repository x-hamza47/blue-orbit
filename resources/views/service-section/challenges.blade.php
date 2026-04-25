<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="mb-8 max-w-4xl">
            <h2 class="font-black text-[#010521] leading-tight mb-6" style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                How BlueOrbit’s {{ $service->title }} <br><span class="text-[#4373F6]">Consulting Helps</span>
            </h2>
            <p class="text-gray-500 text-lg font-medium">
                {{ $data['subheading'] ?? 'Challenges We Solve' }}
            </p>
        </div>

        <div class="space-y-6">
            @foreach ($data['items'] as $item)
                <div
                    class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-gray-100 rounded-4xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div
                        class="lg:col-span-4 bg-[#F8FAFF] p-8 md:p-10 border-b lg:border-b-0 lg:border-r border-gray-100">
                        <span
                            class="text-[#010521] font-black text-xs uppercase tracking-[0.2em] mb-4 block opacity-50">Issue</span>
                        <p class="text-[#010521] font-bold text-lg leading-relaxed">{{ $item['issue'] }}</p>
                    </div>
                    <div class="lg:col-span-8 bg-white p-8 md:p-10 relative">
                        <span
                            class="text-[#4373F6] font-black text-xs uppercase tracking-[0.2em] mb-4 block">Fixed</span>
                        <p class="text-gray-600 font-medium text-lg leading-relaxed mb-6">{{ $item['fix'] }}</p>
                        <div class="flex items-center gap-2 text-[#4373F6] font-black text-sm uppercase tracking-wider">
                            <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                            {{ $item['result'] }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="space-y-6">

            <div
                class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-gray-100 rounded-4xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="lg:col-span-4 bg-[#F8FAFF] p-8 md:p-10 border-b lg:border-b-0 lg:border-r border-gray-100">
                    <span
                        class="text-[#010521] font-black text-xs uppercase tracking-[0.2em] mb-4 block opacity-50">Issue</span>
                    <p class="text-[#010521] font-bold text-lg leading-relaxed">
                        Disjointed channel management where social, search, and email teams operate in silos with
                        conflicting goals.
                    </p>
                </div>
                <div class="lg:col-span-8 bg-white p-8 md:p-10 relative">
                    <span class="text-[#4373F6] font-black text-xs uppercase tracking-[0.2em] mb-4 block">Fixed</span>
                    <p class="text-gray-600 font-medium text-lg leading-relaxed mb-6">
                        BlueOrbit integrates your entire digital ecosystem under a single unified strategy, ensuring
                        consistent brand messaging and cross-channel attribution modeling.
                    </p>
                    <div class="flex items-center gap-2 text-[#4373F6] font-black text-sm uppercase tracking-wider">
                        <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                        You get a 360° view of your customer journey.
                    </div>
                </div>
            </div>

            <div
                class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-gray-100 rounded-4xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="lg:col-span-4 bg-[#F8FAFF] p-8 md:p-10 border-b lg:border-b-0 lg:border-r border-gray-100">
                    <span
                        class="text-[#010521] font-black text-xs uppercase tracking-[0.2em] mb-4 block opacity-50">Issue</span>
                    <p class="text-[#010521] font-bold text-lg leading-relaxed">
                        Lack of data-driven mindset: Marketing decisions are made based on "gut feeling" rather than
                        hard metrics.
                    </p>
                </div>
                <div class="lg:col-span-8 bg-white p-8 md:p-10 relative">
                    <span class="text-[#4373F6] font-black text-xs uppercase tracking-[0.2em] mb-4 block">Fixed</span>
                    <p class="text-gray-600 font-medium text-lg leading-relaxed mb-6">
                        We implement a robust "Growth-First" infrastructure, incorporating real-time BI dashboards and
                        A/B testing frameworks into every campaign.
                    </p>
                    <div class="flex items-center gap-2 text-[#4373F6] font-black text-sm uppercase tracking-wider">
                        <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                        You get predictable, scalable ROI performance.
                    </div>
                </div>
            </div>

            <div
                class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-gray-100 rounded-4xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="lg:col-span-4 bg-[#F8FAFF] p-8 md:p-10 border-b lg:border-b-0 lg:border-r border-gray-100">
                    <span
                        class="text-[#010521] font-black text-xs uppercase tracking-[0.2em] mb-4 block opacity-50">Issue</span>
                    <p class="text-[#010521] font-bold text-lg leading-relaxed">
                        Struggling to keep up with rapid tech changes like GenAI and shifting platform algorithms.
                    </p>
                </div>
                <div class="lg:col-span-8 bg-white p-8 md:p-10 relative">
                    <span class="text-[#4373F6] font-black text-xs uppercase tracking-[0.2em] mb-4 block">Fixed</span>
                    <p class="text-gray-600 font-medium text-lg leading-relaxed mb-6">
                        Continuous training and implementation of cutting-edge tech (GenAI content optimization, AI
                        bidding) + clearly documented playbooks for your internal teams.
                    </p>
                    <div class="flex items-center gap-2 text-[#4373F6] font-black text-sm uppercase tracking-wider">
                        <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                        You get a future-proofed marketing stack.
                    </div>
                </div>
            </div>

            <div
                class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-gray-100 rounded-4xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="lg:col-span-4 bg-[#F8FAFF] p-8 md:p-10 border-b lg:border-b-0 lg:border-r border-gray-100">
                    <span
                        class="text-[#010521] font-black text-xs uppercase tracking-[0.2em] mb-4 block opacity-50">Issue</span>
                    <p class="text-[#010521] font-bold text-lg leading-relaxed">
                        High overhead of maintaining a full-scale in-house CMO and creative department.
                    </p>
                </div>
                <div class="lg:col-span-8 bg-white p-8 md:p-10 relative">
                    <span class="text-[#4373F6] font-black text-xs uppercase tracking-[0.2em] mb-4 block">Fixed</span>
                    <p class="text-gray-600 font-medium text-lg leading-relaxed mb-6">
                        Fractional CMO services and an easily scalable team of specialists (SEO, PPC, Creative)
                        available on-demand without the cost of full-time hires.
                    </p>
                    <div class="flex items-center gap-2 text-[#4373F6] font-black text-sm uppercase tracking-wider">
                        <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                        You get elite talent at a fraction of the TCO.
                    </div>
                </div>
            </div>

        </div> --}}
    </div>
</section>
