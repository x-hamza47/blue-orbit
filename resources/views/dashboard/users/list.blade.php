@extends('dashboard.layout.main')

@section('content')
    <div class="flex-1 overflow-y-auto p-8 custom-scrollbar bg-[#F8FAFF]">
        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-gray-50 flex flex-wrap items-center justify-between gap-4">

                {{-- Left --}}
                <div class="flex items-center gap-4">
                    <h4 class="text-lg font-black text-[#010521]">Authors</h4>

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

                    <button type="button" data-title="Create Author" data-submit-url="{{ route('author.store') }}"
                        class="author-open-form px-4 py-2 bg-[#010521] text-white text-[10px] font-black uppercase rounded-xl shadow-lg hover:bg-[#4373F6] transition">
                        + Add Author
                    </button>

                </div>

            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Author</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Company</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Status</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-50">
                        @foreach ($author as $item)
                            <tr class="hover:bg-gray-50/50 group js-item">

                                {{-- AUTHOR INFO --}}
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">

                                        {{-- IMAGE --}}
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                class="w-10 h-10 rounded-xl object-cover">
                                        @else
                                            <div
                                                class="w-10 h-10 rounded-xl bg-gray-100 flex items-center justify-center text-gray-400">
                                                <i data-lucide="user" class="w-5 h-5"></i>
                                            </div>
                                        @endif

                                        <div>
                                            <p class="font-bold text-sm text-[#010521]">
                                                {{ $item->name }}
                                            </p>

                                            <p class="text-[10px] text-gray-400">
                                                {{ $item->designation ?? 'No designation' }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                {{-- COMPANY --}}
                                <td class="px-8 py-6">
                                    <span
                                        class="px-3 py-1 bg-[#4373F6]/5 text-[#4373F6] rounded-full text-[10px] font-black uppercase">
                                        {{ $item->company ?? '—' }}
                                    </span>
                                </td>

                                {{-- STATUS --}}
                                <td class="px-8 py-6">
                                    <label class="inline-flex items-center cursor-pointer">

                                        <input type="checkbox" class="sr-only peer toggle-status"
                                            data-id="{{ $item->id }}" {{ $item->is_active ? 'checked' : '' }}>

                                        <div
                                            class="relative w-11 h-6 bg-gray-200 rounded-full transition
                                            after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                                            after:bg-white after:border after:rounded-full after:h-5 after:w-5
                                            after:transition-all
                                            peer-checked:bg-[#4373F6]
                                            peer-checked:after:translate-x-full">
                                        </div>

                                        <span class="ml-2 text-[10px] font-black uppercase">
                                            {{ $item->is_active ? 'Active' : 'Hidden' }}
                                        </span>
                                    </label>
                                </td>

                                {{-- ACTIONS --}}
                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end gap-2">

                                        <button data-title="Edit Author"
                                            data-submit-url="{{ route('author.update', $item->id) }}" data-method="put"
                                            data-author="{{ $item }}"
                                            class="author-open-form w-10 h-10 rounded-xl bg-gray-50 text-[#010521]
                        hover:bg-[#4373F6] hover:text-white transition flex items-center justify-center">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </button>

                                        <button data-url="{{ route('author.destroy', $item->id) }}"
                                            class="js-delete w-10 h-10 rounded-xl bg-gray-50 text-red-500
                        hover:bg-red-500 hover:text-white transition flex items-center justify-center">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/js/dashboard/pages/author.js')
@endpush
