// Info: Navbar js

const menuItems = document.querySelectorAll(".menu-item");

menuItems.forEach((item) => {
    const btn = item.querySelector(".nav-link");
    const dropdown = item.querySelector(".menu-dropdown");
    const chevron = item.querySelector(".chevron");
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation(); 
        menuItems.forEach((other) => {
            const otherDropdown = other.querySelector(".menu-dropdown");
            const otherBtn = other.querySelector(".nav-link");
            const otherChevron = otherBtn.querySelector('.chevron');
            if (otherDropdown !== dropdown) {
                otherChevron.classList.remove("rotate-180");
                otherDropdown.classList.remove("active");
                otherBtn.classList.remove("active");
            }
        });
        const isOpen = !dropdown.classList.contains("active");
        dropdown.classList.toggle("active");
        btn.classList.toggle("active", isOpen);
        if (chevron) {
            chevron.classList.toggle("rotate-180", isOpen);
        }
    });
});


// Sub menu toggle (mobile accordion)
const subMenus = document.querySelectorAll(".sub-menu");

subMenus.forEach((menu) => {
  
    const sub_dropdown = menu.querySelector(".sub-menu-dropdown");
    const sub_chevron = menu.querySelector(".sub-chevron");

    sub_chevron.addEventListener("click", (e) => {
        e.stopPropagation(); 

        subMenus.forEach((other) => {
            if (other !== menu) {
                other
                    .querySelector(".sub-menu-dropdown")
                    .classList.remove("active");
                other
                    .querySelector(".sub-chevron")
                    .classList.remove("rotate-180");
            }
        });

        const isOpen = !sub_dropdown.classList.contains("active");

        sub_dropdown.classList.toggle("active");
        sub_chevron.classList.toggle("rotate-180", isOpen);
    });
});



const menuBtn = document.getElementById("mobile-menu-btn");
const menuIcon = document.getElementById("menu-icon");
const navbar = document.querySelector(".navbar");

menuBtn.addEventListener("click", () => {
    const isOpen = navbar.classList.toggle("active");
    document.body.classList.toggle("no-scroll", isOpen);

    const newIcon = isOpen ? "x" : "menu";

    document.getElementById("menu-icon").outerHTML =
        `<i id="menu-icon" data-lucide="${newIcon}" class="w-7 h-7"></i>`;

    lucide.createIcons();
});

document.addEventListener("click", (e) => {
    const isClickInside = [...menuItems].some((item) =>
        item.contains(e.target),
    );
    if (!isClickInside) {
        menuItems.forEach((item) => {
            const dropdown = item.querySelector(".menu-dropdown");
            const btn = item.querySelector(".nav-link");
            const chevron = btn.querySelector('.chevron');
            chevron.classList.remove("rotate-180");
            dropdown.classList.remove("active");
            btn.classList.remove("active");
        });
    }
});



