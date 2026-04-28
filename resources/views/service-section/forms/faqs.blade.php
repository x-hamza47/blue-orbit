<div class="grid grid-cols-1 gap-6 text-base text-left">

    <!-- SECTION: HEADER -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Section Header
        </h3>

        <div class="space-y-4">

            <!-- Heading -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Heading *</label>
                <input type="text" name="heading" value="Everything You Need to Know"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
            </div>

            <!-- Subheading -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Description</label>
                <textarea name="subheading" rows="3"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">Transparent answers about our services, ROI expectations, and how we scale your brand.</textarea>
            </div>

        </div>
    </div>


    <!-- SECTION: SUPPORT BOX -->
    <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5">
        <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider mb-4">
            Support Box
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- Title -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Title</label>
                <input type="text" name="support_title" value="Still have questions?"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
            </div>

            <!-- Email -->
            <div>
                <label class="text-xs font-semibold text-gray-500">Email</label>
                <input type="email" name="support_email" value="support@yourbrand.com"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none">
            </div>

            <!-- Text -->
            <div class="md:col-span-2">
                <label class="text-xs font-semibold text-gray-500">Support Text</label>
                <textarea name="support_text" rows="2"
                    class="w-full mt-2 p-3 rounded-xl border border-gray-200 focus:border-[#4373F6] outline-none resize-none">Our strategy team is ready to help you navigate your growth journey.</textarea>
            </div>

        </div>
    </div>


    <!-- SECTION: FAQ LIST -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xs font-black text-gray-500 uppercase tracking-wider">
                FAQs
            </h3>

            <button type="button" onclick="addFAQ()"
                class="px-3 py-1.5 bg-[#4373F6] text-white text-[10px] font-black uppercase rounded-lg shadow hover:bg-[#010521] transition">
                + Add Question
            </button>
        </div>

        <!-- FAQ Items -->
        <div id="faqContainer" class="space-y-4"></div>

    </div>

</div>
