<div class="mb-4">
    <label class="block text-sm font-medium mb-2">Subheading</label>

    <input type="text"
           name="subheading"
           value="{{ $existing['subheading'] ?? '' }}"
           class="w-full border p-2 rounded">

    <small id="error-subheading"
           class="text-red-500 text-xs hidden mt-1 block"></small>
</div>

<div data-dynamic-wrapper data-type="benefit" data-existing='@json($existing["items"] ?? [])'
    class="bg-white border border-gray-100 rounded-2xl p-5">

    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider">
            Benefits Items
        </h3>

        <button type="button" data-add
            class="px-3 py-1.5 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg shadow hover:bg-[#010521] transition">
            + Add Benefit
        </button>
    </div>

    <div data-dynamic-container class="space-y-4"></div>

     <small id="error-items" class="text-red-500 text-xs hidden mt-2 block"></small>
</div>

