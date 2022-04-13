//> Scroll to the form
window.scrollToForm = async function () {
    scrollToTargetAdjusted('form');
    // Hide the error alert, displayed when the form has errors
    const errorAlert = document.getElementById('error-alert');
    if (errorAlert) {
        errorAlert.style.opacity = '0%';
        errorAlert.classList += ' -translate-y-2';
        await new Promise(r => setTimeout(r, 150));
        errorAlert.style.display = 'none';
    }
}
//< Scroll to the form
