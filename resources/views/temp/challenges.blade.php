<section class="w-full bg-white py-10">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">

        <!-- HEADER -->
        <div class="mb-8 max-w-4xl">
            <h2 class="font-black text-[#010521] leading-tight mb-6 text-[clamp(1.875rem,5vw,3rem)] ">

                {{ $data['heading'] ?? '' }}

                @if(!empty($data['subheading']))
                    <br>
                    <span class="text-[#4373F6]">
                        {{ $data['subheading'] }}
                    </span>
                @endif

            </h2>
        </div>

        <!-- ITEMS -->
        <div class="space-y-6">

            @foreach($data['items'] ?? [] as $item)

                <div
                    class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-gray-100 rounded-4xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">

                    <!-- ISSUE -->
                    <div class="lg:col-span-4 bg-[#F8FAFF] p-5 md:p-10 border-b lg:border-b-0 lg:border-r border-gray-100">

                        <span class="text-[#010521] font-black text-xs uppercase tracking-[0.2em] mb-2 md:mb-4 block opacity-50">
                            Issue
                        </span>

                        <p class="text-[#010521] font-bold text-lg leading-relaxed">
                            {{ $item['issue'] ?? '' }}
                        </p>

                    </div>

                    <!-- FIXED -->
                    <div class="lg:col-span-8 bg-white p-5 md:p-10 relative">

                        <span class="text-[#4373F6] font-black text-xs uppercase tracking-[0.2em] mb-2 md:mb-4  block">
                            Fixed
                        </span>

                        <p class="text-gray-600 font-medium text-lg leading-relaxed mb-4 md:mb-6">
                            {{ $item['fixed'] ?? '' }}
                        </p>

                        @if(!empty($item['result']))
                            <div class="flex items-center gap-2 text-[#4373F6] font-black text-sm uppercase tracking-wider">
                                <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                                {{ $item['result'] }}
                            </div>
                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>