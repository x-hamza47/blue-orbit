<section id="pricing" class="w-full bg-[#f8f9fb] md:px-12 sm:px-6 px-4 py-20">

    <div class="max-w-7xl mx-auto w-full">

        {{-- Section Header --}}
        <div class="flex flex-col items-center text-center mb-14">
            <span class="text-(--color-primary) uppercase tracking-widest text-sm font-semibold mb-3">
                Transparent Pricing
            </span>
            <h2 class="montserrat font-extrabold text-(--color-secondary) lg:text-4xl md:text-3xl text-2xl leading-tight mb-4">
                Simple, Honest Pricing for
                <span class="text-(--color-primary)">UAE Businesses</span>
            </h2>
            <p class="text-gray-500 max-w-2xl text-base leading-relaxed">
                No hidden fees. No lock-in contracts. Cancel anytime. Every plan includes dedicated account management and monthly reporting.
            </p>
        </div>

        {{-- Pricing Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">

            @php
                $plans = $data['plans'] ?? [
                    [
                        'name'       => 'Starter',
                        'price'      => 'AED 2,500',
                        'period'     => '/mo',
                        'tagline'    => 'Perfect for startups & small businesses',
                        'featured'   => false,
                        'cta_label'  => 'Get Started',
                        'cta_link'   => '#contact',
                        'features'   => [
                            '1 core service (SEO or Social or PPC)',
                            'Monthly performance report',
                            'Dedicated account manager',
                            'WhatsApp support',
                            'Up to 5 keywords tracked',
                        ],
                    ],
                    [
                        'name'       => 'Growth',
                        'price'      => 'AED 6,000',
                        'period'     => '/mo',
                        'tagline'    => 'Best for growing SMEs in UAE',
                        'featured'   => true,
                        'cta_label'  => 'Get Started',
                        'cta_link'   => '#contact',
                        'features'   => [
                            '3 core services (choose from full list)',
                            'Bi-weekly performance reports',
                            'Senior account manager',
                            'Priority WhatsApp + email support',
                            'Up to 25 keywords tracked',
                            'Monthly strategy review call',
                            'Arabic + English content included',
                        ],
                    ],
                    [
                        'name'       => 'Scale',
                        'price'      => 'AED 12,000',
                        'period'     => '+/mo',
                        'tagline'    => 'For enterprises & fast-growing brands',
                        'featured'   => false,
                        'cta_label'  => 'Book a Strategy Call',
                        'cta_link'   => '#contact',
                        'features'   => [
                            'Full-service digital marketing suite',
                            'Weekly performance dashboards',
                            'Dedicated senior team (3+ specialists)',
                            '24/7 priority support',
                            'Unlimited keywords tracked',
                            'Competitor intelligence reports',
                            'Custom AI marketing automation',
                            'Quarterly strategy planning sessions',
                        ],
                    ],
                ];
            @endphp

            @foreach($plans as $plan)

                <div class="flex flex-col rounded-3xl p-8 transition-all duration-300
                    {{ $plan['featured']
                        ? 'bg-(--color-primary) text-white shadow-2xl shadow-(--color-secondary)/20 scale-105'
                        : 'bg-white border border-gray-300 hover:shadow-lg hover:border-(--color-primary)/20' }}">

                    {{-- Most Popular Badge --}}
                    @if($plan['featured'])
                        <div class="flex items-center justify-center gap-2 mb-6">
                            <span class="text-yellow-400 text-xs">★</span>
                            <span class="text-(--color-gold) uppercase tracking-widest text-xs font-black">Most Popular</span>
                            <span class="text-yellow-400 text-xs">★</span>
                        </div>
                    @endif

                    {{-- Plan Name --}}
                    <p class="uppercase tracking-widest text-xs font-black mb-4
                        {{ $plan['featured'] ? 'text-white/60' : 'text-gray-400' }}">
                        {{ $plan['name'] }}
                    </p>

                    {{-- Price --}}
                    <div class="flex items-end gap-1 mb-2">
                        <span class="montserrat font-black text-4xl md:text-5xl leading-none
                            {{ $plan['featured'] ? 'text-white' : 'text-(--color-secondary)' }}">
                            {{ $plan['price'] }}
                        </span>
                        <span class="text-sm font-semibold mb-1
                            {{ $plan['featured'] ? 'text-white/60' : 'text-gray-400' }}">
                            {{ $plan['period'] }}
                        </span>
                    </div>

                    {{-- Tagline --}}
                    <p class="text-sm mb-8
                        {{ $plan['featured'] ? 'text-white/70' : 'text-gray-500' }}">
                        {{ $plan['tagline'] }}
                    </p>

                    {{-- Divider --}}
                    <div class="border-t mb-8
                        {{ $plan['featured'] ? 'border-white/10' : 'border-gray-100' }}"></div>

                    {{-- Features --}}
                    <ul class="flex flex-col gap-3 mb-10 flex-1">
                        @foreach($plan['features'] as $feature)
                            <li class="flex items-start gap-3 text-sm
                                {{ $plan['featured'] ? 'text-white/80' : 'text-gray-600' }}">
                                <i data-lucide="check-circle"
                                    class="w-4 h-4 shrink-0 mt-0.5
                                    {{ $plan['featured'] ? 'text-(--color-gold)' : 'text-(--color-primary)' }}">
                                </i>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>

                    {{-- CTA --}}
                    <a href="{{ $plan['cta_link'] }}"
                        class="flex items-center justify-center gap-2 font-bold rounded-full py-3 px-7 transition-all duration-300 text-sm
                        {{ $plan['featured']
                            ? 'bg-(--color-gold) text-white hover:brightness-110'
                            : 'border border-(--color-primary) text-(--color-primary) hover:bg-(--color-primary) hover:text-white' }}">
                        {{ $plan['cta_label'] }}
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>