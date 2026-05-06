<div class="grid grid-cols-1 gap-6 text-left">

    <!-- HEADER -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase mb-4">Section Header</h3>

        <div class="space-y-4">

            <input type="text" name="heading"
                value="{{ $existing['heading'] ?? '' }}"
                placeholder="Heading"
                class="w-full p-3 rounded-xl border">

            <input type="text" name="highlight"
                value="{{ $existing['highlight'] ?? '' }}"
                placeholder="Highlight"
                class="w-full p-3 rounded-xl border">

        </div>
    </div>

    <!-- FEATURES -->
    <div class="bg-white border rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase mb-4">Features</h3>

        <div data-dynamic-wrapper
             data-type="trust"
             data-existing='@json($existing["features"] ?? [])'>

            <div data-dynamic-container class="space-y-4"></div>

            <button type="button" data-add class="mt-4 px-3 py-1.5 bg-blue-600 text-white text-xs rounded">
                + Add Feature
            </button>

        </div>
    </div>

    <!-- PARTNERS -->
    <div class="bg-white border rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase mb-4">Partners</h3>

        <div data-dynamic-wrapper
             data-type="trust_partners"
             data-existing='@json($existing["partners"] ?? [])'>

            <div data-dynamic-container class="grid grid-cols-3 gap-3"></div>

            <button type="button" data-add class="mt-4 px-3 py-1.5 bg-blue-600 text-white text-xs rounded">
                + Add Partner
            </button>

        </div>
    </div>

    <!-- TAGS -->
    <div class="bg-white border rounded-2xl p-5">

        <h3 class="text-xs font-black text-gray-500 uppercase mb-4">Core Competencies</h3>

        <div data-dynamic-wrapper
             data-type="trust_tags"
             data-existing='@json($existing["tags"] ?? [])'>

            <div data-dynamic-container class="flex flex-wrap gap-2"></div>

            <button type="button" data-add class="mt-4 px-3 py-1.5 bg-blue-600 text-white text-xs rounded">
                + Add Tag
            </button>

        </div>
    </div>

</div>