<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . "/cust_app/cash_flow/model/data_array.php");
$arData = new dataArray();
$a = $arData->getDataArray();
$domain = $_SERVER['SERVER_NAME'];


//echo '<pre>';
//print_r($a);
//echo '</pre>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cash Flow</title>
    <script src="assets/js/cdn.tailwindcss.com_3.3.js"></script>
    <script src="assets/js/jQuery_v3.7.1.js"></script>
    <script src="assets/js/axios_v1.1.2.js"></script>
    <style>
    </style>
</head>
<body class="bg-amber-50/60">
<header class="ms-10 mt-10">
<div class="font-bold text-3xl px-2 py-3">Cash Flow</div>
    <div>
        <button id="btnShowFilters" class="border border-slate-600 rounded-md px-2 active:bg-black/20">Filters</button>
    <div id="filtersMenu" class="hidden" >Фильтр по дате Начало: <input id="startDate" type="date" />
        Конец: <input id="endDate" type="date" />
        <button id="btnConfirmFilter" class="border border-slate-600 rounded-md px-2 active:bg-black/20">Применить</button>
    </div>
</header>
<main>
    <table id="table" class="table-auto border-collapse border border-slate-600 ms-10 mt-10 mb-10 shadow-md">
        <tr class="bg-slate-300/70">
            <th class="border border-slate-600 px-2" rowspan="2">Project</th>
            <th class="border border-slate-600 px-2" rowspan="2" colspan="2">Description</th>
            <th class="border border-slate-600 px-2" rowspan="2">Supplier</th>
            <th class="border border-slate-600 px-2" rowspan="2">Дата План</th>
            <th class="border border-slate-600 px-2" rowspan="2">Дата Факт</th>
            <th class="border border-slate-600 px-2">Тотал 2023</th>
            <th class="border border-slate-600 px-2" colspan="3">Месяц</th>
        </tr>
        <tr class="bg-slate-300/70">
            <th class="border border-slate-600 px-2">plan</th>
            <th class="border border-slate-600 px-2">план</th>
            <th class="border border-slate-600 px-2">факт</th>
            <th class="border border-slate-600 px-2">разница</th>
        </tr>
    </table>
</main>
</body>
<script>
    let dataPhp = '<?=$a ?>'
    let serverRoot = '<?=$domain ?>'
</script>
<script type="module" src="assets/js/main.js"></script>
</html>
