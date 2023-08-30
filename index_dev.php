<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . "/cust_app/cash_flow/model/data_array_dev.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cash Flow</title>
    <script src="assets/js/cdn.tailwindcss.com_3.3.js"></script>
    <script src="assets/js/jQuery_v3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
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
    <table id="table" class="table-auto border-collapse border border-slate-600 ms-10 mt-10 shadow-md">
        <tr class="bg-slate-300/70">
            <th class="border border-slate-600 px-2" rowspan="2">Project</th>
            <th class="border border-slate-600 px-2" rowspan="2">Description</th>
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
    <table class="table-auto border-collapse border border-slate-600 ms-10 mt-10 shadow-md">
        <thead>
        <tr class="bg-slate-300/70">
            <th class="border border-slate-600" rowspan="2">Project</th>
            <th class="border border-slate-600" rowspan="2" colspan="2">Description</th>
            <th class="border border-slate-600" rowspan="2">Supplier</th>
            <th class="border border-slate-600" rowspan="2">Дата План</th>
            <th class="border border-slate-600" rowspan="2">Дата Факт</th>
            <th class="border border-slate-600">Тотал 2023</th>
            <th class="border border-slate-600" colspan="3">Месяц</th>

        </tr>
        <tr class="bg-slate-300/70">
            <th class="border border-slate-600">plan</th>
            <th class="border border-slate-600">план</th>
            <th class="border border-slate-600">факт</th>
            <th class="border border-slate-600">разница</th>
        </tr>
        <tr>
            <th class="border border-slate-600" colspan="4">Общий итог</th>
            <th class="border border-slate-600"></th>
            <th class="border border-slate-600"></th>
            <th class="border border-slate-600"></th>
            <th class="border border-slate-600"></th>
            <th class="border border-slate-600"></th>
            <th class="border border-slate-600"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="border border-slate-600" rowspan="2">Название проекта</td>
<!--            <td class="border border-slate-600 bg-green-600/60" rowspan="2"></td>-->
            <td class="border border-slate-600 bg-green-600/60" colspan="2">Поступления дс</td>
            <td class="border border-slate-600 bg-green-600/60"></td>
            <td class="border border-slate-600 bg-green-600/60"></td>
            <td class="border border-slate-600 bg-green-600/60"></td>
            <td class="border border-slate-600 bg-green-600/60"></td>
            <td class="border border-slate-600 bg-green-600/60"></td>
            <td class="border border-slate-600 bg-green-600/60"></td>
            <td class="border border-slate-600 bg-green-600/60"></td>
        </tr>
        <tr>
            <td class="bg-green-600/60 w-4"></td>
            <td class="border border-slate-600 bg-green-600/20">Поступления дс 100 000р</td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
        </tr>
        <tr>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600">TotalKCP01</td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
            <td class="border border-slate-600"></td>
        </tr>
        </tbody>
    </table>
</main>
</body>
<script type="module" src="assets/js/main.js"></script>
</html>