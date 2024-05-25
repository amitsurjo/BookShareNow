<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- tailwindcss and flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


</head>

<body class="bg-[#191919]">
    <?php
    include './components/header.php';
    ?>

    <div class="flex items-center justify-center h-screen bg-[#191919]">
        <img class="h-screen" src="./components/bg.png" alt="">
    </div>

    <section class="bg-[#191919] py-20">
        <div class="max-w-screen-md mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-6 text-[#CAC7BD]">Welcome to Our Website</h1>
            <p class="text-[#CAC7BD] text-center mb-8">
            </p>
            <div class="flex justify-center">
                <button class="bg-[#CAC7BD] hover:bg-[#b3aea0] text-[#191919] font-bold py-2 px-4 rounded" onclick="window.location.href = 'signup.php'">
                    Get Started
                </button>
            </div>
        </div>
    </section>



    <?php
    include './components/footer.php';
    ?>

</body>

</html>