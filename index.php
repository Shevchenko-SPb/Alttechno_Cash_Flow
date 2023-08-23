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
    <div class="container">
        <div class="flex flex-col bg-amber-200">
            <div class="flex flex-row">
                <div>Project</div>
                <div>Description</div>
                <div>Supplier</div>
                <div>Дата план</div>
                <div>Дата факт</div>
                <div class="flex flex-col">
                    <div>Total for 2022</div>
                    <div>plan</div>
                </div>
                <div></div>
            </div>
            <div class="flex flex-row">
                <div>Название</div>
                <div class="flex flex-col">
                    <div>Название поступления</div>
                    <div class="flex flex-row">
                        <div>Название поступления</div>
                        <div>0</div>
                        <div>0</div>
                        <div>0</div>
                        <div>0</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row bg-amber-400">2</div>
    </div>
</main>
</body>
<script src="assets/js/main.js"></script>
</html>