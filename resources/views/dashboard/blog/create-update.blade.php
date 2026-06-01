@extends('dashboard.layout.main')

@section('content')
    <div class="flex-1 overflow-y-auto p-8 bg-[#F8FAFF]">

        <a href="{{ route('posts.index') }}"
            class="px-3 py-2 w-max bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-xl text-[10px] font-black uppercase flex items-center gap-2 transition">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back
        </a>

        <form method="POST" id="post-form"
            action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}"
            enctype="multipart/form-data">

            @csrf
            @isset($post)
                @method('PUT')
            @endisset

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow">

                    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}"
                        placeholder="Post Title..."
                        class="w-full text-2xl font-black border-none outline-none mb-2 focus:ring-0 @error('title') border-b-2 border-red-400 @enderror">

                    @error('title')
                        <p class="text-xs text-red-500 mb-4">{{ $message }}</p>
                    @enderror

                    <div id="editorjs"
                        class="min-h-[500px] border border-gray-100 rounded-xl p-4 @error('content_json') border-red-300 @enderror">
                    </div>

                    @error('content_json')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror

                    <input type="hidden" name="content_json" id="content_json">

                </div>

                <div class="bg-white rounded-2xl p-6 shadow space-y-4">

                    <p class="text-xs font-black uppercase text-gray-400 tracking-widest">
                        {{ isset($post) ? 'Edit Post' : 'New Post' }}
                    </p>

                    {{-- Service --}}
                    <div>
                        <select name="service_id"
                            class="w-full border rounded-xl p-3 text-sm @error('service_id') border-red-400 @else border-gray-200 @enderror">
                            <option value="">— No Service —</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ old('service_id', $post->service_id ?? '') == $service->id ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Excerpt --}}
                    <div>
                        <input type="text" name="excerpt" value="{{ old('excerpt', $post->excerpt ?? '') }}"
                            placeholder="Short excerpt..."
                            class="w-full border rounded-xl p-3 text-sm @error('excerpt') border-red-400 @else border-gray-200 @enderror">
                        @error('excerpt')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Author --}}
                    <div>
                        <select name="author_id"
                            class="w-full border rounded-xl p-3 text-sm @error('author_id') border-red-400 @else border-gray-200 @enderror">

                            <option value="">— Select Author —</option>

                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}"
                                    {{ old('author_id', $post->author_id ?? '') == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }} ({{ $author->designation }})
                                </option>
                            @endforeach

                        </select>

                        @error('author_id')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Slug --}}
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase block mb-2">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}"
                            placeholder="post-slug"
                            class="w-full border rounded-xl p-3 text-sm font-mono border-gray-200 @error('slug') border-red-400 @enderror">
                        @error('slug')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-[10px] text-gray-400 mt-1">Leave blank to auto-generate from title.</p>
                    </div>
                    {{-- Read time --}}
                    <div>
                        <input type="number" name="read_time" value="{{ old('read_time', $post->read_time ?? '') }}"
                            placeholder="Read time (mins)"
                            class="w-full border rounded-xl p-3 text-sm @error('read_time') border-red-400 @else border-gray-200 @enderror">
                        @error('read_time')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Thumbnail --}}
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase block mb-2">Thumbnail</label>

                        {{-- Current thumbnail preview --}}
                        @isset($post->thumbnail_url)
                            <img id="thumb-preview" src="{{ asset($post->thumbnail_url) }}"
                                class="w-full h-32 object-cover rounded-xl mb-2">
                        @else
                            <img id="thumb-preview" src="" class="w-full h-32 object-cover rounded-xl mb-2 hidden">
                        @endisset

                        {{-- Custom file picker --}}
                        <label for="thumbnail"
                            class="flex items-center gap-3 w-full border-2 border-dashed border-gray-200 hover:border-indigo-400 rounded-xl p-3 cursor-pointer transition group @error('thumbnail') border-red-400 @endif">
                            <div class="w-9 h-9 rounded-lg bg-gray-100 group-hover:bg-indigo-50 flex items-center justify-center flex-shrink-0 transition">
                                <i data-lucide="image-plus" class="w-4 h-4 text-gray-400 group-hover:text-indigo-500 transition"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p id="thumb-label" class="text-xs font-bold text-gray-500 truncate">
                                    {{ isset($post->thumbnail_url) ? 'Replace image' : 'Choose image' }}
                                </p>
                                <p class="text-[10px] text-gray-400">JPG, PNG, WEBP · max 4 MB</p>
                            </div>
                            <input id="thumbnail" type="file" name="thumbnail" accept="image/*" class="hidden">
                        </label>

                        @error('thumbnail')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Meta title --}}
                    <div>
                        <input type="text"
                            name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}"
                            placeholder="Meta title"
                            class="w-full border rounded-xl p-3 text-sm @error('meta_title') border-red-400 @else border-gray-200 @enderror">
                            @error('meta_title')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    {{-- Meta description --}}
                    <div>
                        <textarea name="meta_description" placeholder="Meta description"
                            class="w-full border rounded-xl p-3 text-sm h-24 @error('meta_description') border-red-400 @else border-gray-200 @enderror">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
                        @error('meta_description')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_published" value="1"
                            {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}
                            class="w-4 h-4 rounded">
                        <span class="text-sm font-bold">Publish</span>
                    </label>

                    <button type="button" onclick="submitPost()"
                        class="w-full bg-[#010521] text-white py-3 rounded-xl font-bold text-sm">
                        {{ isset($post) ? 'Update Post' : 'Save Post' }}
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    {{-- all your existing scripts unchanged --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/raw@latest"></script>

    <script>
        const existingData = @json(old('content_json') ? json_decode(old('content_json')) : $post->content_json ?? null);

        const uploadedImages = new Set();

        const editor = new EditorJS({
            holder: 'editorjs',
            placeholder: 'Start writing your post...',
            tools: {
                header: {
                    class: Header,
                    config: {
                        levels: [2, 3, 4],
                        defaultLevel: 2
                    }
                },
                list: {
                    class: EditorjsList,
                    inlineToolbar: true
                },
                quote: Quote,
                code: CodeTool,
                delimiter: Delimiter,
                raw: RawTool,
                warning: {
                    class: Warning,
                    inlineToolbar: true,
                    config: {
                        titlePlaceholder: 'Title',
                        messagePlaceholder: 'Message'
                    }
                },
                table: {
                    class: Table,
                    inlineToolbar: true,
                    config: {
                        rows: 2,
                        cols: 2,
                        withHeading: true
                    }
                },
                inlineCode: {
                    class: InlineCode
                },
                image: {
                    class: ImageTool,
                    config: {
                        endpoints: {
                            byFile: '{{ route('posts.upload-image') }}'
                        },
                        additionalRequestHeaders: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }
                }
            },
            data: existingData ?? undefined
        });

        const originalOpen = XMLHttpRequest.prototype.open;
        const originalSend = XMLHttpRequest.prototype.send;

        XMLHttpRequest.prototype.open = function(method, url, ...rest) {
            this._url = url;
            return originalOpen.call(this, method, url, ...rest);
        };

        XMLHttpRequest.prototype.send = function(...args) {
            this.addEventListener('load', function() {
                try {
                    if (this._url && this._url.includes('upload-image')) {
                        const data = JSON.parse(this.responseText);
                        if (data.success && data.file?.filename) {
                            uploadedImages.add(data.file.filename);
                        }
                    }
                } catch (e) {}
            });
            return originalSend.apply(this, args);
        };

        async function syncImageCleanup() {
            const data = await editor.save();
            const usedImages = new Set();
            data.blocks.forEach(block => {
                if (block.type === 'image') {
                    const url = block.data?.file?.url;
                    if (url) usedImages.add(url.split('/').pop());
                }
            });

            const toDelete = [...uploadedImages].filter(f => !usedImages.has(f));

            for (const filename of toDelete) {
                try {
                    await axios.delete('{{ route('posts.temp-image.delete') }}', {
                        data: {
                            filename
                        }
                    });
                } catch (err) {
                    console.error('Delete failed:', err);
                }
                uploadedImages.delete(filename);
            }
        }

        async function submitPost() {
            try {
                const output = await editor.save();
                const title = document.querySelector('input[name="title"]').value.trim();
                const errors = [];

                if (!title) errors.push('Post title is required.');
                if (!output.blocks || output.blocks.length === 0) errors.push('Post content cannot be empty.');

                if (errors.length > 0) {
                    await Swal.fire({
                        icon: 'warning',
                        title: 'Hold on!',
                        html: errors.map(e => `<p class="text-sm text-gray-600">${e}</p>`).join(''),
                        confirmButtonText: 'Got it',
                        confirmButtonColor: '#010521',
                        borderRadius: '1rem',
                    });
                    return;
                }

                document.getElementById('content_json').value = JSON.stringify(output);
                await syncImageCleanup();
                document.getElementById('post-form').submit();

            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Something went wrong',
                    text: 'Failed to save editor content. Please try again.',
                    confirmButtonColor: '#010521',
                });
            }
        }

        const thumbInput = document.getElementById('thumbnail');
        const thumbPreview = document.getElementById('thumb-preview');
        const thumbLabel = document.getElementById('thumb-label');

        thumbInput.addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;
            thumbLabel.textContent = file.name;
            const reader = new FileReader();
            reader.onload = e => {
                thumbPreview.src = e.target.result;
                thumbPreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>
@endpush

@push('styles')
    @vite('resources/css/editor.css')
@endpush
