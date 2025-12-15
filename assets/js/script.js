var nav = document.querySelector("header");
window.onscroll = function () {
    if (document.documentElement.scrollTop > 100) {
        nav.classList.add("scroll-on");
    } else {
        nav.classList.remove("scroll-on");
    }
};

const tabButtons = document.querySelectorAll(".tab-btn");
const tabContents = document.querySelectorAll(".tab-content");

tabButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
        tabButtons.forEach((b) => {
            b.classList.remove("text-[var(--primary-color)]");
            b.classList.add("text-gray-600");
            b.querySelector(".underline-bar").classList.add("hidden");
        });
        tabContents.forEach((c) => c.classList.add("hidden"));
        btn.classList.add("text-[var(--primary-color)]");
        btn.classList.remove("text-gray-600");
        btn.querySelector(".underline-bar").classList.remove("hidden");
        const target = btn.getAttribute("data-tab");
        document.getElementById(target).classList.remove("hidden");
    });
});
const modal = document.getElementById('bookingModal');

function openModal() {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
$('.testimonial-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    infinite: true,
    speed: 500,
    autoplay: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 640,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }
    ]
});
const openBtn = document.getElementById("openMenu");
const closeBtn = document.getElementById("closeMenu");
const mobileMenu = document.getElementById("mobileMenu");
const backdrop = document.getElementById("backdrop");
const body = document.body;

openBtn.addEventListener("click", () => {
    mobileMenu.classList.remove("translate-x-full");
    mobileMenu.classList.add("translate-x-0");
    backdrop.classList.remove("opacity-0", "invisible");
    backdrop.classList.add("opacity-100", "visible");
    body.classList.add("overflow-hidden");
});

closeBtn.addEventListener("click", closeMenuHandler);
backdrop.addEventListener("click", closeMenuHandler);
document.querySelectorAll(".dropdown-toggle").forEach((btn) => {
    btn.addEventListener("click", () => {
        const submenu = btn.nextElementSibling;
        const icon = btn.querySelector("i");

        if (submenu.style.maxHeight) {
            submenu.style.maxHeight = null;
            icon.classList.remove("rotate-180");
        } else {
            submenu.style.maxHeight = submenu.scrollHeight + "px";
            icon.classList.add("rotate-180");
        }
    });
});
function closeMenuHandler() {
    mobileMenu.classList.add("translate-x-full");
    mobileMenu.classList.remove("translate-x-0");
    backdrop.classList.add("opacity-0", "invisible");
    backdrop.classList.remove("opacity-100", "visible");
    body.classList.remove("overflow-hidden");
}




