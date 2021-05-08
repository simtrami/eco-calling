/*
* Enable dark mode when it is enabled on the user's operating system or when they manually activate it.
* Tailwind turns on dark mode when it detects the 'dark' document scope, ie. when the <html> tag has the 'dark' class.
*/
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
    document.getElementById('dark').classList.add('hidden');
    document.getElementById('light').classList.remove('hidden');
} else {
    document.documentElement.classList.remove('dark')
    document.getElementById('dark').classList.remove('hidden');
    document.getElementById('light').classList.add('hidden');
}

window.toggleDarkMode = function () {
    if (localStorage.theme === 'dark') {
        localStorage.theme = 'light';
    } else {
        localStorage.theme = 'dark';
    }
    window.location.reload(false);
}

/*
* Because the nav is fixed on top of the page, using elt.scrollIntoView() to scroll to a section smoothly is not
* possible as an offset of the height of the nav must be added in order to look nice.
* https://stackoverflow.com/questions/49820013/javascript-scrollintoview-smooth-scroll-and-offset
*/
window.scrollToTargetAdjusted = function (targetId, offset) {
    // If unset, the offset is the height of the navbar.
    if (!offset) offset = document.getElementById('nav').clientHeight;
    const elementPosition = document.getElementById(targetId).offsetTop;
    const offsetPosition = elementPosition - offset;

    window.scrollTo({
        top: offsetPosition,
        behavior: "smooth"
    });
}
