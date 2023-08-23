<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cash Flow</title>
    <script src="assets/js/cdn.tailwindcss.com_3.3.js"></script>
    <style>
        div {
            border: black;
            border-style: solid;
            border-width: 1px;

        }
        .container {
            display: grid;
        }
    </style>
</head>
<body class="bg-amber-50">
<header class="bg-amber-400">
    <span class="font-bold text-2xl text-blue-300">Cash Flow</span>
    <div>
        <button id="test"> Test</button>
    </div>
</header>
<main>
    

    <table class="table-auto border-collapse border border-slate-400 ms-10 mt-10">
        <thead>
        <tr>
            <th class="border border-slate-300" rowspan="2">Project</th>
            <th class="border border-slate-300" rowspan="2" colspan="2">Description</th>
            <th class="border border-slate-300" rowspan="2">Supplier</th>
            <th class="border border-slate-300" rowspan="2">Дата План</th>
            <th class="border border-slate-300" rowspan="2">Дата Факт</th>
            <th class="border border-slate-300">Тотал 2023</th>
            <th class="border border-slate-300" colspan="3">Месяц</th>

        </tr>
        <tr>
            <th class="border border-slate-300">plan</th>
            <th class="border border-slate-300">план</th>
            <th class="border border-slate-300">факт</th>
            <th class="border border-slate-300">разница</th>
        </tr>
        <tr>
            <th class="border border-slate-300" colspan="4">Общий итог</th>
            <th class="border border-slate-300"></th>
            <th class="border border-slate-300"></th>
            <th class="border border-slate-300"></th>
            <th class="border border-slate-300"></th>
            <th class="border border-slate-300"></th>
            <th class="border border-slate-300"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="border border-slate-300" rowspan="3">Название проекта</td>
<!--            <td class="border border-slate-300 bg-green-600/60" rowspan="2"></td>-->
            <td class="border border-slate-300 bg-green-600/60" colspan="2">Поступления дс</td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
        </tr>
        <tr>
            <td class="border border-slate-300 bg-green-600/20"></td>
            <td class="border border-slate-300">Поступления дс 100 000р</td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
            <td class="border border-slate-300"></td>
        </tr>
        <tr>
            <td class="border border-slate-300">Shining Star</td>
            <td class="border border-slate-300">Earth, Wind, and Fire</td>
            <td class="border border-slate-300">1975</td>
        </tr>
        </tbody>
    </table>
</main>
</body>
<script src="assets/js/main.js"></script>
</html>