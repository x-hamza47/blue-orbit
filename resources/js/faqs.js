document.addEventListener("DOMContentLoaded", () => {
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach((item) => {
        const trigger = item.querySelector(".faq-trigger");
        const content = item.querySelector(".faq-content");

        trigger.addEventListener("click", () => {
            const isActive = item.classList.contains("active");

            // Close all other items (Optional: Remove this if you want multiple open)
            faqItems.forEach((otherItem) => {
                otherItem.classList.remove("active");
                otherItem.querySelector(".faq-content").style.maxHeight = null;
                otherItem.style.borderColor = "#f3f4f6"; // Reset border color
            });

            // Toggle current item
            if (!isActive) {
                item.classList.add("active");
                content.style.maxHeight = content.scrollHeight + "px";
                item.style.borderColor = "#4373F633"; // Action Blue with low opacity
            }
        });
    });
});
