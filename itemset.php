<?php
include './includes/sidebar.php';
include './includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="filter item">
        <input type="search" id="search" class="search">

        <ul id="list">
            <li>Maharastra</li>
            <li>Sikkim</li>
            <li>Andhra Pradesh</li>
        </ul>
    </div>


    <script>
        const onSearch = () => {
            const input = document.querySelector("#search");
            const filter = input.toUpperCase();

            const list = document.querySelectorAll("#list li");

            list.foreach((el) => {
                const text = el.textContent.toUpperCase();

                el.style.display = text.includes(filter) ? "": "none";
            });
        };
</script>
</body>
</html>