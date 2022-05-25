var form = new FormData(document.getElementById('form'));
var url = new URL(document.getElementById('form').getAttribute('action') || window.location.href)
var rep = fetch(url, {
    method: "POST",
    headers: {
        'X-Requested-With': 'XMLHttpRequest'
    },
    body: form
})

document.getElementById("dismiss").addEventListener("click", function () {
    document.getElementById("banner").style.display="none";
} )