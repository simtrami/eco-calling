// Scroll into view to the manifesto

const goToManifestoBtn = document.getElementById('go-to-manifesto-btn');
const manifestoAnchor = document.getElementById('manifesto-anchor');

goToManifestoBtn.addEventListener('click', function () {
    manifestoAnchor.scrollIntoView({behavior: 'smooth', block: "center"});
})
