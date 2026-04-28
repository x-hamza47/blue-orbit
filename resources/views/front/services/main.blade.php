@extends('front.main')

@section('content')
    @foreach ($service->sections as $section)
        @include('temp.' . $section->type, ['data' => $section->data])
    @endforeach
@endsection

@push('scripts')
    {{-- @stack('service.section.scripts') --}}
    <script>

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