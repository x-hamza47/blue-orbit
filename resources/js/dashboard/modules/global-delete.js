import api from "../utils/api";

export function initGLobalDelete() {
    document.querySelectorAll(".js-delete").forEach((btn) => {
        btn.addEventListener("click", async () => {
            const url = btn.dataset.url;
            const text = `This ${btn.dataset.text || "item"} will be permanently deleted!`;

            const result = await Swal.fire({
                title: "Are you sure?",
                text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it",
                cancelButtonText: "Cancel",
                confirmButtonColor: "#EF4444",
                cancelButtonColor: "#6B7280",
                customClass: {
                    popup: "rounded-2xl p-6",
                },
            });

            if (!result.isConfirmed) return;

            await api.request({
                method: "delete",
                url,
            });

            const el = btn.closest(".js-item");

            el.classList.add(
                "transition-all",
                "duration-700",
                "opacity-0",
                "scale-95",
            );

            setTimeout(() => {
                el.remove();
            }, 850);
        });
    });
}
