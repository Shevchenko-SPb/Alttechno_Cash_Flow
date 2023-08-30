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

const dataObj = JSON.parse(dataPhp);
const DEAL_ID_407 = dataObj.DEALS.DEAL_ID_407;
const DEAL_Name = dataObj.DEALS.DEAL_Name;
const DEAL_Kontragent_NAME = dataObj.DEALS.ElList.DEAL_Kontragent_NAME
const ElList_NAME = dataObj.DEALS.ElList.ElList_Params.ElList_NAME;
const ElList_TITLE = dataObj.DEALS.ElList.ElList_Params.ElList_TITLE
const Date_Plan_405 = dataObj.DEALS.ElList.ElList_Params.Date_Plan_405
const Date_Fakt_410 = dataObj.DEALS.ElList.ElList_Params.Date_Fakt_410
const Sum_Plan_522 = dataObj.DEALS.ElList.ElList_Params.Sum_Plan_522
const ElList_ID = dataObj.DEALS.ElList.ElList_ID
const DEAL_ID_Kontragent = dataObj.DEALS.ElList.ElList_ID


console.log(dataObj);

let dealCount = "";


renderProject ()
function renderProject () {
    let count = 0;
    let dealCheck
    DEAL_ID_407.forEach((deal) => {
        if (deal !== dealCheck) {
            dealCheck = deal;
            let tr = $('<tr />');
            let td = $('<td class="border border-slate-600">');
            let a = $('<a />').text(DEAL_Name[count]);
            let url = "https://" + serverRoot + "/crm/deal/details/" + deal + "/";
            a.attr('href', url);
            a.attr('target', "_blank");
            td.addClass("bg-slate-100/90 w-12");
            td.attr('data-id', deal);
            tr.attr('id', deal);
            td.append(a)
            tr.append(td);
            $(tr).addClass("border border-slate-600");
            $("#table").append(tr);
        }
        addTitleDescription(deal, count)
        count++
    })
}
function projectRowSpan (deal) {
    let trDeal = getDOM(deal)
    let tdProject = QUERY(trDeal, deal)
    let rowspan = Number(tdProject.getAttribute('rowspan')) + 1;
    tdProject.setAttribute('rowspan', rowspan)
}

function addTitleDescription (deal, count) {
    let trDeal = getDOM(deal)
    let td = document.createElement("td");
    td.setAttribute('class', "border border-slate-600 bg-green-300/50")


    td.innerText = ElList_TITLE[count]


   if (deal !== dealCount) {
       td.setAttribute('colspan', 2)
       trDeal.appendChild(td)
       cloneColumns (trDeal)
       projectRowSpan (deal)
       // trDeal.parentNode.append(tr)
       dealCount = deal;
   }
   // else {
   //     let tdClear = document.createElement("td");
   //     // tr.append(tdClear)
   //     tr.append(td)
   //     cloneColumns (tr)
   //     projectRowSpan (deal)
   //     trDeal.parentNode.append(tr)
   // }

function cloneColumns (tr)
    {
        for (let n = 0; n < 7; n++) {
            let cloneTd = td.cloneNode(true);
            cloneTd.setAttribute('colspan', "")
            cloneTd.innerText = ""
            tr.appendChild(cloneTd)
        }
    }
    addContent (deal, count)

}

function addContent (deal, count) {
    console.log(deal)
    let trDeal = getDOM(deal)
    let td = document.createElement("td");

    let tr = document.createElement("tr");
    let a = document.createElement("a");
    td.setAttribute('class', "border border-slate-600 bg-green-200/20")
    let clone1 = td.cloneNode(true)
    let clone2 = td.cloneNode(true)
    let aClone2 = a.cloneNode(true)
    let clone3 = td.cloneNode(true)
    let aClone3 = a.cloneNode(true)
    let clone4 = td.cloneNode(true)
    let clone5 = td.cloneNode(true)

    clone1.classList.add("bg-green-300/50","w-3")
    tr.append(clone1)

    aClone2.innerText = ElList_NAME[count] + " ( " + Sum_Plan_522[count] + " ) "
    let urlCol2 = "https://" + serverRoot + "/services/lists/48/element/0/" + ElList_ID[count] + "/";
    aClone2.setAttribute("href", urlCol2)
    aClone2.setAttribute('target', "_blank")
    clone2.append(aClone2)
    tr.append(clone2)


    aClone3.innerText = DEAL_Kontragent_NAME[count]
    let urlCol3 = "https://" + serverRoot + "/crm/deal/details/" + DEAL_ID_Kontragent[count] + "/";
    aClone3.setAttribute("href", urlCol3)
    aClone3.setAttribute('target', "_blank")
    clone3.append(aClone3)
    tr.append(clone3)

    clone4.innerText = Date_Plan_405[count]
    tr.append(clone4)

    clone5.innerText = Date_Fakt_410[count]
    tr.append(clone5)

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

domBtnConfirmFilters.onclick = () => {
    let dateStart = domFilterDateStart.value;
    let dateEnd = domFilterDateEnd.value;
    getDealsByDate(dateStart, dateEnd)
}



// jQuery.each(data, function(index, value) {
//     let value_split = value.split('||');
//     let tr = $('<tr />');
//
//     for(let i=0;i<value_split.length;i++){
//         let td = $('<td class="border border-slate-600">').text(value_split[i])
//         td.addClass("bg-slate-100/90");
//         tr.append(td);
//         $(tr).addClass("border border-slate-600");
//     }
//     $("#table").append(tr);
// });





//---------- Запросы к БД ---------
function getDealsByDate(dateStart, dateEnd) {
    let $datePeriod = [dateStart, dateEnd]
    console.log($datePeriod)
    axios.post('model/data_array.php', {
        date: {$datePeriod} }
    )
        .then(function (response) {
            console.log(response.request.responseURL)
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}