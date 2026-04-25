<section class="w-full bg-[#FCFDFF] py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">

            <div class="lg:col-span-5">
                <div class="sticky top-24">
                    <h2 class="font-black text-[#010521] leading-tight mb-6"
                        style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                        Everything You <span class="text-[#4373F6]">Need to Know</span>
                    </h2>
                    <p class="text-gray-500 text-lg leading-relaxed font-medium mb-8">
                        Transparent answers about our {{ $service->title }} processes, ROI expectations, and how we
                        scale
                        your brand.
                    </p>
                    <div class="p-8 bg-[#010521] rounded-4xl text-white">
                        <h4 class="font-bold text-xl mb-2">Still have questions?</h4>
                        <p class="text-gray-400 mb-6 text-sm">Our strategy team is ready to help you navigate your
                            growth journey.</p>
                        <a href="mailto:support@yourbrand.com"
                            class="text-[#4373F6] font-black uppercase tracking-widest text-xs border-b-2 border-[#4373F6] pb-1 hover:text-white hover:border-white transition-all">Contact
                            Support</a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-4">
                @foreach ($data['items'] as $item)
                    <div
                        class="faq-item group bg-white border border-gray-100 rounded-3xl overflow-hidden transition-all duration-300">
                        <button class="faq-trigger w-full flex items-center justify-between p-8 text-left">
                            <span
                                class="text-[#010521] font-black text-xl pr-8 group-hover:text-[#4373F6] transition-colors">{{ $item['question'] }}</span>
                            <div
                                class="w-8 h-8 rounded-full border-2 border-gray-100 flex items-center justify-center shrink-0 transition-all group-[.active]:bg-[#4373F6] group-[.active]:border-[#4373F6]">
                                <i data-lucide="plus"
                                    class="w-4 h-4 text-gray-400 transition-all group-[.active]:rotate-45 group-[.active]:text-white"></i>
                            </div>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                            <div class="px-8 pb-8 text-gray-500 font-medium leading-relaxed">
                                {{ $item['answer'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('scripts')
    @vite('resources/js/faqs.js')
@endpush
