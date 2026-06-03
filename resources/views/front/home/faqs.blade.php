<section id="faq" class="w-full bg-white md:px-12 sm:px-6 px-4 py-16 md:py-20 lg:py-24">

    <div class="max-w-4xl mx-auto">

        {{-- Section Header --}}
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest
                         text-(--color-primary) border border-(--color-primary)/30 bg-(--color-primary)/8
                         rounded-full px-4 py-1.5 mb-4">
                <i data-lucide="help-circle" class="w-3.5 h-3.5"></i>
                FAQs
            </span>
            <h2 class="montserrat font-extrabold text-(--color-secondary) leading-tight
                        lg:text-5xl md:text-4xl sm:text-3xl text-2xl mt-4">
                Answers to Your Most<br>
                <span class="text-(--color-primary)">Common Questions</span>
            </h2>
        </div>

        {{-- Accordion --}}
        <div class="flex flex-col divide-y divide-gray-100" id="faq-accordion">

            @php
            $faqs = [
                [
                    'q' => 'How much does digital marketing cost in the UAE?',
                    'a' => 'Digital marketing costs in the UAE typically range from AED 2,500/month for a focused single-channel package to AED 15,000+/month for full-service enterprise campaigns. At Blue Orbit, we offer three transparent tiers starting at AED 2,500/month — with no hidden fees and no long-term lock-in contracts.',
                ],
                [
                    'q' => 'How long does SEO take to show results in Dubai?',
                    'a' => 'Most clients begin seeing measurable improvements in keyword rankings within 60–90 days, with significant organic traffic growth by month 4–6. The UAE\'s competitive markets (real estate, healthcare, F&B) may take slightly longer. We provide transparent monthly reporting so you see progress every step of the way.',
                ],
                [
                    'q' => 'Do you create content in Arabic as well as English?',
                    'a' => 'Yes. All Blue Orbit Growth and Scale packages include bilingual content creation in both Arabic and English. Our in-house team of native Arabic copywriters ensures your brand voice is authentic — not machine-translated — for the UAE and wider GCC audience.',
                ],
                [
                    'q' => 'What makes Blue Orbit different from other Dubai digital marketing agencies?',
                    'a' => 'Three things: UAE market specialisation (every strategy is built for this market, not copied from a global template), full transparency (you get a real-time dashboard and monthly reporting with zero vanity metrics), and our proprietary LAUNCH framework, which is a structured 6-step growth system proven across 2,000+ UAE clients.',
                ],
                [
                    'q' => 'Do you work with businesses outside Dubai — Sharjah, Abu Dhabi, other Emirates?',
                    'a' => 'Absolutely. While we\'re based in Sharjah Publishing City, we serve clients across all seven Emirates and internationally. We have dedicated expertise for Sharjah, Abu Dhabi, Ajman, and Ras Al Khaimah markets, and we understand the subtle differences in audience behaviour between each Emirate.',
                ],
                [
                    'q' => 'Can you help a new UAE business with no existing digital presence?',
                    'a' => 'Yes — in fact many of our most successful case studies start from zero. We\'ve helped multiple startups in UAE free zones go from no website and no social presence to generating consistent organic leads within 4–6 months. Our Starter package is designed specifically for this.',
                ],
                [
                    'q' => 'Are there any lock-in contracts?',
                    'a' => 'No. All Blue Orbit packages are month-to-month. We earn your continued business through results, not contracts. We do recommend a minimum 3-month commitment for SEO campaigns to see meaningful results, but this is never legally binding.',
                ],
                [
                    'q' => 'How do you report on campaign performance?',
                    'a' => 'Every client gets access to a live reporting dashboard showing real-time data on traffic, rankings, leads, and ad spend. You\'ll also receive a structured monthly report with analysis, next month\'s plan, and a strategy call to discuss performance and direction.',
                ],
            ];
            @endphp

            @foreach ($faqs as $index => $faq)
            <div class="faq-item group" data-index="{{ $index }}">

                <button
                    onclick="toggleFaq({{ $index }})"
                    class="w-full flex items-center justify-between gap-6 py-5 text-left focus:outline-none">

                    <span class="font-semibold text-(--color-secondary) text-base md:text-lg leading-snug
                                 group-hover:text-(--color-primary) transition-colors pr-2">
                        {{ $faq['q'] }}
                    </span>

                    <span class="faq-icon flex-shrink-0 w-8 h-8 rounded-full border border-gray-200
                                 flex items-center justify-center transition-all duration-300
                                 group-hover:border-(--color-primary)/40 group-hover:bg-(--color-primary)/5">
                        <i data-lucide="plus" class="w-4 h-4 text-gray-400 faq-plus transition-all duration-300"></i>
                        <i data-lucide="minus" class="w-4 h-4 text-(--color-primary) faq-minus hidden transition-all duration-300"></i>
                    </span>

                </button>

                <div class="faq-body overflow-hidden transition-all duration-300 max-h-0">
                    <p class="text-gray-500 leading-relaxed text-sm md:text-base pb-5 pr-14">
                        {{ $faq['a'] }}
                    </p>
                </div>

            </div>
            @endforeach

        </div>

        {{-- Bottom CTA --}}
        <div class="mt-12 text-center">
            <p class="text-gray-500 text-sm mb-4">Still have questions? We're happy to help.</p>
            <a href="#contact"
                class="inline-flex items-center gap-2 bg-(--color-primary) text-white font-bold
                       rounded-full py-3 px-7 hover:bg-(--color-primary-hover) hover:scale-105
                       transition-all transform text-sm">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                Talk to Our Team
            </a>
        </div>

    </div>
</section>

{{-- FAQ Accordion Script --}}
<script>
function toggleFaq(index) {
    const items = document.querySelectorAll('.faq-item');
    const item  = items[index];
    const body  = item.querySelector('.faq-body');
    const plus  = item.querySelector('.faq-plus');
    const minus = item.querySelector('.faq-minus');
    const icon  = item.querySelector('.faq-icon');
    const isOpen = body.style.maxHeight && body.style.maxHeight !== '0px';

    // Close all
    items.forEach(el => {
        el.querySelector('.faq-body').style.maxHeight = '0px';
        el.querySelector('.faq-plus').classList.remove('hidden');
        el.querySelector('.faq-minus').classList.add('hidden');
        el.querySelector('.faq-icon').classList.remove('bg-(--color-primary)/10', 'border-(--color-primary)/40');
    });

    // Open clicked if it was closed
    if (!isOpen) {
        body.style.maxHeight = body.scrollHeight + 'px';
        plus.classList.add('hidden');
        minus.classList.remove('hidden');
        icon.classList.add('border-(--color-primary)/40');
        icon.style.background = 'rgba(67,115,246,0.08)';
    } else {
        icon.style.background = '';
    }
}
</script>