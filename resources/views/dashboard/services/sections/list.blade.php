@extends('dashboard.layout.main')

@section('content')
    <div class="flex-1 overflow-y-auto p-8 custom-scrollbar bg-[#F8FAFF]">

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
                                Service
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

                    <button type="button" onclick="openModal()"
                        class="px-4 py-2 bg-[#010521] text-white text-[10px] font-black uppercase rounded-xl shadow-lg hover:bg-[#4373F6] transition">
                        + Add Section
                    </button>
                    <a href="{{ url()->previous() }}"
                        class="px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-xl text-[10px] font-black uppercase flex items-center gap-2 transition">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Back
                    </a>
                </div>

            </div>


        </div>
        {{-- ! Sections List --}}
        <div class="mt-8 space-y-4" id="sectionsList">

            @forelse($sections as $section)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center justify-between drag-item"
                    data-id="{{ $section->id }}">

                    {{-- Left --}}
                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10 rounded-xl flex items-center justify-center bg-gray-100 text-gray-600">
                            <i data-lucide="layout" class="w-5 h-5"></i>
                        </div>

                        <div>
                            <p class="font-black text-[#010521] capitalize">
                                {{ $section->type }}
                            </p>

                            <p class="text-[10px] text-gray-400 uppercase tracking-widest">
                                Section Type
                            </p>
                        </div>

                    </div>

                    {{-- Right --}}
                    <div class="flex items-center gap-2">

                        {{-- Edit --}}
                        <button onclick="editSection({{ $section->id }})"
                            class="w-10 h-10 rounded-xl bg-gray-50 hover:bg-[#4373F6] hover:text-white transition flex items-center justify-center">
                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                        </button>

                        {{-- Delete --}}
                        <button onclick="deleteSection({{ $section->id }})"
                            class="w-10 h-10 rounded-xl bg-gray-50 hover:bg-red-500 hover:text-white transition flex items-center justify-center">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>

                        {{-- Drag --}}
                        <span
                            class="w-10 h-10 rounded-xl bg-gray-100 text-gray-500 hover:bg-gray-800 hover:text-white transition flex items-center justify-center cursor-move drag-handle">
                            <i data-lucide="grip-vertical" class="w-4 h-4"></i>
                        </span>

                    </div>

                </div>

            @empty

                <div class="bg-white p-10 rounded-2xl border text-center text-gray-400">
                    <i data-lucide="inbox" class="w-6 h-6 mx-auto mb-2"></i>
                    No sections found
                </div>
            @endforelse

        </div>
        {{-- Info: Section Modal --}}
        <div id="sectionModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center p-4 z-50">

            <div class="bg-white w-[600px] max-h-[90vh]  rounded-2xl flex flex-col">

                <!-- Header -->
                <div class="flex justify-between items-center p-6 border-b">
                    <h2 class="font-bold text-lg">Add Section</h2>
                    <button onclick="closeModal()">✕</button>
                </div>

                <!-- Body (SCROLL AREA) -->
                <div class="p-6 overflow-y-auto flex-1  ">

                    <select id="sectionType" class="w-full border p-2 rounded" onchange="loadForm()">
                        <option disabled selected value="">
                            -- Select Section Type --
                        </option>

                        @foreach ($availableSections as $key => $section)
                            <option value="{{ $key }}">
                                {{ $section['label'] }}
                            </option>
                        @endforeach
                    </select>

                    <form id="sectionForm" class="mt-4">
                        <input type="hidden" name="type" id="typeInput">

                        <div id="formContainer"></div>

                        <button type="submit" class="mt-4 bg-[#4373F6] text-white px-4 py-2 rounded w-full">
                            Save Section
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        // Initialize SortableJS
        const el = document.getElementById('sectionsList');

        new Sortable(el, {
            animation: 150,
            handle: '.drag-handle',
            scroll: true,
            scrollSensitivity: 90,
            scrollSpeed: 10,

            onEnd: function() {

                let order = [];

                document.querySelectorAll('#sectionsList .drag-item').forEach((row, index) => {
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

            axios.post('{{ route('service.sections.reorder', $service->id) }}', {
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


        function openModal() {
            document.getElementById('sectionModal').classList.remove('hidden');
            loadForm();
        }

        function closeModal() {
            document.getElementById('sectionModal').classList.add('hidden');
        }

        function loadForm() {
            let type = document.getElementById('sectionType').value;
            document.getElementById('typeInput').value = type;

            axios.get('{{ route('service.sections.form', ['type' => ':type']) }}'.replace(':type', type))
                .then(res => {
                    document.getElementById('formContainer').innerHTML = res.data;
                });
        }


        function deleteSection(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "This section will be permanently deleted!",
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
                        `{{ route('service.sections.destroy', [$service->id, ':id']) }}`
                        .replace(':id', id)
                    );

                    showToast({
                        type: 'success',
                        title: 'Deleted',
                        text: res.data.message || 'Section deleted successfully'
                    });

                    setTimeout(() => {
                        location.reload();
                    }, 1500);

                } catch (err) {

                    showToast({
                        type: 'error',
                        title: 'Error',
                        text: err.response?.data?.message || 'Something went wrong'
                    });
                }
            });
        }

        document.getElementById('sectionForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            try {

                const res = await axios.post(
                    `{{ route('service.sections.store', $service->id) }}`,
                    Object.fromEntries(formData)
                );

                showToast({
                    type: 'success',
                    title: 'Success',
                    text: res.data.message
                });

                closeModal();
                location.reload();

            } catch (err) {

                showToast({
                    type: 'error',
                    title: 'Error',
                    text: err.response?.data?.message || 'Something went wrong'
                });

            }
        });

        function addFAQ(question = '', answer = '') {

            const container = document.getElementById('faqContainer');
            const index = container.children.length;

            const html = `
                <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 relative">

                    <!-- Delete -->
                    <button type="button"
                        onclick="this.parentElement.remove()"
                        class="absolute top-3 right-3 text-gray-400 hover:text-red-500 transition">
                        ✕
                    </button>

                    <div class="space-y-3">

                        <!-- Question -->
                        <div>
                            <label class="text-xs font-semibold text-gray-500">Question *</label>
                            <input type="text"
                                name="faqs[${index}][question]"
                                value="${question}"
                                placeholder="Enter question..."
                                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
                        </div>

                        <!-- Answer -->
                        <div>
                            <label class="text-xs font-semibold text-gray-500">Answer *</label>
                            <textarea
                                name="faqs[${index}][answer]"
                                rows="3"
                                placeholder="Write answer..."
                                class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">${answer}</textarea>
                        </div>

                    </div>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
        }
    </script>
@endpush
