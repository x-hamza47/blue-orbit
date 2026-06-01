<section class="w-full bg-[#FCFDFF] py-10 overflow-hidden">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)] relative">

        <div class="absolute -top-16 -right-16 w-80 h-80 bg-(--color-primary) rounded-full opacity-5 "></div>

        <div class="mb-12 relative z-10">
            <h2 class="font-black text-(--color-secondary) leading-tight text-[clamp(1.875rem,5vw,3rem)]">
                {{ $data['heading'] ?? 'Comparison' }}
                <span class="text-(--color-primary)">
                    {{ $data['highlight'] ?? 'Why Choose Us' }}
                </span>
            </h2>
        </div>

        <div
            class="bg-white rounded-4xl sm:rounded-[3rem] border border-gray-100 shadow-sm overflow-hidden z-9 relative">

            <div
                class="grid grid-cols-1 md:grid-cols-4 items-center bg-gray-50/50 border-b border-gray-100 divide-x divide-gray-100 md:divide-x-0">
                <div class="p-6 sm:p-8  hidden md:block">
                    <span class="text-(--color-secondary) font-black uppercase tracking-widest text-sm">Feature</span>
                </div>
                <div
                    class="p-6 sm:p-8  bg-(--color-secondary) text-white rounded-t-[2.5rem] md:rounded-t-none md:rounded-l-none text-center">
                    <span class="font-black uppercase tracking-widest text-sm">
                        {{ $data['us_label'] ?? 'Us' }}
                    </span>
                </div>
                <div class="p-6 sm:p-8  text-center bg-gray-50 md:bg-transparent">
                   {{ $data['agency_label'] ?? 'Agency' }}
                </div>
                <div class="p-6 sm:p-8  text-center bg-gray-50 md:bg-transparent">
                   {{ $data['diy_label'] ?? 'DIY' }}
                </div>
            </div>

            <div class="divide-y sm:divide-gray-50 divide-gray-400">

                @foreach ($data['items'] ?? [] as $item)
                    <div
                        class="grid grid-cols-1 md:grid-cols-4 items-stretch divide-x divide-gray-50 md:divide-x-0 group">


                        <!-- Feature -->
                        <div class="p-6 flex items-center md:bg-gray-50/20">
                            <span class="text-(--color-secondary) font-bold">
                                {{ $item['feature'] }}
                            </span>
                        </div>

                        <!-- Us -->
                        <div class="p-6 bg-(--color-secondary)/5 border-l-4 border-l-(--color-primary) relative">
                            <span class="absolute top-4 right-4 text-(--color-primary)">✓</span>
                            <p>{{ $item['us_text'] }}</p>
                        </div>

                        <!-- Agency -->
                        <div class="p-6 flex items-start">
                            <span class="text-gray-400 mr-2">X</span>
                            <p>{{ $item['agency_text'] }}</p>
                        </div>

                        <!-- DIY -->
                        <div class="p-6 flex items-start">
                            <span class="text-gray-400 mr-2">X</span>
                            <p>{{ $item['diy_text'] }}</p>
                        </div>


                    </div>
                @endforeach


            </div>

        </div>
    </div>
</section>
