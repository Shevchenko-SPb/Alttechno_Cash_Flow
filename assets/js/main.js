import Dom from "./dom.js";


const getDOM = (id) => document.getElementById(id);
const QUERY = (container, id) => container.querySelector(`[data-id="${id}"]`);

const domBtnShowFilters = getDOM(Dom.Button.SHOW_FILTERS);
const domBtnConfirmFilters = getDOM(Dom.Button.CONFIRM_FILTERS);
const domFiltersMenu = getDOM(Dom.Filters.FILTERS_MENU);
const domFilterDateStart = getDOM(Dom.Filters.FILTER_DATE_START);
const domFilterDateEnd = getDOM(Dom.Filters.FILTER_DATE_END);


const headers = {
    'Content-Type': 'application/json'
}

// const dataObj = JSON.parse(dataPhp);


// const DEAL_ID_407 = dataObj.DEALS.DEAL_ID_407;
// const DEAL_Name = dataObj.DEALS.DEAL_Name;
// const DEAL_Kontragent_NAME = dataObj.DEALS.ElList.DEAL_Kontragent_NAME
// const ElList_NAME = dataObj.DEALS.ElList.ElList_Params.ElList_NAME;
// const ElList_TITLE = dataObj.DEALS.ElList.ElList_Params.ElList_TITLE
// const Date_Plan_405 = dataObj.DEALS.ElList.ElList_Params.Date_Plan_405
// const Date_Fakt_410 = dataObj.DEALS.ElList.ElList_Params.Date_Fakt_410
// const Sum_Plan_522 = dataObj.DEALS.ElList.ElList_Params.Sum_Plan_522
// const ElList_ID = dataObj.DEALS.ElList.ElList_ID
// const DEAL_ID_Kontragent = dataObj.DEALS.ElList.DEAL_ID_Kontragent
// const Total_Sum_Plan = dataObj.Total_Sum_Plan


// console.log(dataObj);

let dealCount = "";



function renderProject (data) {
    const dataObj = data;
    const DEAL_ID_407 = dataObj.DEALS.DEAL_ID_407;
    const DEAL_Name = dataObj.DEALS.DEAL_Name;
    const Total_Sum_Plan = dataObj.Total_Sum_Plan
    let count = 0;
    let dealCheck
    let dealCheck2
    DEAL_ID_407.forEach((deal) => {
        if (deal !== dealCheck) {
            dealCheck = deal;
            let tr = $('<tr />');
            let td = $('<td class="border border-slate-600">');
            let a = $('<a />').text(DEAL_Name[count]);
            let url = "https://" + serverRoot + "/crm/deal/details/" + deal + "/";
            a.attr('href', url);
            a.attr('target', "_blank");
            td.addClass("bg-slate-100/90 w-12 hover:bg-slate-400/50");
            td.attr('data-id', deal);
            tr.attr('id', deal);
            td.append(a)
            tr.append(td);
            $(tr).addClass("row border border-slate-600 bg-slate-100/90");
            $("#table").append(tr);
        }

        addTitleDescription(deal, count, dataObj)
        if (deal !== dealCheck2 && deal !== DEAL_ID_407[count + 1]) {
            totalDealRow (deal, count, dataObj);
            dealCheck2 = deal;
        }
        count++
        console.log(DEAL_ID_407[count])
        if (!DEAL_ID_407[count]) {
            console.log("end")
            let tr = $('<tr />');
            let td = $('<td class="border border-slate-600 bg-slate-100/90">');
            let clone1 = td.clone();
            let clone2 = td.clone();
            let clone3 = td.clone();
            clone1.attr('colspan', 5)
            clone1.text("Общий итог")
            clone1.addClass("font-bold py-5 ps-2")
            clone2.addClass("font-bold")
            clone2.attr('data-id-totalSum', deal);
            clone2.text(Total_Sum_Plan)
            tr.addClass("row")
            tr.append(td);
            tr.append(clone1);
            tr.append(clone2);
            $("#table").append(tr);
        }
    })
}

function totalDealRow (deal, count, dataObj) {
    const DEAL_Name = dataObj.DEALS.DEAL_Name;
    let tr = $('<tr />');
    let td = $('<td class="border border-slate-600 bg-slate-100/90">');
    let clone1 = td.clone();
    let clone2 = td.clone();
    let clone3 = td.clone();
    clone1.attr('colspan', 5)
    clone1.text("Total: " + DEAL_Name[count])
    clone1.addClass("font-semibold py-3 ps-2")
    clone2.addClass("font-bold")
    clone2.attr('data-id-total', deal);
    clone2.text("$$$ Total")
    tr.addClass("row")
    tr.append(td);
    tr.append(clone1);
    tr.append(clone2);
    $("#table").append(tr);
}

function projectRowSpan (deal) {
    let trDeal = getDOM(deal)
    let tdProject = QUERY(trDeal, deal)
    let rowspan = Number(tdProject.getAttribute('rowspan')) + 1;
    tdProject.setAttribute('rowspan', rowspan)
}

