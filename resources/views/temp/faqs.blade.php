<section class="w-full bg-[#FCFDFF] py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="grid grid-cols-1 lg:grid-cols-12 sm:gap-14 gap-12 md:gap-16">

            <div class="lg:col-span-5">
                <div class="sticky top-24">
                    <h2
                        class="font-black text-(--color-secondary) leading-tight mb-2 sm:mb-4 text-[clamp(1.875rem,5vw,3rem)]">
                        {!! $section->data['heading'] ?? 'Everything You <span class="text-[#4373F6]">Need to Know</span>' !!}
                    </h2>
                    <p class="text-gray-500 text-base sm:text-lg leading-relaxed font-medium">
                        {{ $section->data['subheading'] ?? "Transparent answers about our $service->title processes, ROI expectations, and how we
                        scale your brand." }}
                    </p>
                    <div
                        class="md:p-8 sm:p-7 p-6 bg-(--color-secondary) rounded-3xl md:rounded-4xl text-white mt-5 sm:mt-7">
                        <h4 class="font-bold text-xl mb-2">{{ $section->data['support_title'] ?? 'Still have questions?' }}</h4>
                        <p class="text-gray-400 sm:mb-6 mb-5 text-sm"> {{ $section->data['support_text'] ?? "Our strategy team is ready to help you navigate your
                            growth journey." }}</p>
                        <a href="mailto:grow@blueorbitdigitalagency.com"
                            class="text-(--color-primary) font-black uppercase tracking-widest text-xs border-b-2 border-(--color-primary) pb-1 hover:text-white hover:border-white transition-all">Contact
                            Support</a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-4">

                @forelse ($section->data['faqs'] ?? [] as $faq)
                    <div
                        class="faq-item group bg-white border border-gray-100 rounded-2xl md:rounded-3xl overflow-hidden transition-all duration-300">
                        <button
                            class="faq-trigger w-full flex items-center justify-between sm:p-6 p-5 md:p-8 text-left">
                            <span
                                class="text-(--color-secondary) sm:font-black font-semibold text-base md:text-lg lg:text-xl pr-8 group-hover:text-(--color-primary) transition-colors">
                                {{ $faq['question'] }}
                            </span>
                            <div
                                class="sm:w-8 sm:h-8 w-6 h-6 rounded-full border-2 border-gray-100 flex items-center justify-center shrink-0 transition-all group-[.active]:bg-(--color-primary) group-[.active]:border-(--color-primary)">
                                <i data-lucide="plus"
                                    class="sm:w-4 sm:h-4 w-3.5 h-3.5 text-gray-400 transition-all group-[.active]:rotate-45 group-[.active]:text-white"></i>
                            </div>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                            <div
                                class="sm:px-8 px-6 md:pb-8 pb-6 text-gray-500 font-medium text-sm sm:text-base leading-relaxed">
                                  {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-400 text-sm">No FAQs available.</p>
                @endforelse
 
            </div>
        </div>
    </div>
</section>

@push('scripts')
    @vite('resources/js/faqs.js')
@endpush
