document.addEventListener("DOMContentLoaded", (e) =>{
    const php_req = new XMLHttpRequest();
    const php_file = 'http://localhost/info2180-lab5/world.php';
    var searchButton = document.getElementById('lookup');
    var searchButton1 = document.getElementById('cityLookup');
    var searchBar = document.getElementById('country');
    var result = document.getElementById('result');

    function fetchReq(txt, option){
        fetch(php_file + "?country=" + encodeURIComponent(txt) + "&lookup=" + encodeURIComponent(option)).then(
            response => response.text())
            .then(data => {

                result.innerHTML = data;

            }).catch(error =>{
                alert(error)
            });
    }

    searchButton1.addEventListener('click', (e) =>{
        txt = searchBar.value.trim();
        fetchReq(txt,'cities');
    });

    searchButton.addEventListener('click', (e) =>{
        txt = searchBar.value.trim();
        fetchReq(txt,'');
    });

});