// Header - responsive in-out
document.querySelector('.element-none').addEventListener("click", () => {
    toggleClass(document.querySelector('.header-responsive'), 'h-r-ngtv-pos', 'h-r-pstv-pos');
});

// Password - Hover or not
document.querySelectorAll(".hover-password").forEach((element) => {
    element.addEventListener("click", () => {
        if (element.name == "eye-outline") {
            element.name = "eye-off-outline";
            document.querySelector(".password-input").type="text"
        } else {
            element.name = "eye-outline";
            document.querySelector(".password-input").type="password"
        }
    });
});


