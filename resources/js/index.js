//> Scroll to the form
window.scrollToForm = function () {
    scrollToTargetAdjusted('form');
    // Hide the error alert, displayed when the form has errors
    const errorAlert = document.getElementById('error-alert');
    if (errorAlert) errorAlert.style.display = 'none';
}
//< Scroll to the form
