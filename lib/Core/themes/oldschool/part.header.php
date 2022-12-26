<!doctype html>
<html lang="<?= $userlang ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caudex&display=swap');

        * {
            font-family: 'Caudex', serif;
        }
    </style>

    <script>
        function toggleVisible(id) {
            let div = document.getElementById(id);
            if (div.classList.contains("bg-slate-400")) {
                div.classList.remove("bg-slate-400");
            } else {
                div.classList.add("bg-slate-400");
            }
        }
    </script>