function verifName() {

    var name = document.addCategoryForm.name.value;
    var errorName = document.getElementById('errorName');

    if (!isNaN(name) || name.length == 0) {
        if (errorName.classList.contains('d-none')) {
            errorName.classList.remove('d-none');
        }
        return false;
    }

    return true;
}