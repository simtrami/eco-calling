//> Toggle nav (viewport <= sm)
const navToggler = document.getElementById('nav-toggler');
const navCollapse = document.getElementById('nav-collapse');

const toggleNavCollapse = function () {
    if (navCollapse.style.maxHeight) {
        navCollapse.style.maxHeight = null;
    } else {
        navCollapse.style.maxHeight = navCollapse.scrollHeight + "px";
    }
};

navToggler.addEventListener('click', function () {
    toggleNavCollapse();
});
//< Toggle nav (viewport <= sm)
