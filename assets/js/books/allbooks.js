function myFunction() {

    var btndark = document.getElementById('btndarkmode');
    var icon = document.getElementById('icon');
    var btnadd = document.getElementById('btnadd');

    if (btndark.classList.contains('btn-dark')) {
        btndark.classList.remove('btn-dark');
        icon.classList.remove('fa-moon');
        btnadd.classList.remove('btn-primary');

        btndark.classList.add('btn-light');
        icon.classList.add('fa-sun');
        btnadd.classList.add('btn-light');
    } else {
        btndark.classList.add('btn-dark');
        icon.classList.add('fa-moon');
        btnadd.classList.add('btn-primary');


        btndark.classList.remove('btn-light');
        icon.classList.remove('fa-sun');
        btnadd.classList.remove('btn-light');

    }

    document.body.classList.toggle("dark-mode");
    document.getElementById('books').classList.toggle("table-dark");

}