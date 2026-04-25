<section class="w-full bg-[#010521] py-20 overflow-hidden relative">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-[#4373F6] opacity-5 -skew-x-12 translate-x-1/2"></div>

    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)] relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div>
                <h2 class="font-black text-white leading-tight mb-8" style="font-size: clamp(2.5rem, 6vw, 3.5rem);">
                    {{ $data['heading'] }}
                </h2>

                <div class="space-y-6">

                    @foreach ($data['items'] as $item)
                        <div class="flex gap-6 group">
                            <div
                                class="w-12 h-12 shrink-0 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center group-hover:bg-[#4373F6] transition-all duration-300">
                                <i data-lucide="{{ $item['icon'] }}"
                                    class="w-6 h-6 text-[#4373F6] group-hover:text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-black text-xl mb-1">{{ $item['title'] }}</h4>
                                <p class="text-gray-400 font-medium">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-[3rem] p-8 md:p-12">
                <h5 class="text-white font-bold uppercase tracking-widest text-xs mb-8 text-center opacity-50">
                    Authorized Strategic Partners</h5>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 mb-4">
                    <div
                        class="flex items-center justify-center grayscale hover:grayscale-0 transition-all opacity-60 hover:opacity-100">
                        <i class="devicon-google-plain text-4xl text-white"></i>
                    </div>
                    <div
                        class="flex items-center justify-center grayscale hover:grayscale-0 transition-all opacity-60 hover:opacity-100">
                        <i class="devicon-amazonwebservices-plain-wordmark text-4xl text-white"></i>
                    </div>
                    <div
                        class="flex items-center justify-center grayscale hover:grayscale-0 transition-all opacity-60 hover:opacity-100">
                        <i class="devicon-salesforce-plain text-4xl text-white"></i>
                    </div>
                    <div
                        class="flex items-center justify-center grayscale hover:grayscale-0 transition-all opacity-60 hover:opacity-100">
                        <i class="devicon-adobe-plain text-4xl text-white"></i>
                    </div>
                    <div
                        class="flex items-center justify-center grayscale hover:grayscale-0 transition-all opacity-60 hover:opacity-100">
                        <i class="devicon-hubspot-plain text-4xl text-white"></i>
                    </div>
                </div>

                <div class="pt-8 border-t border-white/10">
                    <p class="text-white/80 font-bold text-sm mb-4">Core Competencies:</p>
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="bg-white/10 text-white px-4 py-2 rounded-full text-xs font-bold border border-white/10 hover:bg-[#4373F6] transition-colors cursor-default">AWS
                            Certified Solutions Architect</span>
                        <span
                            class="bg-white/10 text-white px-4 py-2 rounded-full text-xs font-bold border border-white/10 hover:bg-[#4373F6] transition-colors cursor-default">Google
                            Ads Search Professional</span>
                        <span
                            class="bg-white/10 text-white px-4 py-2 rounded-full text-xs font-bold border border-white/10 hover:bg-[#4373F6] transition-colors cursor-default">Adobe
                            Certified Expert</span>
                        <span
                            class="bg-white/10 text-white px-4 py-2 rounded-full text-xs font-bold border border-white/10 hover:bg-[#4373F6] transition-colors cursor-default">Meta
                            Certified Lead Trainer</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


@push('servicestyles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
@endpush
