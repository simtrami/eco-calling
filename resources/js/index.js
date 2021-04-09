//> Scroll into view to the manifesto

const goToManifestoBtn = document.getElementById('go-to-manifesto-btn');

goToManifestoBtn.addEventListener('click', function () {
    goToManifestoBtn.scrollIntoView({behavior: 'smooth', block: "start"});
})

//< Scroll into view to the manifesto
