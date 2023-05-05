


function loadPage(page) {
    fetch('/pages/' + page + '.html')
        .then(response => response.text())
        .then(html => {
            document.getElementById('content').innerHTML = html;
            history.pushState({}, '', '/' + page);
        });
}

window.addEventListener('popstate', function(event) {
    loadPage(location.pathname.split('/').pop().replace('.html', ''));
});

document.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', event => {
        event.preventDefault();
        loadPage(a.getAttribute('href').replace('/', '').replace('.html', ''));
    });
});

loadPage(location.pathname.split('/').pop().replace('.html', '') || 'home');