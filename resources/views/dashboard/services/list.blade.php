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

                    <button type="button" id="createServiceBtn"
                        class="px-4 py-2 bg-[#010521] text-white text-[10px] font-black uppercase rounded-xl shadow-lg hover:bg-[#4373F6] transition">
                        + Add Service
                    </button>

                </div> 

            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            {{-- <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Order</th> --}}
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Service</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Sub Services</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Status</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-50 js-sortable" data-order-url="{{ route('service.reorder') }}">
                        @foreach ($services as $service)
                            <tr class="hover:bg-gray-50/50 group js-item" data-id="{{ $service->id }}">

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

                                        <a href="javascript:void(0)" onclick="editService({{ $service }})"
                                            class="w-10 h-10 rounded-xl bg-gray-50 text-[#010521] hover:bg-[#4373F6] hover:text-white transition flex items-center justify-center">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </a>

                                        <button
                                            data-url="{{ route('service.destroy', $service->id) }}"
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



            <div class="p-8 bg-gray-50/30 flex items-center justify-between border-t border-gray-50">
                {{-- <p class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">
                        Viewing {{ $contacts->firstItem() ?? 0 }}-{{ $contacts->lastItem() ?? 0 }} of
                        {{ $contacts->total() }} Leads
                    </p> --}}
                {{-- <div class="flex gap-2">
                        @if ($contacts->onFirstPage())
                            <span
                                class="px-4 py-2 rounded-xl bg-white border border-gray-100 text-[10px] font-black uppercase text-gray-200 cursor-not-allowed">Prev</span>
                        @else
                            <a href="{{ $contacts->previousPageUrl() }}"
                                class="px-4 py-2 rounded-xl bg-white border border-gray-100 text-[10px] font-black uppercase text-gray-400 hover:bg-gray-50">Prev</a>
                        @endif

                        @if ($contacts->hasMorePages())
                            <a href="{{ $contacts->nextPageUrl() }}"
                                class="px-4 py-2 rounded-xl bg-[#010521] text-white text-[10px] font-black uppercase shadow-lg shadow-[#010521]/10 hover:bg-[#4373F6]">Next</a>
                        @else
                            <span
                                class="px-4 py-2 rounded-xl bg-gray-200 text-white text-[10px] font-black uppercase cursor-not-allowed">Next</span>
                        @endif
                    </div> --}}
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showError(field, message) {
            const el = document.getElementById(`error-${field}`);
            if (!el) return;

            el.innerText = message;
            el.classList.remove('hidden');
        }

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
        // const el = document.getElementById('sortable-services');

        // new Sortable(el, {
        //     animation: 150,
        //     handle: '.drag-handle',

        //     scroll: true,
        //     scrollSensitivity: 90,
        //     scrollSpeed: 10,
        //     bubbleScroll: true,

        //     onEnd: function() {

        //         let order = [];

        //         document.querySelectorAll('#sortable-services tr').forEach((row, index) => {
        //             let id = row.querySelector('.toggle-status')?.dataset.id;

        //             if (id) {
        //                 order.push({
        //                     id: id,
        //                     home_order: index + 1
        //                 });
        //             }
        //         });


        //         sendOrderUpdate(order);
        //     }
        // });

        // const sendOrderUpdate = debounce((order) => {

        //     fetch('/dashboard/services/reorder', {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
        //                     .getAttribute('content')
        //             },
        //             body: JSON.stringify({
        //                 order
        //             })
        //         })
        //         .then(res => res.json())
        //         .then(() => {
        //             console.log('Order updated');
        //         })
        //         .catch(err => console.error(err));

        // }, 2000);


        document.getElementById('createServiceBtn').addEventListener('click', createService);

        function editService(service) {

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

                        const res = await fetch(`/dashboard/services/${service.id}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify(payload)
                        });

                        const data = await res.json();

                        if (!res.ok) {

                            if (data.errors) {
                                Object.keys(data.errors).forEach(key => {
                                    const el = document.getElementById(`error-${key}`);
                                    if (el) {
                                        el.innerText = data.errors[key][0];
                                        el.classList.remove('hidden');
                                    }
                                });
                            }

                            return false;
                        }

                        return data;

                    } catch (err) {
                        Swal.showValidationMessage('Server error');
                        return false;
                    }
                }

            }).then(result => {

                if (!result.isConfirmed) return;

                showToast({
                    title: 'Service Updated',
                    text: 'Service updated successfully.',
                    type: 'success'
                });
                setTimeout(() => {
                    location.reload();
                }, 3000);

            });
        }

        function createService() {

            Swal.fire({
                    title: 'Create Service',
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

                            const res = await fetch('/dashboard/services', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify(payload)
                            });

                            const data = await res.json();

                            if (!res.ok) {

                                if (data.errors) {

                                    Object.keys(data.errors).forEach(key => {
                                        const el = document.getElementById(`error-${key}`);

                                        if (el) {
                                            el.innerText = data.errors[key][0];
                                            el.classList.remove('hidden');
                                        }
                                    });
                                }
                                return false;
                            }

                            return data;

                        } catch (err) {
                            showToast({
                                title: data.message || 'Failed to create service',
                                type: 'error',
                                text: 'Please try again later.'
                            });
                        }
                    }
                })
                .then(result => {

                    if (!result || !result.isConfirmed) return;
                    showToast({
                        title: 'Service Created',
                        text: 'The new service has been created successfully.',
                        type: 'success'
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 2500);

                });
        }


        function serviceForm(data = {}) {

            return `
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 text-left text-base">

                <!-- Title -->
                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase">Service Title *</label>
                    <input id="title" value="${data.title ?? ''}" type="text"
                        placeholder="Enter service title (e.g. Web Development)"
                        class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                    <p class="text-xs text-red-500 mt-1 hidden" id="error-title"></p>
                </div>

                <!-- Slug -->
                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase">Slug *</label>
                    <input id="slug" value="${data.slug ?? ''}" type="text"
                        placeholder="Auto-generated slug (e.g. web-development)"
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
                            slugInput.value = data.slug + "-services";
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


        // function deleteService(id) {

        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "This service will be permanently deleted!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes, delete it',
        //         cancelButtonText: 'Cancel',
        //         confirmButtonColor: '#EF4444',
        //         cancelButtonColor: '#6B7280',
        //         customClass: {
        //             popup: 'rounded-2xl p-6'
        //         }
        //     }).then(async (result) => {

        //         if (!result.isConfirmed) return;

        //         try {

        //             const res = await fetch(`/dashboard/services/${id}`, {
        //                 method: 'DELETE',
        //                 headers: {
        //                     'Accept': 'application/json',
        //                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
        //                         .getAttribute('content')
        //                 }
        //             });

        //             const data = await res.json();

        //             if (!res.ok) {
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Error!',
        //                     text: data.message || 'Something went wrong'
        //                 });
        //                 return;
        //             }

        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Deleted!',
        //                 text: 'Service has been deleted.',
        //                 timer: 1200,
        //                 showConfirmButton: false
        //             }).then(() => {
        //                 location.reload();
        //             });

        //         } catch (err) {
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Server Error',
        //                 text: 'Please try again later.'
        //             });
        //         }
        //     });
        // }
    </script>
@endpush
