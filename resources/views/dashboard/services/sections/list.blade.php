@extends('dashboard.layout.main')

@section('content')
    <div class="flex-1 overflow-y-auto p-8 custom-scrollbar bg-[#F8FAFF]">

        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden">

            <div class="p-6 md:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                {{-- LEFT --}}
                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center"
                        style="background-color: {{ $service->color ?? '#6B7280' }}15;
                       color: {{ $service->color ?? '#6B7280' }}">
                        <i data-lucide="{{ $service->icon ?? 'layers' }}" class="w-6 h-6"></i>
                    </div>

                    <div>
                        <h2 class="text-xl font-black text-[#010521]">
                            {{ $service->title }}
                        </h2>

                        <p class="text-xs text-gray-400 uppercase tracking-widest">
                            Service Builder
                        </p>
                    </div>

                </div>

                {{-- FILTERS --}}
                <div class="flex items-center gap-2 bg-gray-50 p-1 rounded-xl w-fit">

                    <a href="?filter=all"
                        class="px-4 py-1.5 text-[11px] font-bold uppercase rounded-lg transition
                {{ request('filter') != 'home' ? 'bg-white text-[#4373F6] shadow-sm' : 'text-gray-400' }}">
                        All
                    </a>

                    <a href="?filter=home"
                        class="px-4 py-1.5 text-[11px] font-bold uppercase rounded-lg transition
                {{ request('filter') == 'home' ? 'bg-white text-[#4373F6] shadow-sm' : 'text-gray-400' }}">
                        On Home
                    </a>

                </div>

                {{-- ACTIONS --}}
                <div class="flex items-center gap-3">

                    <button onclick="openModal()"
                        class="px-5 py-2.5 bg-[#010521] text-white text-[11px] font-black uppercase rounded-xl shadow hover:bg-[#4373F6] transition">
                        + Add Section
                    </button>

                    <a href="{{ url()->previous() }}"
                        class="px-4 py-2.5 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-xl text-[11px] font-black uppercase flex items-center gap-2 transition">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Back
                    </a>

                </div>

            </div>
        </div>
        {{-- ! Sections List --}}
        <div class="mt-8 space-y-4 js-sortable" data-order-url="{{ route('service.sections.reorder', $service->id) }}">
            @forelse($sections as $section)
                <div class="js-item group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md p-6 flex items-center justify-between drag-item"
                    data-id="{{ $section->id }}">

                    <div class="flex items-start gap-4">

                        <div
                            class="w-12 h-12 rounded-xl flex items-center justify-center bg-gray-100 text-gray-600 group-hover:bg-[#4373F6]/10 group-hover:text-[#4373F6] transition">
                            <i data-lucide="layout" class="w-5 h-5"></i>
                        </div>
                        <div>

                            <h3 class="text-lg font-bold text-[#010521] capitalize leading-tight">
                                {{ $section->type }}
                            </h3>

                            <div class="flex items-center gap-2 mt-1">

                                <span
                                    class="text-[10px] font-bold px-2 py-0.5 rounded-lg bg-gray-100 text-gray-600 uppercase">
                                    Section
                                </span>

                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-lg bg-gray-50 text-gray-400">
                                    #{{ $section->order }}
                                </span>

                            </div>

                        </div>

                    </div>


                    <div class="flex items-center gap-2">


                        <label class="relative inline-flex items-center cursor-pointer">

                            <input type="checkbox" class="sr-only peer" onchange="toggleSection({{ $section->id }})"
                                {{ $section->is_active ? 'checked' : '' }}>

                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer
                peer-checked:bg-blue-500 transition">
                            </div>

                            <div
                                class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow
                transition peer-checked:translate-x-5">
                            </div>

                        </label>

                        <button onclick="editSection({{ $section->id }})"
                            class="w-10 h-10 rounded-xl bg-gray-50 hover:bg-[#4373F6] hover:text-white transition flex items-center justify-center">
                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                        </button>

                        <button data-url="{{ route('service.sections.destroy', [$service->id, $section->id]) }}"
                            class="js-delete w-10 h-10 rounded-xl bg-gray-50 hover:bg-red-500 hover:text-white transition flex items-center justify-center">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>

                        <span
                            class="w-10 h-10 rounded-xl bg-gray-100 text-gray-500 hover:bg-gray-900 hover:text-white transition flex items-center justify-center cursor-move drag-handle">
                            <i data-lucide="grip-vertical" class="w-4 h-4"></i>
                        </span>

                    </div>

                </div>

            @empty

                <div class="bg-white p-12 rounded-2xl border text-center text-gray-400">
                    <i data-lucide="inbox" class="w-8 h-8 mx-auto mb-3"></i>
                    <p class="font-semibold">No sections found</p>
                    <p class="text-xs mt-1">Start by adding your first section</p>
                </div>
            @endforelse

        </div>
        {{-- Info: Section Modal --}}
        <div id="sectionModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center p-4 z-50">

            <div class="bg-white w-3/5 min-w-[460px] max-h-[90vh]  rounded-2xl flex flex-col">

                <!-- Header -->
                <div class="flex justify-between items-center p-6 border-b">
                    <h2 class="font-bold text-lg" id="modalTitle">Add Section</h2>
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

                    <form id="sectionForm" data-store="{{ route('service.sections.store', $service->id) }}"
                        data-update="{{ route('service.sections.update', [$service->id, ':id']) }}"
                        data-show="{{ route('service.sections.show', [$service->id, ':id']) }}"
                        data-form="{{ route('service.sections.form', ['type' => ':type']) }}" data-success="reload"
                        class="mt-4 js-form">
                        <input type="hidden" name="type" id="typeInput">

                        <div id="formContainer"></div>

                        <button type="submit" class="mt-4 bg-[#4373F6] text-white px-4 py-2 rounded-md w-full">
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
    @vite('resources/js/dashboard/pages/sections.js')

    <script>
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        // function openModal() {
        //     document.getElementById('sectionModal').classList.remove('hidden');
        //     loadForm();
        // }

        // function closeModal() {
        //     document.getElementById('sectionModal').classList.add('hidden');
        // }

        // function loadForm() {
        //     let type = document.getElementById('sectionType').value;
        //     document.getElementById('typeInput').value = type;

        //     axios.get('{{ route('service.sections.form', ['type' => ':type']) }}'.replace(':type', type))
        //         .then(res => {
        //             document.getElementById('formContainer').innerHTML = res.data;
        //             initGlobalForms();
        //             initDynamicItems();
        //         });
        // }

        function toggleSection(id) {
            sendToggleRequest(id);
        }

        const sendToggleRequest = debounce(function(id) {

            axios.post("{{ route('service.sections.toggle', [$service->id, ':id']) }}".replace(':id', id))
                .then(res => {

                    showToast({
                        title: 'Updated',
                        text: res.data.message,
                        type: 'success'
                    });

                })
                .catch(err => {

                    showToast({
                        title: 'Error',
                        text: err.response?.data?.message || 'Something went wrong',
                        type: 'error'
                    });

                });

        }, 1000);
        // document.getElementById('sectionForm').addEventListener('submit', async function(e) {
        //     e.preventDefault();

        //     let formData = new FormData(this);

        //     document.querySelectorAll('[id^="error-"]').forEach(el => {
        //         el.innerText = '';
        //         el.classList.add('hidden');
        //     });


        //     try {

        //         const res = await axios.post(
        //             `{{ route('service.sections.store', $service->id) }}`,
        //             formData
        //         );

        //         showToast({
        //             type: 'success',
        //             title: 'Success',
        //             text: res.data.message
        //         });

        //         closeModal();
        //         location.reload();

        //     } catch (err) {

        //         const status = err.response?.status;

        //         if (status === 422 && err.response.data.errors) {

        //             const errors = err.response.data.errors;

        //             Object.keys(errors).forEach(key => {
        //                 const el = document.getElementById(`error-${key}`);
        //                 if (el) {
        //                     el.innerText = errors[key][0];
        //                     el.classList.remove('hidden');
        //                 }
        //             });

        //             showToast({
        //                 type: 'error',
        //                 title: 'Validation Error',
        //                 text: 'Please fix the highlighted fields'
        //             });

        //             return;
        //         }

        //         if (err.response?.data?.message) {
        //             showToast({
        //                 type: 'error',
        //                 title: 'Error',
        //                 text: err.response.data.message
        //             });

        //             return;
        //         }

        //         showToast({
        //             type: 'error',
        //             title: 'Error',
        //             text: 'Something went wrong'
        //         });

        //     }
        // });

        //     function removeFAQ(btn) {

        //         const item = btn.closest('.faq-item');
        //         item.remove();

        //         updateFAQButtonState();
        //     }

        //     function updateFAQButtonState() {

        //         const btn = document.getElementById('addQuestionBtn');
        //         const currentCount = document.querySelectorAll('.faq-item').length;

        //         if (currentCount >= 4) {

        //             btn.disabled = true;
        //             btn.classList.add('opacity-50', 'cursor-not-allowed');

        //         } else {

        //             btn.disabled = false;
        //             btn.classList.remove('opacity-50', 'cursor-not-allowed');
        //         }
        //     }

        //     function addFAQ(question = '', answer = '') {

        //         const container = document.getElementById('faqContainer');
        //         const btn = document.getElementById('addQuestionBtn');

        //         const currentCount = container.querySelectorAll('.faq-item').length;

        //         if (currentCount >= 4) {

        //             showToast({
        //                 type: 'error',
        //                 title: 'Limit reached',
        //                 text: 'You can only add up to 4 FAQs'
        //             });

        //             updateFAQButtonState();

        //             return;
        //         }

        //         const index = currentCount;

        //         const html = `
    //     <div class="faq-item bg-gray-50 border border-gray-100 rounded-xl p-4 relative">

    //         <button type="button"
    //             onclick="removeFAQ(this)"
    //             class="absolute top-3 right-3 text-gray-400 hover:text-red-500 transition">
    //             ✕
    //         </button>

    //         <div class="space-y-3">

    //             <div>
    //                 <label class="text-xs font-semibold text-gray-500">Question *</label>
    //                 <input type="text"
    //                     name="faqs[${index}][question]"
    //                     value="${question}"
    //                     class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

    //                 <small id="error-faqs.${index}.question" class="text-red-500 text-xs hidden"></small>
    //             </div>

    //             <div>
    //                 <label class="text-xs font-semibold text-gray-500">Answer *</label>
    //                 <textarea
    //                     name="faqs[${index}][answer]"
    //                     rows="3"
    //                     class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">${answer}</textarea>

    //                 <small id="error-faqs.${index}.answer" class="text-red-500 text-xs hidden"></small>
    //             </div>

    //         </div>
    //     </div>
    // `;

        //         container.insertAdjacentHTML('beforeend', html);
        //     }



        // function addItem(icon = '', title = '') {

        //     const container = document.getElementById('itemsContainer');
        //     const index = container.children.length;

        //     const html = `
    //             <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 relative">

    //                 <button type="button"
    //                     onclick="this.parentElement.remove()"
    //                     class="absolute top-3 right-3 text-gray-400 hover:text-red-500 transition">
    //                     ✕
    //                 </button>

    //                 <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    //                     <!-- Icon -->
    //                     <div>
    //                         <label class="text-xs font-semibold text-gray-500">Devicon Class</label>

    //                         <div class="flex items-center gap-3 mt-2">

    //                             <!-- Input -->
    //                             <input type="text"
    //                                 name="items[${index}][icon]"
    //                                 value="${icon}"
    //                                 oninput="updateIconPreview(this, ${index})"
    //                                 placeholder="e.g. devicon-laravel-plain"
    //                                 class="w-full p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

    //                             <!-- Preview -->
    //                             <div id="icon-preview-${index}"
    //                                 class="w-12 h-12 flex items-center justify-center bg-white border rounded-lg text-xl shrink-0">
    //                                 <i class="${icon || 'devicon-devicon-plain'}"></i>
    //                             </div>

    //                         </div>

    //                         <small id="error-items.${index}.icon" class="text-red-500 text-xs hidden"></small>

    //                         <!-- helper links -->
    //                         <div class="mt-2 flex items-center justify-between">
    //                             <a href="https://devicon.dev/" target="_blank"
    //                             class="text-xs text-[#4373F6] font-semibold hover:underline">
    //                                 Browse icons →
    //                             </a>

    //                             <span class="text-[10px] text-gray-400">
    //                                 Copy class name from site
    //                             </span>
    //                         </div>
    //                     </div>

    //                     <!-- Title -->
    //                     <div>
    //                         <label class="text-xs font-semibold text-gray-500">Title</label>

    //                         <input type="text"
    //                             name="items[${index}][title]"
    //                             value="${title}"
    //                             placeholder="e.g. Laravel Development"
    //                             class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

    //                         <small id="error-items.${index}.title" class="text-red-500 text-xs hidden"></small>
    //                     </div>

    //                 </div>



    //             </div>
    //         `;

        //     container.insertAdjacentHTML('beforeend', html);
        // }

        // function updateIconPreview(input, index) {

        //     const preview = document.getElementById(`icon-preview-${index}`);

        //     if (!preview) return;

        //     const iconClass = input.value.trim();

        //     preview.innerHTML = `
    //         <i class="${iconClass || 'devicon-devicon-plain'}"></i>
    //     `;
        // }

        // function addBenefitItem(icon = '', title = '', desc = '') {

        //     const container = document.getElementById('benefitsContainer');
        //     const index = container.children.length;

        //     const html = `
    //         <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 relative">

    //             <button type="button"
    //                 onclick="this.parentElement.remove()"
    //                 class="absolute top-3 right-3 text-gray-400 hover:text-red-500">
    //                 ✕
    //             </button>

    //             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    //                 <!-- ICON + PREVIEW -->
    //                 <div>
    //                     <label class="text-xs font-semibold text-gray-500">Lucide Icon</label>

    //                     <div class="flex items-center gap-3 mt-2">

    //                         <input type="text"
    //                             name="items[${index}][icon]"
    //                             value="${icon}"
    //                             oninput="updateBenefitIcon(this, ${index})"
    //                             placeholder="e.g. zap, check, star"
    //                             class="w-full p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

    //                         <div id="benefit-icon-${index}"
    //                             class="w-11 h-11 flex items-center justify-center bg-white border rounded-lg text-gray-600">
    //                             <i data-lucide="${icon || 'zap'}"></i>
    //                         </div>

    //                         </div>
    //                         <p class="text-xs text-gray-400 mt-1">
    //                             Browse icons: <a href="https://lucide.dev/icons" target="_blank" class="hover:underline">
    //                                 lucide.dev/icons
    //                             </a>
    //                         </p>

    //                     <small id="error-items.${index}.icon" class="text-red-500 text-xs hidden"></small>
    //                 </div>

    //                 <!-- TITLE -->
    //                 <div>
    //                     <label class="text-xs font-semibold text-gray-500">Title</label>
    //                     <input type="text"
    //                         name="items[${index}][title]"
    //                         value="${title}"
    //                         class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
    //                     <small id="error-items.${index}.title" class="text-red-500 text-xs hidden"></small>
    //                 </div>

    //             </div>

    //             <!-- DESCRIPTION -->
    //             <div class="mt-4">
    //                 <label class="text-xs font-semibold text-gray-500">Description</label>
    //                 <textarea name="items[${index}][desc]" rows="2"
    //                     class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">${desc}</textarea>
    //                 <small id="error-items.${index}.desc" class="text-red-500 text-xs hidden"></small>
    //             </div>

    //         </div>
    //         `;

        //     container.insertAdjacentHTML('beforeend', html);

        //     lucide.createIcons();
        // }

        // function updateBenefitIcon(input, index) {

        //     const iconBox = document.getElementById(`benefit-icon-${index}`);
        //     const value = input.value.trim() || 'zap';

        //     iconBox.innerHTML = `<i data-lucide="${value}"></i>`;

        //     lucide.createIcons();
        // }


        // function addIndustryItem(icon = '', title = '', desc = '') {

        //     const container = document.getElementById('industriesContainer');
        //     const index = container.children.length;

        //     const html = `
    //         <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 relative">

    //             <button type="button"
    //                 onclick="this.parentElement.remove()"
    //                 class="absolute top-3 right-3 text-gray-400 hover:text-red-500">
    //                 ✕
    //             </button>

    //             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    //                 <!-- ICON -->
    //                 <div>
    //                     <label class="text-xs font-semibold text-gray-500">Lucide Icon</label>

    //                     <div class="flex items-center gap-3 mt-2">

    //                         <!-- INPUT -->
    //                         <input type="text"
    //                             name="items[${index}][icon]"
    //                             value="${icon}"
    //                             oninput="updateIndustryIcon(this, ${index})"
    //                             placeholder="e.g. building, briefcase"
    //                             class="w-full p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

    //                         <!-- PREVIEW -->
    //                     <div id="industry-icon-${index}"
    //                         class="w-12 h-12 flex items-center justify-center bg-white border rounded-lg text-gray-600 shrink-0">
    //                         <i data-lucide="${icon || 'building'}"></i>
    //                     </div>
    //                     </div>

    //                     <!-- HELP LINKS -->
    //                     <div class="mt-2 flex items-center justify-between">

    //                         <a href="https://lucide.dev/icons/" target="_blank"
    //                             class="text-xs text-[#4373F6] font-semibold hover:underline">
    //                             Browse Lucide icons →
    //                         </a>

    //                         <span class="text-[10px] text-gray-400">
    //                             Use icon name only (no "data-lucide")
    //                         </span>

    //                     </div>

    //                     <small id="error-items.${index}.icon" class="text-red-500 text-xs hidden"></small>
    //                 </div>

    //                 <!-- TITLE -->
    //                 <div>
    //                     <label class="text-xs font-semibold text-gray-500">Title</label>

    //                     <input type="text"
    //                         name="items[${index}][title]"
    //                         value="${title}"
    //                         placeholder="e.g. Healthcare"
    //                         class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">

    //                     <small id="error-items.${index}.title" class="text-red-500 text-xs hidden"></small>
    //                 </div>

    //             </div>

    //             <!-- DESCRIPTION -->
    //             <div class="mt-4">
    //                 <label class="text-xs font-semibold text-gray-500">Description</label>

    //                 <textarea name="items[${index}][desc]" rows="2"
    //                     class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">${desc}</textarea>

    //                 <small id="error-items.${index}.desc" class="text-red-500 text-xs hidden"></small>
    //             </div>

    //         </div>
    //         `;

        //     container.insertAdjacentHTML('beforeend', html);

        //     lucide.createIcons();
        // }

        // function updateIndustryIcon(input, index) {

        //     const iconBox = document.getElementById(`industry-icon-${index}`);
        //     const value = input.value.trim() || 'building';

        //     iconBox.innerHTML = `<i data-lucide="${value}"></i>`;

        //     lucide.createIcons();
        // }

        // function updateCaseStudyButtonState() {

        //     const btn = document.getElementById('addCaseStudyBtn');
        //     const currentCount = document.querySelectorAll('.case-item').length;

        //     if (!btn) return;

        //     if (currentCount >= 6) {

        //         btn.disabled = true;
        //         btn.classList.add('opacity-50', 'cursor-not-allowed');

        //     } else {

        //         btn.disabled = false;
        //         btn.classList.remove('opacity-50', 'cursor-not-allowed');
        //     }
        // }

        // function addCaseStudy(metric = '', title = '', tag1 = '', tag2 = '', featured = false) {

        //     const container = document.getElementById('caseContainer');

        //     if (!container) return;

        //     const currentCount = container.querySelectorAll('.case-item').length;

        //     if (currentCount >= 6) {

        //         showToast({
        //             type: 'error',
        //             title: 'Limit reached',
        //             text: 'You can only add up to 6 Case Study items'
        //         });

        //         updateCaseStudyButtonState();
        //         return;
        //     }

        //     const index = currentCount;

        //     const html = `
    //     <div class="case-item bg-gray-50 border border-gray-100 rounded-xl p-5 relative">

    //         <button type="button"
    //             onclick="removeCaseStudy(this)"
    //             class="absolute top-3 right-3 text-gray-400 hover:text-red-500">
    //             ✕
    //         </button>

    //         <div class="space-y-4">

    //             <!-- FEATURED -->
    //             <div class="flex items-center gap-2">
    //                 <input type="hidden" name="items[${index}][featured]" value="0">

    //                 <input type="checkbox"
    //                     name="items[${index}][featured]"
    //                     id="item-checkbox"
    //                     value="1"
    //                     ${featured ? 'checked' : ''}
    //                     class="w-4 h-4 accent-[#4373F6]">

    //                 <label class="text-xs font-semibold text-gray-500" for="item-checkbox">
    //                     Featured Card
    //                 </label>
    //             </div>

    //             <!-- METRIC + TITLE -->
    //             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    //                 <div>
    //                     <label class="text-xs font-semibold text-gray-500">Metric *</label>
    //                     <input type="text"
    //                         name="items[${index}][metric]"
    //                         value="${metric}"
    //                         placeholder="+320% / 4x / $180K"
    //                         class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
    //                 </div>

    //                 <div>
    //                     <label class="text-xs font-semibold text-gray-500">Title *</label>
    //                     <input type="text"
    //                         name="items[${index}][title]"
    //                         value="${title}"
    //                         placeholder="Organic Traffic"
    //                         class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
    //                 </div>

    //             </div>

    //             <!-- TAGS -->
    //             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    //                 <div>
    //                     <label class="text-xs font-semibold text-gray-500">Tag 1</label>
    //                     <input type="text"
    //                         name="items[${index}][tags][]"
    //                         value="${tag1}"
    //                         placeholder="E-commerce"
    //                         class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
    //                 </div>

    //                 <div>
    //                     <label class="text-xs font-semibold text-gray-500">Tag 2</label>
    //                     <input type="text"
    //                         name="items[${index}][tags][]"
    //                         value="${tag2}"
    //                         placeholder="SEO"
    //                         class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
    //                 </div>

    //             </div>

    //         </div>
    //     </div>
    //     `;

        //     container.insertAdjacentHTML('beforeend', html);

        //     updateCaseStudyButtonState();
        // }

        // function removeCaseStudy(btn) {
        //     btn.closest('.case-item').remove();
        //     updateCaseStudyButtonState();
        // }
    </script>
@endpush
