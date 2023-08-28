import Dom from "./dom.js";
const headers = {
    'Content-Type': 'application/json'
}


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
    let dateFrom = domFilterDateStart.value;
    let dateTo = domFilterDateEnd.value;
    getDealsByDate(dateFrom, dateTo)
}





//---------- Запросы к БД ---------
function getDealsByDate(dateFrom, dateTo) {
    let $datePeriod = [dateFrom, dateTo]
    console.log($datePeriod)

    axios.get('/getlist', {
        params: {
            date: $datePeriod
        },
        headers: headers
    })
        .then(function (response) {
            console.log(response.request.responseURL)
            console.log( response.data.result)
        })
        .catch(function (error) {
        })
        .finally(function () {
        })

    // axios.get('/getlist',
    //     JSON.parse(JSON.stringify($datePeriod))
    // )
    //     .then(function (response) {
    //         console.log(response);
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
}

