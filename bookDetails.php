<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <!-- tailwindcss and flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-[#191919]">

    <?php
    include './components/header.php';
    ?>

    <!-- book details -->
    <?php
    include "./components/_dbconnect.php";

    // Fetch book details based on the id parameter
    $id = $_GET['id'];
    $sql_book = "SELECT * FROM books WHERE id = $id";
    $result_book = $conn->query($sql_book);
    $book = $result_book->fetch_assoc();
    ?>

    <div class="bg-[#191919] py-8 h-screen">
        <div class="container mx-auto">
            <div class="flex items-start">
                <!-- Book image -->
                <div class="w-1/2 pr-8">
                    <img src="" class="rounded-lg shadow-md">
                </div>

                <!-- Book details -->
                <div class="w-1/2">
                    <h1 class="text-[#cac7bd] text-2xl font-bold mb-4"><?php echo $book['name']; ?></h1>
                    <p class="text-[#cac7bd] mb-2">Author: <?php echo $book['author']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Edition: <?php echo $book['edition']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Published: <?php echo $book['published_year']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Owner: <?php echo $book['owner_name']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Location: <?php echo $book['location']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Phone Number: <?php echo $book['owner_phone']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Availability: <?php echo $book['availability'] ? 'Available' : 'Not Available'; ?></p>

                    <!-- Buttons -->
                    <div class="mt-4">
                        <a href="books.php" class="border border-[#cac7bd] hover:bg-[#cac7bd] hover:text-[#191919]  text-[#cac7bd] font-bold py-2 px-4 rounded mr-2">Back</a>
                        <a href="sendRequest.php?id=<?php echo $book['id']; ?>" class="border border-[#cac7bd] hover:bg-[#cac7bd] hover:text-[#191919]  text-[#cac7bd]  font-bold py-2 px-4 rounded">Get Book</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $conn->close();
    ?>

    <!-- book details ENDS-->
    <?php
    include './components/footer.php';
    ?>

</body>

</html>
