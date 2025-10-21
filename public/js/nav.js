document.addEventListener("DOMContentLoaded", () => {
    const activeLink = document.querySelector(".nav-center ul li a.active");
    const indicator = document.querySelector(".navbar-design-rect");
    const navCenter = document.querySelector(".nav-center");

    if (activeLink && indicator && navCenter) {
        // 1. Calculate relative positions
        const linkRect = activeLink.getBoundingClientRect();
        const navCenterRect = navCenter.getBoundingClientRect();

        // 2. Calculate the 'left' position relative to the .nav-center container
        // We use the active link's left edge and subtract the nav-center's left edge.
        const newLeft = linkRect.left - navCenterRect.left;

        // 3. Apply the styles to the indicator
        indicator.style.left = `${newLeft}px`;
        indicator.style.width = `${linkRect.width}px`;
        indicator.style.display = "block"; // Make it visible
    }
});

// Optional: Add a subtle transition when hovering over links (UX Improvement)
const links = document.querySelectorAll(".nav-center ul li a");
const indicator = document.querySelector(".navbar-design-rect");
const navCenter = document.querySelector(".nav-center");

// Function to calculate and apply position/width
const moveIndicator = (target) => {
    if (!target || !indicator || !navCenter) return;

    const linkRect = target.getBoundingClientRect();
    const navCenterRect = navCenter.getBoundingClientRect();
    const newLeft = linkRect.left - navCenterRect.left;

    indicator.style.left = `${newLeft}px`;
    indicator.style.width = `${linkRect.width}px`;
};

links.forEach((link) => {
    link.addEventListener("mouseenter", (e) => {
        moveIndicator(e.target);
        indicator.style.opacity = "0.7"; // Subtle hover effect
    });

    // Restore to active link position when hover leaves
    link.addEventListener("mouseleave", () => {
        const activeLink = document.querySelector(".nav-center ul li a.active");
        moveIndicator(activeLink);
        indicator.style.opacity = "1";
    });
});
