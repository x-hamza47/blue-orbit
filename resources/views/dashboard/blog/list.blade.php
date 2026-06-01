@extends('dashboard.layout.main')

@section('content')
    <div class="flex-1 overflow-y-auto p-8 custom-scrollbar bg-[#F8FAFF]">
        {{-- STATS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-[#4373F6]/5 rounded-2xl text-[#4373F6]">
                        <i data-lucide="file-text" class="w-6 h-6"></i>
                    </div>
                </div>

                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">
                    Total Posts
                </p>

                <h3 class="text-2xl font-black text-[#010521]">
                    {{ $totalPosts }}
                </h3>
            </div>

            <div class="bg-[#010521] p-6 rounded-[2rem] shadow-lg shadow-[#010521]/20">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-white/10 rounded-2xl text-white">
                        <i data-lucide="check-circle" class="w-6 h-6"></i>
                    </div>
                </div>

                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">
                    Published
                </p>

                <h3 class="text-2xl font-black text-white">
                    {{ $publishedPosts }}
                </h3>
            </div>

            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-yellow-50 rounded-2xl text-yellow-500">
                        <i data-lucide="edit-3" class="w-6 h-6"></i>
                    </div>
                </div>

                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">
                    Drafts
                </p>

                <h3 class="text-2xl font-black text-[#010521]">
                    {{ $draftPosts }}
                </h3>
            </div>

        </div>

        {{-- TABLE BOX --}}
        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">

            {{-- HEADER --}}
            <div class="p-8 border-b border-gray-50 flex flex-wrap items-center justify-between gap-4">

                <div class="flex items-center gap-4">
                    <h4 class="text-lg font-black text-[#010521]">Blog Posts</h4>
                </div>

                <div class="flex items-center gap-3">

                    {{-- NO ROUTES YET SAFE BUTTON --}}
                    <a href="{{ route('posts.create') }}"
                        class="px-4 py-2 bg-[#010521] text-white text-[10px] font-black uppercase rounded-xl">
                        + Add Post
                    </a>

                </div>

            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left">

                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Post</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Tags</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Status</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400">Read Time</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 text-right">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-50">

                        @foreach ($posts as $post)
                            <tr class="hover:bg-gray-50/50 group js-item">

                                {{-- POST --}}
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">

                                        <img src="{{ asset($post->thumbnail_url) }}"
                                            class="w-10 h-10 rounded-xl object-cover">

                                        <div>
                                            <p class="font-bold text-sm text-[#010521]">
                                                {{ $post->title }}
                                            </p>
                                            <p class="text-[10px] text-gray-400">
                                                {{ $post->author_name ?? 'Admin' }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                {{-- TAGS --}}
                                <td class="px-8 py-6">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach ($post->tags as $tag)
                                            <span class="text-[10px] px-2 py-1 bg-gray-100 rounded-full">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>

                                {{-- STATUS --}}
                                <td class="px-8 py-6">
                                    @if ($post->is_published)
                                        <span class="text-green-600 text-xs font-black uppercase">
                                            Published
                                        </span>
                                    @else
                                        <span class="text-gray-400 text-xs font-black uppercase">
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                {{-- READ TIME --}}
                                <td class="px-8 py-6 text-xs text-gray-500 font-bold">
                                    {{ $post->read_time ?? 0 }} min
                                </td>

                                {{-- ACTION --}}
                                <td class="px-8 py-6 text-right">

                                    <div class="flex justify-end gap-2">

                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="w-10 h-10 rounded-xl bg-gray-50 text-gray-500 flex items-center justify-center hover:bg-blue-50 hover:text-blue-500">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </a>
                                
                                        <button data-url="{{ route('posts.destroy', $post->id) }}"
                                            data-text="post"
                                            class="js-delete w-10 h-10 rounded-xl bg-gray-50 text-red-500 hover:bg-red-500 hover:text-white transition flex items-center justify-center">
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
@endpush
