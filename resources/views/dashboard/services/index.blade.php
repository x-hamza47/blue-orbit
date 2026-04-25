@extends('dashboard.layout.main')

@section('content')
    <main class="flex-1 flex flex-col h-screen overflow-hidden">

        <!-- Header -->
        <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 shrink-0">
            <h1 class="font-black text-xl text-[#010521]">
                Services <span class="text-gray-300 font-light mx-2">/</span> Management
            </h1>
            <div class="p-2 bg-[#4373F6]/5 hover:bg-[#4373F6] hover:text-white rounded-xl text-[#4373F6] transition-all">
                <i data-lucide="plus" class="w-6 h-6"></i>
            </div>

        </header>

        <!-- Content -->
        <div class="flex-1 overflow-y-auto p-8 custom-scrollbar bg-[#F8FAFF]">

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                @foreach ($services as $service)
                    <div
                        class="bg-white p-6 rounded-2xl border border-gray-300 shadow-sm hover:shadow-md transition-all group">

                        <!-- Top -->
                        <div class="flex justify-between items-start mb-4">

                            <!-- Icon -->
                            <div class="p-3 bg-[#4373F6]/5 rounded-2xl text-[#4373F6]">
                                <i data-lucide="{{ $service->icon }}" class="w-6 h-6"></i>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <button
                                    class="w-9 h-9 rounded-xl bg-gray-50 text-[#010521] hover:bg-[#4373F6] hover:text-white transition flex items-center justify-center">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </button>

                                <button
                                    class="w-9 h-9 rounded-xl bg-gray-50 text-red-500 hover:bg-red-500 hover:text-white transition flex items-center justify-center">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>

                        <h3 class="text-lg font-black text-[#010521] mb-2">
                            {{ $service->title }}
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            {{ $service->desc }}
                        </p>

                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
            <div class="bg-white rounded-4xl border border-gray-100 p-6 flex items-center justify-between">

                <p class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">
                    Showing {{ $services->firstItem() ?? 0 }} - {{ $services->lastItem() ?? 0 }}
                </p>

                <div class="flex gap-2">

                    @if ($services->onFirstPage())
                        <span
                            class="px-4 py-2 rounded-xl bg-white border border-gray-100 text-[10px] font-black uppercase text-gray-200 cursor-not-allowed">
                            Prev
                        </span>
                    @else
                        <a href="{{ $services->previousPageUrl() }}"
                            class="px-4 py-2 rounded-xl bg-white border border-gray-100 text-[10px] font-black uppercase text-gray-400 hover:bg-gray-50">
                            Prev
                        </a>
                    @endif

                    @if ($services->hasMorePages())
                        <a href="{{ $services->nextPageUrl() }}"
                            class="px-4 py-2 rounded-xl bg-[#010521] text-white text-[10px] font-black uppercase shadow-lg shadow-[#010521]/10 hover:bg-[#4373F6]">
                            Next
                        </a>
                    @else
                        <span
                            class="px-4 py-2 rounded-xl bg-gray-200 text-white text-[10px] font-black uppercase cursor-not-allowed">
                            Next
                        </span>
                    @endif

                </div>
            </div>

        </div>
    </main>
@endsection
