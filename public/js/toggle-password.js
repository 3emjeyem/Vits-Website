// toggle-password.js
// Reusable function: call togglePassword(element) where element is the eye span/button
function togglePassword(toggleElement) {
    try {
        // The toggleElement should have a data-target attribute with the selector of the input
        var targetSelector = toggleElement.getAttribute("data-target");
        if (!targetSelector) return;
        var input = document.querySelector(targetSelector);
        if (!input) return;

        if (input.type === "password") {
            input.type = "text";
            // change icon or text
            toggleElement.textContent = "🙈";
        } else {
            input.type = "password";
            toggleElement.textContent = "👁";
        }
    } catch (e) {
        console.error("togglePassword error", e);
    }
}

// Auto-wire any element with .toggle-password and data-target on DOMContentLoaded
document.addEventListener("DOMContentLoaded", function () {
    var toggles = document.querySelectorAll(".toggle-password");
    toggles.forEach(function (el) {
        el.addEventListener("click", function (e) {
            e.preventDefault();
            togglePassword(el);
        });
    });
});
