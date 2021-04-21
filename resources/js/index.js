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

//> Scroll to the form
window.scrollToForm = function () {
    scrollToTargetAdjusted('form');
    // Hide the error alert, displayed when the form has errors
    const errorAlert = document.getElementById('error-alert');
    if (errorAlert) errorAlert.style.display = 'none';
}
//< Scroll to the form