function addTitleDescription (deal, count, dataObj) {
    const ElList_TITLE = dataObj.DEALS.ElList.ElList_Params.ElList_TITLE
    let trDeal = getDOM(deal)
    let td = document.createElement("td");
    td.setAttribute('class', "border border-slate-600 bg-green-300/50 font-semibold ps-1")
    td.innerText = ElList_TITLE[count]

   if (deal !== dealCount) {
       td.setAttribute('colspan', 2)
       trDeal.appendChild(td)
       cloneColumns (trDeal)
       projectRowSpan (deal)
       // trDeal.parentNode.append(tr)
       dealCount = deal;
   }

function cloneColumns (tr)
    {
        for (let n = 0; n < 7; n++) {
            let cloneTd = td.cloneNode(true);
            cloneTd.setAttribute('colspan', "")
            cloneTd.innerText = ""
            tr.appendChild(cloneTd)
        }
    }
    addContent (deal, count, dataObj)

}

function addContent (deal, count, dataObj) {
    const DEAL_Kontragent_NAME = dataObj.DEALS.ElList.DEAL_Kontragent_NAME
    const ElList_NAME = dataObj.DEALS.ElList.ElList_Params.ElList_NAME;
    const Date_Plan_405 = dataObj.DEALS.ElList.ElList_Params.Date_Plan_405
    const Date_Fakt_410 = dataObj.DEALS.ElList.ElList_Params.Date_Fakt_410
    const Sum_Plan_522 = dataObj.DEALS.ElList.ElList_Params.Sum_Plan_522
    const ElList_ID = dataObj.DEALS.ElList.ElList_ID
    const DEAL_ID_Kontragent = dataObj.DEALS.ElList.DEAL_ID_Kontragent

    let trDeal = getDOM(deal)
    let td = document.createElement("td");

    let tr = document.createElement("tr");
    tr.setAttribute("class", "row")
    let a = document.createElement("a");
    td.setAttribute('class', "border border-slate-600 bg-green-200/20 px-2")
    let clone1 = td.cloneNode(true)
    let clone2 = td.cloneNode(true)
    clone2.setAttribute('class','hover:bg-green-400/20 border border-slate-600 bg-green-200/20 px-2')
    let aClone2 = a.cloneNode(true)
    let clone3 = td.cloneNode(true)
    clone3.setAttribute('class','hover:bg-green-400/20 border border-slate-600 bg-green-200/20 px-2')
    let aClone3 = a.cloneNode(true)
    let clone4 = td.cloneNode(true)
    let clone5 = td.cloneNode(true)
    let clone6 = td.cloneNode(true)

    clone1.classList.add("bg-green-300/50","w-3")
    tr.append(clone1)

    aClone2.innerText = ElList_NAME[count] + " ( " + Sum_Plan_522[count] + " ) "
    let urlCol2 = "https://" + serverRoot + "/services/lists/48/element/0/" + ElList_ID[count] + "/";
    aClone2.setAttribute("href", urlCol2)
    aClone2.setAttribute('target', "_blank")
    clone2.append(aClone2)
    tr.append(clone2)


    aClone3.innerText = DEAL_Kontragent_NAME[count]
    let urlCol3 = "https://" + serverRoot + "/crm/company/details/" + DEAL_ID_Kontragent[count] + "/";
    aClone3.setAttribute("href", urlCol3)
    aClone3.setAttribute('target', "_blank")
    clone3.append(aClone3)
    tr.append(clone3)

    clone4.innerText = Date_Plan_405[count]
    tr.append(clone4)

    clone5.innerText = Date_Fakt_410[count]
    tr.append(clone5)

    tr.append(clone6)

    projectRowSpan (deal)
    trDeal.parentNode.append(tr)
}


domBtnShowFilters.onclick = () => {
    if (domFiltersMenu.classList.contains("hidden")) {
        domFiltersMenu.classList.remove("hidden")
    } else {
        domFiltersMenu.classList.add("hidden")
    }
};
function deleteTable () {
    let row = document.querySelectorAll('.row');
    for( let i = 0; i < row.length; i++ ){
        row[i].outerHTML = "";
    }
}
domBtnConfirmFilters.onclick = () => {
    deleteTable ()
    let dateStart = domFilterDateStart.value;
    let dateEnd = domFilterDateEnd.value;
    getDealsByDate(dateStart, dateEnd)
}


//---------- Запросы к БД ---------
function getDealsByDate(dateStart, dateEnd) {
    let $datePeriod;
    $datePeriod = [dateStart, dateEnd]
    console.log($datePeriod)
    axios.post('model/test.php',
        JSON.parse(JSON.stringify($datePeriod))
    )
        .then(function (response) {
            console.log(response.request.responseURL)
            console.log(response.data);
            renderProject (response.data)

        })
        .catch(function (error) {
            console.log(error);
        });
}