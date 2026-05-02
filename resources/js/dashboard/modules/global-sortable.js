import { debounce } from "../utils/debouncer";
import api from "../utils/api";

export function initGlobalSortable() {

    document.querySelectorAll(".js-sortable").forEach((el) => {

        const sendOrderUpdate = debounce(async (order) => {
            const url = el.dataset.orderUrl;
            const payloadKey = el.dataset.payload || "order";

            await api.request({
                method: "post",
                url,
                data: {
                    [payloadKey]: order,
                },
            });
        }, 2000);

        new Sortable(el, {
            animation: parseInt(el.dataset.animation ?? 350),
            delay: parseInt(el.dataset.delay || 0),
            handle: ".drag-handle",
            scrollSensitivity: 90,
            scrollSpeed: 10,
            delayOnTouchOnly: true,
            chosenClass: el.dataset.class || "bg-blue-200",
            dragClass: el.dataset.dragClass || "scale-105",
            scroll: true,

            onEnd: function () {
                let order = [];

                el.querySelectorAll("[data-id]").forEach((row, index) => {
                    order.push({
                        id: row.dataset.id,
                        order: index + 1,
                    });
                });

                sendOrderUpdate(order);
            },
        });
    });
}
