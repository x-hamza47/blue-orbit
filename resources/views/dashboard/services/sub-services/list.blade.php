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
                        +{{ $service->children_count }}
                    </span>
                </div>

                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">
                    Total Sub Services
                </p>

                <h3 class="text-2xl font-black text-[#010521]">
                    {{ $service->children->count() }}
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
                    {{ $service->active_children_count }}
                </h3>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-gray-50 flex flex-wrap items-center justify-between gap-4">

                {{-- Left --}}
                <div class="flex items-center gap-4">

                    <div class="flex items-center gap-3">

                        <span class="w-10 h-10 rounded-xl flex items-center justify-center"
                            style="background-color: {{ $service->color ?? '#6B7280' }}20;
               color: {{ $service->color ?? '#6B7280' }}">

                            <i data-lucide="{{ $service->icon ?? 'layers' }}" class="w-5 h-5"></i>
                        </span>

                        <div>
                            <h4 class="text-lg font-black text-[#010521] leading-tight">
                                {{ $service->title }}
                            </h4>

                            <p class="text-[10px] text-gray-400 uppercase tracking-widest">
                                Sub Services
                            </p>
                        </div>


                    </div>

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

                    <button type="button" id="createSubServiceBtn"
                        class="px-4 py-2 bg-[#010521] text-white text-[10px] font-black uppercase rounded-xl shadow-lg hover:bg-[#4373F6] transition">
                        + Add Sub Service
                    </button>

                    <a href="{{ route('service.index') }}"
                        class="px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-xl text-[10px] font-black uppercase flex items-center gap-2 transition">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Back
                    </a>

                </div>

            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            {{-- <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Order</th> --}}
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Service</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Sections</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Status</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-50" id="sortable-sub-services">
                        @forelse ($subServices as $child)
                            <tr class="hover:bg-gray-50/50 transition-colors group" data-id="{{ $child->id }}">

                                {{-- Order --}}
                                {{-- <td class="px-8 py-6">
                                    <p class="font-bold text-sm text-[#010521]">
                                        #{{ $service->home_order ?? '-' }}
                                    </p>
                                    <p class="text-[10px] text-gray-400 uppercase">
                                        Position
                                    </p>
                                </td> --}}

                                {{-- Service Info --}}
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">

                                        <span class="w-10 h-10 rounded-xl flex items-center justify-center"
                                            style="background-color: {{ $child->color ?? '#6B7280' }}20; color: {{ $child->color ?? '#6B7280' }}">
                                            <i data-lucide="{{ $child->icon ?? 'help-circle' }}" class="w-5 h-5"></i>
                                        </span>

                                        <div>
                                            <p class="font-bold text-sm text-[#010521]">
                                                {{ $child->title }}
                                            </p>
                                            <p class="text-[10px] text-gray-400">
                                                {{ $child->slug }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                {{-- Children Count --}}
                                <td class="px-8 py-6">
                                    <span
                                        class="px-3 py-1 bg-[#4373F6]/5 text-[#4373F6] rounded-full text-[10px] font-black uppercase">
                                        {{ $child->sections_count ?? 0 }} Sections
                                    </span>
                                </td>

                                {{-- Status --}}
                                <td class="px-8 py-6">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer toggle-status"
                                            data-id="{{ $child->id }}" {{ $child->show_on_home ? 'checked' : '' }}>

                                        <div
                                            class="relative w-11 h-6 bg-gray-200 rounded-full transition peer-focus:ring-2 peer-focus:ring-[#4373F6]
                    after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5
                    after:transition-all peer-checked:bg-[#4373F6] peer-checked:after:translate-x-full">
                                        </div>

                                        <span class="ml-2 text-[10px] font-black uppercase">
                                            {{ $child->show_on_home ? 'On Home' : 'Hidden' }}
                                        </span>
                                    </label>
                                </td>

                                {{-- Actions --}}
                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end gap-2">

                                        <a href="javascript:void(0)" onclick="editSubService({{ $child }})"
                                            class="w-10 h-10 rounded-xl bg-gray-50 text-[#010521] hover:bg-[#4373F6] hover:text-white transition flex items-center justify-center">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </a>

                                        <button onclick="deleteService({{ $child->id }})"
                                            class="w-10 h-10 rounded-xl bg-gray-50 text-red-500 hover:bg-red-500 hover:text-white transition flex items-center justify-center">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                        <a href="{{ route('service.sections.index', $child->id) }}"
                                            class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition flex items-center justify-center"
                                            title="Manage Sections">
                                            <i data-lucide="layout" class="w-4 h-4"></i>
                                        </a>

                                        <span
                                            class="w-5 h-10 rounded-xl bg-gray-200 text-gray-500 hover:bg-gray-800 hover:text-white transition flex items-center justify-center cursor-move drag-handle">
                                            <i data-lucide="grip-vertical" class="w-4 h-4 "></i>
                                        </span>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-gray-400">
                                    <div class="flex flex-col items-center gap-2">
                                        <i data-lucide="inbox" class="w-6 h-6"></i>
                                        <p>No sub services found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>



        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('createSubServiceBtn').addEventListener('click', createSubService);

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


        // Initialize SortableJS
        const el = document.getElementById('sortable-sub-services');

        new Sortable(el, {
            animation: 150,
            handle: '.drag-handle',

            scroll: true,
            scrollSensitivity: 90,
            scrollSpeed: 10,
            bubbleScroll: true,

            onEnd: function() {

                let order = [];

                document.querySelectorAll('#sortable-sub-services tr').forEach((row, index) => {
                    let id = row.dataset.id;

                    if (id) {
                        order.push({
                            id: id,
                            order: index + 1
                        });
                    }
                });

                sendOrderUpdate(order);
            }
        });

        const sendOrderUpdate = debounce((order) => {

            axios.post('{{ route('service.sub.reorder', $service->id) }}', {
                    order: order
                })
                .then((res) => {

                    if (res.data.status) {
                        showToast({
                            title: 'Success',
                            text: res.data.message,
                            type: 'success'
                        });
                    } else {
                        showToast({
                            title: 'Error',
                            text: res.data.message,
                            type: 'error'
                        });
                    }

                })
                .catch((err) => {

                    showToast({
                        title: 'Error',
                        text: err.response?.data?.message || 'Something went wrong',
                        type: 'error'
                    });

                });

        }, 2000);

        function editSubService(service) {

            Swal.fire({
                    title: 'Update Service',
                    width: '700px',
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    confirmButtonColor: '#4373F6',
                    customClass: {
                        popup: 'rounded-2xl p-6'
                    },

                    html: serviceForm(service),
                    didOpen: () => {
                        initServiceUI(true);
                    },

                    preConfirm: async () => {

                        document.querySelectorAll('[id^="error-"]').forEach(el => {
                            el.innerText = '';
                            el.classList.add('hidden'); 
                        });

                        const payload = {
                            title: document.getElementById('title').value,
                            slug: document.getElementById('slug').value,
                            icon: document.getElementById('icon').value,
                            color: document.getElementById('color').value,
                            desc: document.getElementById('desc').value,
                        };

                        try {

                            const res = await axios.put(
                                '{{ route('service.sub.update', [$service->id, ':childId']) }}'
                                .replace(':childId', service.id),
                                payload
                            );

                            return res.data;

                        } catch (err) {
                            if (err.response?.status === 422) {

                                const errors = err.response.data.errors;

                                Object.keys(errors).forEach(key => {
                                    const el = document.getElementById(`error-${key}`);
                                    if (el) {
                                        el.innerText = errors[key][0];
                                        el.classList.remove('hidden');
                                    }
                                });

                            } else {
                                showToast({
                                    title: err.response?.data?.message || 'Server Error',
                                    type: 'error',
                                    text: 'Please try again later.'
                                });
                            }

                            return false;
                        }
                    }
                })
                .then(result => {

                    if (!result || !result.isConfirmed) return;

                    showToast({
                        title: 'Service Updated',
                        text: 'Service updated successfully.',
                        type: 'success'
                    });

                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                });
        }

        function createSubService() {

            Swal.fire({
                    title: 'Create Sub Service',
                    width: '700px',
                    showCancelButton: true,
                    confirmButtonText: 'Create',
                    confirmButtonColor: '#4373F6',
                    customClass: {
                        popup: 'rounded-2xl md:p-6 p-4'
                    },
                    html: serviceForm(),
                    didOpen: () => {
                        initServiceUI(false);
                    },

                    preConfirm: async () => {

                        document.querySelectorAll('[id^="error-"]').forEach(el => {
                            el.innerText = '';
                            el.classList.add('hidden');
                        });

                        const payload = {
                            title: document.getElementById('title').value,
                            slug: document.getElementById('slug').value,
                            desc: document.getElementById('desc').value,
                            icon: document.getElementById('icon').value,
                            color: document.getElementById('color').value,
                        };

                        try {

                            const res = await axios.post('{{ route('service.sub.store', $service->id) }}',
                                payload);

                            return res.data;

                        } catch (err) {

                            if (err.response?.status === 422) {

                                const errors = err.response.data.errors;

                                Object.keys(errors).forEach(key => {
                                    const el = document.getElementById(`error-${key}`);
                                    if (el) {
                                        el.innerText = errors[key][0];
                                        el.classList.remove('hidden');
                                    }
                                });
                            } else {

                                showToast({
                                    title: err.response?.data?.message || 'Failed to create service',
                                    type: 'error',
                                    text: 'Please try again later.'
                                });
                            }


                            return false;
                        }
                    }
                })
                .then(result => {

                    if (!result || !result.isConfirmed) return;

                    showToast({
                        title: 'Sub Service Created',
                        text: 'The new service has been created successfully.',
                        type: 'success'
                    });

                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                });
        }

        function deleteService(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "This service will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#6B7280',
                customClass: {
                    popup: 'rounded-2xl p-6'
                }
            }).then(async (result) => {

                if (!result.isConfirmed) return;

                try {

                    const res = await axios.delete(
                        '{{ route('service.sub.destroy', ':id') }}'.replace(':id', id)
                    );

                    showToast({
                        type: 'success',
                        title: 'Deleted',
                        text: res.data.message || 'Service deleted successfully'
                    });

                    setTimeout(() => {
                        location.reload();
                    }, 2500);

                } catch (err) {

                    showToast({
                        type: 'error',
                        title: 'Error',
                        text: err.response?.data?.message || 'Something went wrong'
                    });
                }
            });
        }


        function initServiceUI(isEdit = false) {

            lucide.createIcons();

            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            let lastValue = '';

            // ---------- SLUG ----------
            const generateSlug = debounce(function() {

                const name = titleInput.value.trim();

                if (!name || name === lastValue) return;

                lastValue = name;

                fetch(`{{ route('getSlug') }}?name=${encodeURIComponent(name)}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.status) {
                            slugInput.value = data.slug;
                        }
                    });

            }, 600);

            titleInput.addEventListener('input', generateSlug);
            titleInput.addEventListener('blur', generateSlug);

            // ---------- ICON + COLOR ----------
            const iconInput = document.getElementById('icon');
            const iconWrapper = document.getElementById('icon-wrapper');
            const colorInput = document.getElementById('color');

            let currentColor = colorInput.value || '#4373F6';

            function renderIcon(name) {

                iconWrapper.innerHTML = '';

                const icon = document.createElement('i');
                icon.setAttribute('data-lucide', name);
                icon.className = 'w-5 h-5';

                iconWrapper.appendChild(icon);

                lucide.createIcons();

                const svg = iconWrapper.querySelector('svg');
                if (svg) svg.style.stroke = currentColor;
            }

            iconInput.addEventListener('input', function() {
                const value = this.value.trim();
                if (!value) return;
                renderIcon(value);
            });

            colorInput.addEventListener('input', function() {

                currentColor = this.value;

                iconWrapper.style.backgroundColor = currentColor + '20';

                const svg = iconWrapper.querySelector('svg');
                if (svg) svg.style.stroke = currentColor;
            });

        }

        function serviceForm(data = {}) {

            return `
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 text-left text-base">

                <!-- Title -->
                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase">Service Title *</label>
                    <input id="title" value="${data.title ?? ''}" type="text"
                        placeholder="Enter service title (e.g. Laravel Development)"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                    <p class="text-xs text-red-500 mt-1 hidden" id="error-title"></p>
                </div>

                <!-- Slug -->
                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase">Slug *</label>
                    <input id="slug" value="${data.slug ?? ''}" type="text"
                        placeholder="Auto-generated slug (e.g. laravel-development)"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                    <p class="text-xs text-red-500 mt-1 hidden" id="error-slug"></p>
                </div>

                <!-- Icon + Color -->
                <div class="lg:col-span-2">
                    <label class="text-xs font-bold text-gray-500 uppercase">Icon & Color</label>

                    <div class="flex items-center gap-3 mt-2">

                        <!-- Icon Preview -->
                        <div id="icon-wrapper"
                            class="w-12 h-12 rounded-xl flex items-center justify-center border border-gray-200"
                            style="background:${data.color ?? '#4373F6'}20; color:${data.color ?? '#4373F6'}">

                            <i id="icon-preview" class="w-5 h-5" data-lucide="${data.icon ?? 'star'}"></i>
                        </div>

                        <!-- Color Picker -->
                        <input id="color" type="color"
                            value="${data.color ?? '#4373F6'}"
                            class="w-12 h-12 p-1 rounded-xl border border-gray-200 cursor-pointer">

                        <!-- Icon Input -->
                        <input id="icon" value="${data.icon ?? ''}" type="text"
                            placeholder="Enter icon name (users, star, zap...)"
                            class="flex-1 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

                    </div>

                    <p class="text-xs text-gray-400 mt-1">
                        Browse icons: <a href="https://lucide.dev/icons" target="_blank" class="hover:underline">
                            lucide.dev/icons
                        </a>
                    </p>

                    <p class="text-xs text-red-500 mt-1 hidden" id="error-icon"></p>
                    <p class="text-xs text-red-500 mt-1 hidden" id="error-color"></p>
                </div>

                <!-- Description -->
                <div class="lg:col-span-2">
                    <label class="text-xs font-bold text-gray-500 uppercase">Description</label>

                    <textarea id="desc" maxlength="120" rows="3"
                        placeholder="Write a short service description (max 90 characters)..."
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">${data.desc ?? ''}</textarea>

                    <p class="text-xs text-gray-400 mt-1">
                        Maximum 120 characters recommended
                    </p>

                    <p class="text-xs text-red-500 mt-1 hidden" id="error-desc"></p>
                </div>

            </div>
                `;
        }
    </script>
@endpush
