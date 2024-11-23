document.addEventListener("DOMContentLoaded", (e) =>{
    const php_req = new XMLHttpRequest();
    const php_file = 'http://localhost/info2180-lab5/world.php';
    var searchButton = document.getElementById('lookup');
    var searchBar = document.getElementById('country');
    var result = document.getElementById('result');

    function fetchReq(txt){
        fetch(php_file + "?country=" + encodeURIComponent(txt)).then(
            response => response.text())
            .then(data => {

                result.innerHTML = data;

            }).catch(error =>{
                alert(error)
            });
    }

    searchButton.addEventListener('click', (e) =>{
        txt = searchBar.value.trim();
        fetchReq(txt);
    });

});