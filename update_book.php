<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

include "./components/_dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['book_id'])) {
    // Validate and sanitize the book ID
    $book_id = intval($_GET['book_id']);

    // Fetch the current book details
    $sql_book = "SELECT * FROM `books` WHERE `id` = ? AND `owner_phone` = ?";
    $stmt = $conn->prepare($sql_book);
    $stmt->bind_param("is", $book_id, $_SESSION['phone']);
    $stmt->execute();
    $result_book = $stmt->get_result();

    if ($result_book->num_rows > 0) {
        $book = $result_book->fetch_assoc();
    } else {
        echo "Book not found.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id'])) {
    // Handle the update
    $book_id = intval($_POST['book_id']);
    $name = $_POST['name'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $published_year = $_POST['published_year'];
    $edition = $_POST['edition'];
    $location = $_POST['location'];

    // Update the book details
    $sql_update = "UPDATE `books` SET `name` = ?, `author` = ?, `category` = ?, `published_year` = ?, `edition` = ?, `location` = ? WHERE `id` = ? AND `owner_phone` = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("ssssisss", $name, $author, $category, $published_year, $edition, $location, $book_id, $_SESSION['phone']);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <!-- tailwindcss and flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include './components/header.php';
    ?>

    <div class="p-5 bg-cover bg-center h-screen" style="background-image: url('./components/dashboard_back.png'); ">
        <section class=" p-6 ">
            <h2 class="text-3xl leading-9 tracking-tight text-center my-4 sm:text-4xl sm:leading-10 text-[#cac7bd] p-4">
                UPDATE BOOK DETAILS
            </h2>
            <div class="relative overflow-x-auto w-2/3 mx-auto">
                <form method="POST" action="update_book.php">
                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>" />
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-[#cac7bd]">Book Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $book['name']; ?>" class="mt-1 block w-full bg-[#191919] text-[#cac7bd] border-[#cac7bd] rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="author" class="block text-sm font-medium text-white">Author</label>
                        <input type="text" id="author" name="author" value="<?php echo $book['author']; ?>" class="mt-1 block w-full bg-[#191919] text-[#cac7bd] border-[#cac7bd] rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-[#cac7bd]">Category</label>
                        <input type="text" id="category" name="category" value="<?php echo $book['category']; ?>" class="mt-1 block w-full bg-[#191919] text-[#cac7bd] border-[#cac7bd] rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="published_year" class="block text-sm font-medium text-[#cac7bd]">Published Year</label>
                        <input type="number" id="published_year" name="published_year" value="<?php echo $book['published_year']; ?>" class="mt-1 block w-full bg-[#191919] text-[#cac7bd] border-[#cac7bd] rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="edition" class="block text-sm font-medium text-[#cac7bd]">Edition</label>
                        <input type="text" id="edition" name="edition" value="<?php echo $book['edition']; ?>" class="mt-1 block w-full bg-[#191919] text-[#cac7bd] border-[#cac7bd] rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-[#cac7bd]">Location</label>
                        <input type="text" id="location" name="location" value="<?php echo $book['location']; ?>" class="mt-1 block w-full bg-[#191919] text-[#cac7bd] border-[#cac7bd] rounded-md shadow-sm">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5">Update Book</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <?php
    include './components/footer.php';
    ?>

</body>
</html>
