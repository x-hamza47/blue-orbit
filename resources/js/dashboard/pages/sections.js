import { addListItem, initDynamicLists } from "../modules/dynamic-list";

document.addEventListener("DOMContentLoaded", () => {
    initDynamicLists(document);

    document.getElementById("addFaqBtn")?.addEventListener("click", () => {
        addListItem("faqContainer", "faq");
    });
});
