@extends('dashboard.layout.main')
@section('content')
    <main class="flex-1 flex flex-col h-screen overflow-hidden">

        <header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center gap-4">
                <h1 class="font-black text-xl text-[#010521]">Global Performance <span
                        class="text-gray-300 font-light mx-2">/</span> Overview</h1>
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
        </header>

        <div class="flex-1 overflow-y-auto p-8 custom-scrollbar">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-[#4373F6]/5 rounded-2xl">
                            <i data-lucide="eye" class="w-6 h-6 text-[#4373F6]"></i>
                        </div>
                        <span
                            class="text-green-500 font-bold text-xs flex items-center gap-1 bg-green-50 px-2 py-1 rounded-lg">+12.4%
                            <i data-lucide="trending-up" class="w-3 h-3"></i></span>
                    </div>
                    <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">Total Impressions</p>
                    <h3 class="text-2xl font-black text-[#010521]">1,284,500</h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-[#4373F6]/5 rounded-2xl">
                            <i data-lucide="mouse-pointer-click" class="w-6 h-6 text-[#4373F6]"></i>
                        </div>
                        <span
                            class="text-green-500 font-bold text-xs flex items-center gap-1 bg-green-50 px-2 py-1 rounded-lg">+8.1%
                            <i data-lucide="trending-up" class="w-3 h-3"></i></span>
                    </div>
                    <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">Average CTR</p>
                    <h3 class="text-2xl font-black text-[#010521]">4.28%</h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-[#4373F6]/5 rounded-2xl">
                            <i data-lucide="dollar-sign" class="w-6 h-6 text-[#4373F6]"></i>
                        </div>
                        <span
                            class="text-red-500 font-bold text-xs flex items-center gap-1 bg-red-50 px-2 py-1 rounded-lg">-2.4%
                            <i data-lucide="trending-down" class="w-3 h-3"></i></span>
                    </div>
                    <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">Cost Per Lead</p>
                    <h3 class="text-2xl font-black text-[#010521]">$14.20</h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-[#010521] rounded-2xl shadow-lg shadow-[#010521]/20">
                            <i data-lucide="zap" class="w-6 h-6 text-[#4373F6]"></i>
                        </div>
                        <span
                            class="text-green-500 font-bold text-xs flex items-center gap-1 bg-green-50 px-2 py-1 rounded-lg">+22%
                            <i data-lucide="trending-up" class="w-3 h-3"></i></span>
                    </div>
                    <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mb-1">Conversions</p>
                    <h3 class="text-2xl font-black text-[#010521]">12,840</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                <div class="lg:col-span-2 bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h4 class="text-lg font-black text-[#010521]">Revenue Growth</h4>
                            <p class="text-sm text-gray-400 font-medium">Predicted vs Actual performance</p>
                        </div>
                        <select class="bg-gray-50 border-none rounded-xl text-xs font-bold px-4 py-2">
                            <option>Last 30 Days</option>
                            <option>Last 6 Months</option>
                        </select>
                    </div>
                    <canvas id="revenueChart" height="120"></canvas>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <h4 class="text-lg font-black text-[#010521] mb-2">Channel Spend</h4>
                    <p class="text-sm text-gray-400 font-medium mb-8">Budget allocation per platform</p>
                    <canvas id="distributionChart"></canvas>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-8 bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-gray-50 flex items-center justify-between">
                        <h4 class="text-lg font-black text-[#010521]">Top Performing Campaigns</h4>
                        <button class="text-[#4373F6] font-bold text-xs uppercase tracking-widest hover:underline">Full
                            Report</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50/50">
                                <tr>
                                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">
                                        Campaign Name</th>
                                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">
                                        Status</th>
                                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">
                                        Budget Spent</th>
                                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">
                                        ROAS</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-8 py-5">
                                        <p class="font-bold text-sm text-[#010521]">Summer Alpha Reach</p>
                                        <span class="text-[10px] text-gray-400 font-medium">Google Search
                                            Ads</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-[10px] font-black uppercase">Active</span>
                                    </td>
                                    <td class="px-8 py-5 font-bold text-sm">$4,250.00</td>
                                    <td class="px-8 py-5 text-[#4373F6] font-black">4.8x</td>
                                </tr>
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-8 py-5">
                                        <p class="font-bold text-sm text-[#010521]">Retargeting Gen Z</p>
                                        <span class="text-[10px] text-gray-400 font-medium">Meta Social</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-[10px] font-black uppercase">Optimizing</span>
                                    </td>
                                    <td class="px-8 py-5 font-bold text-sm">$2,100.00</td>
                                    <td class="px-8 py-5 text-[#4373F6] font-black">3.2x</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-8">
                    <div class="bg-[#010521] p-8 rounded-[2.5rem] text-white relative overflow-hidden group">
                        <div class="relative z-10">
                            <h4 class="font-black text-xl mb-4">BlueOrbit AI Suggestion</h4>
                            <p class="text-gray-400 text-sm leading-relaxed mb-6">"Campaign <span
                                    class="text-white font-bold">Summer Alpha</span> is currently yielding 15%
                                lower CPC than industry average. Suggest increasing daily spend by $200."</p>
                            <button
                                class="w-full py-3 bg-[#4373F6] rounded-xl text-xs font-black uppercase tracking-widest hover:scale-105 transition-transform">Apply
                                Optimization</button>
                        </div>
                        <i data-lucide="sparkles"
                            class="absolute -right-4 -bottom-4 w-24 h-24 text-white/5 group-hover:rotate-12 transition-transform"></i>
                    </div>
                </div>
            </div>

        </div>
    </main>

    @push('scripts')
        <script>
            const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctxRevenue, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Revenue ($)',
                        data: [12000, 19000, 15000, 25000, 22000, 30000, 35000],
                        borderColor: '#4373F6',
                        backgroundColor: 'rgba(67, 115, 246, 0.05)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 4,
                        pointRadius: 0
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            display: false
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
            const ctxDist = document.getElementById('distributionChart').getContext('2d');
            new Chart(ctxDist, {
                type: 'doughnut',
                data: {
                    labels: ['Google', 'Meta', 'TikTok', 'Email'],
                    datasets: [{
                        data: [45, 25, 20, 10],
                        backgroundColor: ['#010521', '#4373F6', '#818CF8', '#E2E8F0'],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '80%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                font: {
                                    weight: 'bold',
                                    size: 10
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
