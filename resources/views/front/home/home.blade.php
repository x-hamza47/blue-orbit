@extends('front.main')
@section('schema')
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Organization",
  "name": "Blue Orbit Digital Agency",
  "url": "https://blueorbitdigitalagency.com",
 "logo": "{{ asset('images/logo.jfif', true) }}"
  "telephone": "+971567716432",
  "email": "grow@blueorbitdigitalagency.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Business Center, Sharjah Publishing City Free Zone",
    "addressLocality": "Sharjah",
    "addressCountry": "AE"
  },
  "sameAs": [
    "https://www.instagram.com/blue.orbit.digital"
  ]
}
</script>
    <script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "How much does digital marketing cost in the UAE?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Digital marketing costs in the UAE typically range from AED 2,500/month for a focused single-channel package to AED 15,000+/month for full-service enterprise campaigns. At Blue Orbit, we offer three transparent tiers starting at AED 2,500/month — with no hidden fees and no long-term lock-in contracts."
            }
        },
        {
            "@type": "Question",
            "name": "How long does SEO take to show results in Dubai?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Most clients begin seeing measurable improvements in keyword rankings within 60–90 days, with significant organic traffic growth by month 4–6. The UAE's competitive markets (real estate, healthcare, F&B) may take slightly longer. We provide transparent monthly reporting so you see progress every step of the way."
            }
        },
        {
            "@type": "Question",
            "name": "Do you create content in Arabic as well as English?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes. All Blue Orbit Growth and Scale packages include bilingual content creation in both Arabic and English. Our in-house team of native Arabic copywriters ensures your brand voice is authentic — not machine-translated — for the UAE and wider GCC audience."
            }
        },
        {
            "@type": "Question",
            "name": "What makes Blue Orbit different from other Dubai digital marketing agencies?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Three things: UAE market specialisation (every strategy is built for this market, not copied from a global template), full transparency (you get a real-time dashboard and monthly reporting with zero vanity metrics), and our proprietary LAUNCH framework, which is a structured 6-step growth system proven across 2,000+ UAE clients."
            }
        },
        {
            "@type": "Question",
            "name": "Do you work with businesses outside Dubai — Sharjah, Abu Dhabi, other Emirates?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Absolutely. While we're based in Sharjah Publishing City, we serve clients across all seven Emirates and internationally. We have dedicated expertise for Sharjah, Abu Dhabi, Ajman, and Ras Al Khaimah markets, and we understand the subtle differences in audience behaviour between each Emirate."
            }
        },
        {
            "@type": "Question",
            "name": "Can you help a new UAE business with no existing digital presence?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes — in fact many of our most successful case studies start from zero. We've helped multiple startups in UAE free zones go from no website and no social presence to generating consistent organic leads within 4–6 months. Our Starter package is designed specifically for this."
            }
        },
        {
            "@type": "Question",
            "name": "Are there any lock-in contracts?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "No. All Blue Orbit packages are month-to-month. We earn your continued business through results, not contracts. We do recommend a minimum 3-month commitment for SEO campaigns to see meaningful results, but this is never legally binding."
            }
        },
        {
            "@type": "Question",
            "name": "How do you report on campaign performance?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Every client gets access to a live reporting dashboard showing real-time data on traffic, rankings, leads, and ad spend. You'll also receive a structured monthly report with analysis, next month's plan, and a strategy call to discuss performance and direction."
            }
        }
    ]
}
</script>
@endsection

@section('content')
    {{-- ! Hero Section --}}
    @include('front.home.hero')

    @include('front.home.badges')

    {{-- ! About Section --}}
    @include('front.home.about')
    @include('front.home.results')
    {{-- ! Services Section --}}
    @include('front.home.services')
    @include('front.home.industries')
    {{-- ! Why Choose Us Section --}}
    @include('front.home.whyUs')
    @include('front.home.caseStudies')
    {{-- ! Process Section --}}
    @include('front.home.process')



    {{-- ! Testimonials Section --}}
    @include('front.home.testimonials')

    @include('front.home.pricing')
    {{-- @include('front.home.workflow') --}}

    @include('front.home.faqs')

    {{-- ! Contact Section --}}
    @include('front.home.contact')
@endsection

{{-- Info: Scripts & Styles --}}

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initSwiper({
                selector: ".testimonialSwiper",
                lg: 3,
            });
        });
    </script>
    <script>
        (function() {
            const items = document.querySelectorAll('.stat-item');

            const runCounter = (el) => {
                const target = parseFloat(el.dataset.value);
                const decimals = parseInt(el.dataset.decimals) || 0;
                const numEl = el.querySelector('.stat-number');
                const duration = 1800;
                const start = performance.now();

                const ease = t => t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;

                const tick = (now) => {
                    const elapsed = now - start;
                    const progress = Math.min(elapsed / duration, 1);
                    const current = target * ease(progress);
                    numEl.textContent = decimals ?
                        current.toFixed(decimals) :
                        Math.floor(current).toLocaleString();
                    if (progress < 1) requestAnimationFrame(tick);
                    else numEl.textContent = decimals ? target.toFixed(decimals) : target.toLocaleString();
                };
                requestAnimationFrame(tick);
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        // Fade + slide in
                        el.classList.remove('opacity-0', 'translate-y-6');
                        el.classList.add('opacity-100', 'translate-y-0');
                        runCounter(el);
                        observer.unobserve(el);
                    }
                });
            }, {
                threshold: 0.3
            });

            items.forEach(el => observer.observe(el));
        })();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bubble = entry.target.querySelector('.step-number');
                        const delay = parseInt(entry.target.dataset.index) * 150;
                        if (bubble) {
                            setTimeout(() => {
                                bubble.classList.add('step-number--animated');
                            }, delay);
                        }
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.2
            });

            document.querySelectorAll('.launch-card').forEach(card => observer.observe(card));
        });
    </script>
@endpush

@push('styles')
    @vite('resources/css/testimonialSwiper.css')
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <style>
.script-text {
    font-family: 'Great Vibes', cursive;
    font-weight: 400;
    text-transform: none;
    letter-spacing: 0;
    line-height: 0.85;
    vertical-align: middle;
    display: inline-block;
    transform: rotate(-4deg) scale(1.58);
    transition: transform 0.3s ease;
}

.script-text:hover {
    transform: rotate(-4deg) scale(1.15);
}
    </style>
@endpush
