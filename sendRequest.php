<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

include "./components/_dbconnect.php";

// Fetch book details based on the id parameter
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql_book = "SELECT b.*, u.phone AS owner_phone FROM books b JOIN users u ON b.owner_phone = u.phone WHERE b.id = ?";
    $stmt = $conn->prepare($sql_book);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result_book = $stmt->get_result();

    if ($result_book->num_rows > 0) {
        $book = $result_book->fetch_assoc();
    } else {
        echo "Book not found.";
        exit;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner's Contact Information</title>
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

    <div class="bg-[#191919] py-8 h-screen">
        <div class="container mx-auto">
            <div class="flex items-start">
                <!-- Book details -->
                <div class="w-full">
                    <h1 class="text-[#cac7bd] text-2xl font-bold mb-4">Book Details</h1>
                    <p class="text-[#cac7bd] mb-2">Book Name: <?php echo $book['name']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Author: <?php echo $book['author']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Edition: <?php echo $book['edition']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Published Year: <?php echo $book['published_year']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Location: <?php echo $book['location']; ?></p>
                    <p class="text-[#cac7bd] mb-2">Availability: <?php echo $book['availability'] ? 'Available' : 'Not Available'; ?></p>
                    <p class="text-[#cac7bd] mb-2">Owner Phone: <?php echo $book['owner_phone']; ?></p>

                    <!-- Back button -->
                    <div class="mt-4">
                        <a href="books.php" class="border border-[#cac7bd] hover:bg-[#cac7bd] hover:text-[#191919] text-[#cac7bd] font-bold py-2 px-4 rounded mr-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './components/footer.php';
    ?>

</body>

</html>
