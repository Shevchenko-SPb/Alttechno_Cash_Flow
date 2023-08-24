const btnFilters = document.getElementById('filters');
btnFilters.onclick = () => {
    if (document.getElementById('FiltersMenu').classList.contains("hidden")) {
        document.getElementById('FiltersMenu').classList.remove("hidden")
    } else {
        document.getElementById('FiltersMenu').classList.add("hidden")
    }
};