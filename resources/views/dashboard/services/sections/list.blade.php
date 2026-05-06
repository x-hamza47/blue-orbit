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
                @php $sectionConfig = config("sections.{$section->type}") @endphp

                <div class="js-item group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md p-6 flex items-center justify-between drag-item"
                    data-id="{{ $section->id }}">

                    <div class="flex items-start gap-4">

                        <div
                            class="w-12 h-12 rounded-xl flex items-center justify-center bg-gray-100 text-gray-600 group-hover:bg-[#4373F6]/10 group-hover:text-[#4373F6] transition">
                            <i data-lucide="{{ $sectionConfig['system'] ?? false ? 'cpu' : 'layout' }}" class="w-5 h-5"></i>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-[#010521] capitalize leading-tight">
                                {{ $sectionConfig['label'] ?? $section->type }}
                            </h3>

                            <div class="flex items-center gap-2 mt-1">

                                @if ($sectionConfig['system'] ?? false)
                                    <span
                                        class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-purple-100 text-purple-700 border border-purple-200 uppercase tracking-wide">
                                        System Section
                                    </span>
                                @else
                                    <span
                                        class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-gray-100 text-gray-700 border border-gray-200 uppercase tracking-wide">
                                        Content Section
                                    </span>
                                @endif

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
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:bg-blue-500 transition">
                            </div>
                            <div
                                class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition peer-checked:translate-x-5">
                            </div>
                        </label>

                        @if (!($sectionConfig['system'] ?? false))
                            <button onclick="editSection({{ $section->id }})"
                                class="w-10 h-10 rounded-xl bg-gray-50 hover:bg-[#4373F6] hover:text-white transition flex items-center justify-center">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </button>
                        @else
                            <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-400 flex items-center justify-center"
                                title="Managed automatically">
                                <i data-lucide="cpu" class="w-4 h-4"></i>
                            </div>
                        @endif

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
                <div class="p-6 overflow-y-auto flex-1">

                    {{-- TAB SWITCHER --}}
                    <div class="flex gap-1 bg-gray-100 p-1 rounded-xl mb-5">
                        <button type="button" id="tabContent" onclick="switchTab('content')"
                            class="flex-1 py-2 text-[11px] font-black uppercase rounded-lg bg-white text-[#4373F6] shadow-sm transition">
                            Content Sections
                        </button>
                        <button type="button" id="tabAuto" onclick="switchTab('auto')"
                            class="flex-1 py-2 text-[11px] font-black uppercase rounded-lg text-gray-400 transition">
                            Auto Sections
                        </button>
                    </div>

                    {{-- CONTENT TAB --}}
                    <div id="panelContent">

                        <select id="sectionType" class="w-full border border-gray-200 p-2.5 rounded-xl text-sm"
                            onchange="loadForm()">
                            <option disabled selected value="">-- Select Section Type --</option>
                            @foreach ($availableSections as $key => $section)
                                <option value="{{ $key }}">{{ $section['label'] }}</option>
                            @endforeach
                        </select>

                        <form id="sectionForm" data-store="{{ route('service.sections.store', $service->id) }}"
                            data-update="{{ route('service.sections.update', [$service->id, ':id']) }}"
                            data-show="{{ route('service.sections.show', [$service->id, ':id']) }}"
                            data-form="{{ route('service.sections.form', ['type' => ':type']) }}" data-success="reload"
                            class="mt-4 js-form">

                            <input type="hidden" name="type" id="typeInput">
                            <div id="formContainer"></div>

                            <button type="submit"
                                class="mt-4 bg-[#4373F6] text-white px-4 py-2.5 rounded-xl w-full text-[11px] font-black uppercase hidden"
                                id="submitBtn">
                                Save Section
                            </button>

                        </form>

                    </div>

                    {{-- AUTO TAB --}}
                    <div id="panelAuto" class="hidden">

                        @if ($availableSystemSections->isNotEmpty())
                            <div class="space-y-3">
                                @foreach ($availableSystemSections as $key => $section)
                                    <button type="button" onclick="addSystemSection('{{ $key }}')"
                                        class="w-full flex items-center justify-between px-4 py-4 rounded-xl border border-dashed border-gray-200 hover:border-[#4373F6] hover:bg-blue-50 transition group">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-9 h-9 rounded-lg bg-purple-50 text-purple-500 flex items-center justify-center shrink-0">
                                                <i data-lucide="cpu" class="w-4 h-4"></i>
                                            </div>
                                            <div class="text-left">
                                                <p class="font-bold text-sm text-[#010521]">{{ $section['label'] }}</p>
                                                <p class="text-xs text-gray-400">
                                                    {{ $section['description'] ?? 'Managed automatically' }}</p>
                                            </div>
                                        </div>
                                        <span
                                            class="text-[10px] font-bold px-2 py-1 bg-purple-50 text-purple-500 rounded-lg uppercase shrink-0 ml-3">
                                            + Add
                                        </span>
                                    </button>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-10 text-gray-400">
                                <i data-lucide="check-circle" class="w-8 h-8 mx-auto mb-2"></i>
                                <p class="text-sm font-semibold">All auto sections added</p>
                            </div>
                        @endif

                    </div>

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
    </script>
@endpush
