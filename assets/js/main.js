import Dom from "./dom.js";


const getDOM = (id) => document.getElementById(id);
const QUERY = (container, id) => container.querySelector(`[data-id="${id}"]`);

const domBtnShowFilters = getDOM(Dom.Button.SHOW_FILTERS);
const domBtnConfirmFilters = getDOM(Dom.Button.CONFIRM_FILTERS);
const domFiltersMenu = getDOM(Dom.Filters.FILTERS_MENU);
const domFilterDateStart = getDOM(Dom.Filters.FILTER_DATE_START);
const domFilterDateEnd = getDOM(Dom.Filters.FILTER_DATE_END);


domBtnShowFilters.onclick = () => {
    if (domFiltersMenu.classList.contains("hidden")) {
        domFiltersMenu.classList.remove("hidden")
    } else {
        domFiltersMenu.classList.add("hidden")
    }
};

domBtnConfirmFilters.onclick = () => {
    let dateStart = domFilterDateStart.value;
    let dateEnd = domFilterDateEnd.value;
    getDealsByDate(dateStart, dateEnd)
}





//---------- Запросы к БД ---------
function getDealsByDate(dateStart, dateEnd) {
    let $datePeriod = [dateStart, dateEnd]
    console.log($datePeriod)

    axios.post('/getDealsByDate',
        JSON.parse(JSON.stringify($datePeriod))
    )
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}