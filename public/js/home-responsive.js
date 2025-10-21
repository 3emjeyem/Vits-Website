window.addEventListener("DOMContentLoaded", () => {
    function makeResponsive() {
        const left = document.querySelector(".left");
        const right = document.querySelector(".right");
        const loginBox = document.querySelector(".login-box");
        const submitBtn = document.getElementById("submitBtn");
        const createAccount = document.querySelector(".create-account");
        const bottomLeftRow = document.querySelector(".bottom-left-row");
        const adminLink = document.querySelector(".admin-link");
        const otherLinks = document.querySelector(".other-links");

        if (window.innerWidth <= 900) {
            // Stack left and right vertically
            document.querySelector(".container").style.flexDirection = "column";
            left.style.width = "100%";
            left.style.height = "40vh";
            right.style.width = "100%";
            right.style.height = "60vh";
            loginBox.style.width = "90vw";
            submitBtn.style.width = "60vw";
            bottomLeftRow.style.left = "10px";
            bottomLeftRow.style.bottom = "10px";
            adminLink.style.left = "50%";
            adminLink.style.bottom = "10px";
            otherLinks.style.right = "10px";
            otherLinks.style.bottom = "10px";
        } else {
            // Side by side layout
            document.querySelector(".container").style.flexDirection = "row";
            left.style.width = "45%";
            left.style.height = "100vh";
            right.style.width = "55%";
            right.style.height = "100vh";
            loginBox.style.width = "320px";
            submitBtn.style.width = "25%";
            bottomLeftRow.style.left = "30px";
            bottomLeftRow.style.bottom = "30px";
            adminLink.style.left = "65%";
            adminLink.style.bottom = "35px";
            otherLinks.style.right = "30px";
            otherLinks.style.bottom = "40px";
        }
    }

    makeResponsive();
    window.addEventListener("resize", makeResponsive);
});
