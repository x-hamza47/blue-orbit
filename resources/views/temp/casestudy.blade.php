<section class="w-full bg-(--color-secondary) py-10 overflow-hidden">
    <div class="mx-auto max-w-480 px-[clamp(1.5rem,5vw,5rem)]">
{{-- @dd($data) --}}
        <!-- HEADING -->
        <div class="mb-12">
            <h2 class="font-black text-white leading-tight text-[clamp(1.875rem,5vw,3rem)]">
                 {{ $data['heading_main'] ?? "Client" }}<span class="text-(--color-primary)"> {{ $data['heading_highlight'] ?? "Case Studies" }}</span>
            </h2>
        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @foreach ($data['items'] as $item)

                @php
                    $isFeatured = !empty($item['featured']);
                @endphp

                <div
                    class="group md:p-10 sm:p-8 p-7 rounded-4xl sm:rounded-[3rem] transition-all duration-500 hover:-translate-y-2
                    {{ $isFeatured
                        ? 'bg-(--color-primary) shadow-2xl shadow-(--color-primary)/20'
                        : 'bg-white/5 border border-white/10 hover:bg-white/8' }}">

                    <!-- METRIC -->
                    <div class="md:mb-8 sm:mb-6 mb-4">
                        <span
                            class="font-black text-[clamp(2rem,5vw,4rem)]
                            {{ $isFeatured ? 'text-white' : 'text-(--color-primary)' }}">
                            {{ $item['metric'] }}
                        </span>
                    </div>

                    <!-- TITLE -->
                    <h3 class="font-black text-xl md:text-2xl sm:mb-2 mb-1
                        {{ $isFeatured ? 'text-white' : 'text-white' }}">
                        {{ $item['title'] }}
                    </h3>

                    <!-- TAGS -->
                    <div class="flex items-center gap-3 flex-wrap">

                        @foreach ($item['tags'] ?? [] as $index => $tag)

                            <span class="font-bold text-xs uppercase tracking-widest
                                {{ $isFeatured ? 'text-white/70' : 'text-gray-500' }}">
                                {{ $tag }}
                            </span>

                            @if(!$loop->last)
                                <span class="w-1 h-1 rounded-full
                                    {{ $isFeatured ? 'bg-white' : 'bg-(--color-primary)' }}"></span>
                            @endif

                        @endforeach

                    </div>

                </div>

            @endforeach

        </div>
    </div>
</section>