@extends('dashboard.layout.main')

@section('content')
    <div class="flex-1 overflow-y-auto p-8 custom-scrollbar bg-[#F8FAFF]">


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-[#4373F6]/5 rounded-2xl text-[#4373F6]">
                        <i data-lucide="layers" class="w-6 h-6"></i>
                    </div>

                    <span class="text-green-500 font-bold text-xs flex items-center gap-1 bg-green-50 px-2 py-1 rounded-lg">
                        +{{ $parentServices }}
                    </span>
                </div>

                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">
                    Total Services
                </p>

                <h3 class="text-2xl font-black text-[#010521]">
                    {{ $parentServices }}
                </h3>
            </div>

            <div class="bg-[#010521] p-6 rounded-[2rem] shadow-lg shadow-[#010521]/20 group transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-white/10 rounded-2xl text-[#4373F6]">
                        <i data-lucide="star" class="w-6 h-6"></i>
                    </div>

                    <span
                        class="text-white font-bold text-[10px] uppercase tracking-widest bg-[#4373F6] px-2 py-1 rounded-lg">
                        Featured
                    </span>
                </div>

                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">
                    Active Services
                </p>

                <h3 class="text-2xl font-black text-white">
                    {{ $activeServices }}
                </h3>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-gray-50 flex flex-wrap items-center justify-between gap-4">

                {{-- Left --}}
                <div class="flex items-center gap-4">
                    <h4 class="text-lg font-black text-[#010521]">Services</h4>

                    <div class="flex gap-2">

                        <a href="?filter=all"
                            class="px-3 py-1 text-[10px] font-black uppercase rounded-lg border
               {{ request('filter') != 'home' ? 'bg-[#4373F6]/5 text-[#4373F6] border-[#4373F6]/10' : 'bg-gray-50 text-gray-400 border-gray-100' }}">
                            All
                        </a>

                        <a href="?filter=home"
                            class="px-3 py-1 text-[10px] font-black uppercase rounded-lg border
               {{ request('filter') == 'home' ? 'bg-[#4373F6]/5 text-[#4373F6] border-[#4373F6]/10' : 'bg-gray-50 text-gray-400 border-gray-100' }}">
                            On Home
                        </a>

                    </div>
                </div>

                {{-- Right --}}
                <div class="flex items-center gap-3">

                    <button type="button" data-title="Create Service" data-submit-url="{{ route('service.store') }}"
                        class="service-open-form px-4 py-2 bg-[#010521] text-white text-[10px] font-black uppercase rounded-xl shadow-lg hover:bg-[#4373F6] transition">
                        + Add Service
                    </button>

                </div>

            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Service</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Sub Services</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Status</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-50 js-sortable" data-order-url="{{ route('service.reorder') }}">
                        @foreach ($services as $service)
                            <tr class="hover:bg-gray-50/50 group js-item" data-id="{{ $service->id }}">

                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">

                                        <span class="w-10 h-10 rounded-xl flex items-center justify-center"
                                            style="background-color: {{ $service->color ?? '#6B7280' }}20; color: {{ $service->color ?? '#6B7280' }}">
                                            <i data-lucide="{{ $service->icon }}" class="w-5 h-5"></i>
                                        </span>

                                        <div>
                                            <a href="{{ route('service.sub.index', $service->id) }}">
                                                <p class="font-bold text-sm text-[#010521]">
                                                    {{ $service->title }}
                                                </p>
                                            </a>
                                            <p class="text-[10px] text-gray-400">
                                                {{ $service->slug }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                {{-- Children Count --}}
                                <td class="px-8 py-6">
                                    <a href="{{ route('service.sub.index', $service->id) }}"
                                        class="px-3 py-1 bg-[#4373F6]/5 text-[#4373F6] rounded-full text-[10px] font-black uppercase">
                                        {{ $service->children_count }} Sub Services
                                    </a>
                                </td>

                                {{-- Status --}}
                                <td class="px-8 py-6">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer toggle-status"
                                            data-id="{{ $service->id }}" {{ $service->show_on_home ? 'checked' : '' }}>

                                        <div
                                            class="relative w-11 h-6 bg-gray-200 rounded-full transition peer-focus:ring-2 peer-focus:ring-[#4373F6]
                    after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5
                    after:transition-all peer-checked:bg-[#4373F6] peer-checked:after:translate-x-full">
                                        </div>

                                        <span class="ml-2 text-[10px] font-black uppercase">
                                            {{ $service->show_on_home ? 'On Home' : 'Hidden' }}
                                        </span>
                                    </label>
                                </td>

                                {{-- Actions --}}
                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end gap-2">

                                        <button data-title="Edit Service" data-submit-url="{{ route('service.update', $service->id) }}"
                                            data-method="put"
                                            data-service="{{ $service }}"
                                            class="service-open-form w-10 h-10 rounded-xl bg-gray-50 text-[#010521] hover:bg-[#4373F6] hover:text-white transition flex items-center justify-center">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>

                                        <button data-url="{{ route('service.destroy', $service->id) }}"
                                            class="js-delete w-10 h-10 rounded-xl bg-gray-50 text-red-500 hover:bg-red-500 hover:text-white transition flex items-center justify-center">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>

                                        <span
                                            class="w-5 h-10 rounded-xl bg-gray-200 text-gray-500 hover:bg-gray-800 hover:text-white transition flex items-center justify-center cursor-move drag-handle">
                                            <i data-lucide="grip-vertical" class="w-4 h-4 "></i>
                                        </span>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/js/dashboard/pages/services.js')
    <script>
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        const updateStatus = function() {
            const serviceId = this.dataset.id;
            const status = this.checked ? 1 : 0;

            fetch(`/dashboard/services/toggle/${serviceId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        show_on_home: status
                    })
                })
                .then(res => res.json())
                .then(() => {
                    const label = this.closest('label');
                    const textSpan = label.querySelector('span:last-child');
                    if (textSpan) {
                        textSpan.textContent = status ? 'On Home' : 'Hidden';
                    }
                });
        };

        document.querySelectorAll('.toggle-status').forEach(toggle => {
            const debounced = debounce(updateStatus, 1500);

            toggle.addEventListener('change', function() {
                debounced.call(this);
            });
        });

    </script>
@endpush
