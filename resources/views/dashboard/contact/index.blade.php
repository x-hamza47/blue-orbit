@extends('dashboard.layout.main')

@section('content')
    {{-- <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center gap-4">
                <h1 class="font-black text-xl text-[#010521]">Lead Management <span
                        class="text-gray-300 font-light mx-2">/</span> Inbound Queries</h1>
            </div>

            <div class="flex items-center gap-6">
                <button class="relative p-2 text-gray-400 hover:text-[#4373F6] transition-colors">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                            <path d="m16 17 5-5-5-5" />
                            <path d="M21 12H9" />
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        </svg>
                    </button>
                </form>
            </div>
        </header> --}}

    <div class="flex-1 overflow-y-auto p-8 custom-scrollbar bg-[#F8FAFF]">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-[#4373F6]/5 rounded-2xl text-[#4373F6]">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <span
                        class="text-green-500 font-bold text-xs flex items-center gap-1 bg-green-50 px-2 py-1 rounded-lg">+18%
                        <i data-lucide="trending-up" class="w-3 h-3"></i></span>
                </div>
                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">Total Queries</p>
                <h3 class="text-2xl font-black text-[#010521]">{{ number_format($totalQueries) }}</h3>
            </div>

            <div class="bg-[#010521] p-6 rounded-[2rem] shadow-lg shadow-[#010521]/20 group transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-white/10 rounded-2xl text-[#4373F6]">
                        <i data-lucide="sparkles" class="w-6 h-6"></i>
                    </div>
                    <span
                        class="text-white font-bold text-[10px] uppercase tracking-widest bg-[#4373F6] px-2 py-1 rounded-lg">High
                        Priority</span>
                </div>
                <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">New Leads</p>
                <h3 class="text-2xl font-black text-white">{{ $todayLeads }} Today</h3>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-gray-50 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <h4 class="text-lg font-black text-[#010521]">Recent Submissions</h4>
                    <div class="flex gap-2">
                        <span
                            class="px-3 py-1 bg-gray-50 text-gray-400 text-[10px] font-black uppercase rounded-lg border border-gray-100">All</span>
                        <span
                            class="px-3 py-1 bg-[#4373F6]/5 text-[#4373F6] text-[10px] font-black uppercase rounded-lg border border-[#4373F6]/10 cursor-pointer">Unread</span>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Date /
                                Time</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Lead
                                Details</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">
                                Interest</th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Status
                            </th>
                            <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest text-right">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($contacts as $contact)
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="px-8 py-6">
                                    <p class="font-bold text-sm text-[#010521]">
                                        {{ $contact->created_at->format('M d, Y') }}</p>
                                    <p class="text-[10px] text-gray-400 font-medium uppercase tracking-tight">
                                        {{ $contact->created_at->format('h:i A') }}
                                    </p>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-linear-to-tr from-[#4373F6] to-[#818CF8] flex items-center justify-center text-white font-black text-xs">
                                            {{ strtoupper(substr($contact->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-[#010521]">{{ $contact->name }}</p>
                                            <p class="text-[10px] text-gray-400 font-medium">{{ $contact->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span
                                        class="px-3 py-1 bg-[#4373F6]/5 text-[#4373F6] rounded-full text-[10px] font-black uppercase">
                                        {{ $contact->service->title ?? 'General Inquiry' }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        @if ($contact->created_at->isToday())
                                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                            <span class="text-[10px] font-black uppercase text-[#010521]">New</span>
                                        @else
                                            <span class="text-[10px] font-black uppercase text-gray-400">Read</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <button
                                        onclick="showLeadModal({{ json_encode([
                                            'name' => $contact->name,
                                            'email' => $contact->email,
                                            'subject' => $contact->subject,
                                            'service' => $contact->service->title ?? 'General',
                                            'message' => $contact->message,
                                            'date' => $contact->created_at->format('M d, Y h:i A'),
                                        ]) }})"
                                        class="w-10 h-10 rounded-xl bg-gray-50 text-[#010521] hover:bg-[#4373F6] hover:text-white transition-all flex items-center justify-center ml-auto">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        @if ($contacts->isEmpty())
                            <tr>
                                <td colspan="5"
                                    class="px-8 py-12 text-center text-gray-400 uppercase text-xs font-bold tracking-widest">
                                    No inbound leads found.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="p-8 bg-gray-50/30 flex items-center justify-between border-t border-gray-50">
                <p class="text-[10px] font-black uppercase text-gray-400 tracking-[0.2em]">
                    Viewing {{ $contacts->firstItem() ?? 0 }}-{{ $contacts->lastItem() ?? 0 }} of
                    {{ $contacts->total() }} Leads
                </p>
                <div class="flex gap-2">
                    {{-- Laravel Pagination Links --}}
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
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('success'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}"
                });
            </script>
        @endif
        <script>
            function showLeadModal(data) {
                Swal.fire({
                    title: `<div class="text-left font-black text-[#010521] text-xl px-2">Inbound Lead: ${data.name}</div>`,
                    html: `
                <div class="text-left p-2 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Email</p>
                            <p class="text-sm font-bold text-[#010521]">${data.email}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Service</p>
                            <span class="px-2 py-0.5 bg-[#4373F6]/5 text-[#4373F6] rounded text-[10px] font-black uppercase">${data.service}</span>
                        </div>
                    </div>
                                        <div >
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Subject</p>
                            <p class="text-sm font-bold text-[#010521]">${data.subject}</p>
                        </div>
                    </div>
                    <hr class="border-gray-100">
                    <div>
                        <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest mb-2">Message</p>
                        <div class="bg-gray-50 p-4 rounded-2xl text-sm text-gray-600 leading-relaxed italic">
                            "${data.message}"
                        </div>
                    </div>
                    <p class="text-[9px] text-gray-700 uppercase font-medium text-right mt-4">Received on ${data.date}</p>
                </div>
            `,
                    showCloseButton: true,
                    showConfirmButton: false,
                    customClass: {
                        popup: 'rounded-[2.5rem] p-4 border border-gray-100',
                        confirmButton: 'rounded-xl px-8 py-3 text-[10px] font-black uppercase tracking-widest'
                    }
                });
            }
        </script>
    @endpush
@endsection
