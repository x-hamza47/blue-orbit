@extends('home-layout.layout')
@section('content')
    <div class="flex min-h-screen flex-col justify-center bg-white py-10 px-[clamp(1.5rem,5vw,5rem)]">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-center font-black tracking-tight text-[#010521]" style="font-size: clamp(2rem, 4vw, 2.5rem);">
                Blue Orbit <span class="text-[#4373F6]"> Admin Login</span>
            </h2>
            <p class="mt-2 text-center text-gray-500 font-medium">Enter your credentials to manage site.</p>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-110">
            <div class="bg-[#F8FAFF] border border-gray-100 p-8 md:p-10 rounded-[2.5rem] shadow-sm">
                <form action="{{ route('loginUser') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="email"
                            class="block text-xs font-black uppercase tracking-widest text-[#010521] ml-1">Email
                            Address</label>
                        <input id="email" type="email" name="email" required autocomplete="email"
                            placeholder="name@company.com"
                            class="block w-full rounded-2xl bg-white border border-gray-200 px-4 py-4 text-base text-[#010521] outline-none placeholder:text-gray-400 focus:border-[#4373F6] focus:ring-4 focus:ring-[#4373F6]/5 transition-all font-medium" />
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between ml-1">
                            <label for="password"
                                class="block text-xs font-black uppercase tracking-widest text-[#010521]">Password</label>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••"
                            class="block w-full rounded-2xl bg-white border border-gray-200 px-4 py-4 text-base text-[#010521] outline-none placeholder:text-gray-400 focus:border-[#4373F6] focus:ring-4 focus:ring-[#4373F6]/5 transition-all font-medium" />
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center items-center gap-2 rounded-2xl bg-[#010521] px-4 py-5 text-sm font-black uppercase tracking-widest text-white hover:bg-[#4373F6] shadow-lg hover:shadow-[#4373F6]/20 transition-all duration-300">
                            Sign In to Dashboard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
