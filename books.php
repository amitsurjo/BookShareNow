<?php
session_start();
if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) != true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link rel="stylesheet" href="styles.css">
    <!-- tailwindcss and flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</head>

<body class="bg-[#191919]">
    <?php
    include './components/header.php';
    ?>
    <header class="bg-[#191919] text-[#cac7bd] text-center py-4">
        <h1 class="text-2xl font-bold">My Header</h1>
    </header>

    <!-- fetch data to create the page -->
    <?php
    include "./components/_dbconnect.php";

    // Search functionality
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $sql_books = "SELECT * FROM books WHERE name LIKE '%$search%'";
    } else {
        $sql_books = "SELECT * FROM books";
    }

    $result_books = $conn->query($sql_books);
    $books_by_category = array();

    // Group books by category
    if ($result_books->num_rows > 0) {
        while ($row = $result_books->fetch_assoc()) {
            $category = $row["category"];
            $books_by_category[$category][] = $row;
        }
    }

    // Calculate total number of categories and total number of books
    $total_categories = count($books_by_category);
    $total_books = $result_books->num_rows;
    ?>

    <!-- Header displaying total categories and total books -->
    <div class="flex items-center justify-between bg-[#191919]  p-4 mb-4">
        <h2 class="text-xl font-bold text-[#cac7bd]">Total Categories: <?php echo $total_categories; ?> | Total Books: <?php echo $total_books; ?></h2>
        <form method="post" action="" class="flex">
            <input type="text" name="search" placeholder="Search by book name" class="mr-2">
            <button type="submit" class="border-2 border-[#cac7bd] hover:bg-[#cac7bd] hover:text-[#191919] text-[#cac7bd] font-bold py-2 px-4 rounded">Search</button>
        </form>
    </div>

    <?php
    foreach ($books_by_category as $category => $books) {
    ?>
        <div class="bg-[#191919] p-4 mb-4">
            <h2 class="text-xl font-bold text-[#CAC7BD] "><?php echo $category; ?></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            <?php
            foreach ($books as $book) {
            ?>
                <div class="bg-[#191919] rounded-lg shadow-md overflow-hidden m-4 text-[#cac7bd] border-l border-[#cac7bd]">
                    <div class="bg-[#<?php echo substr(md5($book["category"]), 0, 6); ?>] py-2 px-4 text-[#191919] font-bold">
                        <?php echo $book["category"]; ?>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2"><?php echo $book["name"]; ?></h3>
                        <p class="text-[#cac7bd] mb-2">Edition: <?php echo $book["edition"]; ?></p>
                        <p class="text-[#cac7bd] mb-2">Published: <?php echo $book["published_year"]; ?></p>
                        <p class="text-[#cac7bd] mb-2">Owner: <?php echo $book["owner_name"]; ?></p>
                        <p class="text-[#cac7bd] mb-2">Location: <?php echo $book["location"]; ?></p>
                        <a href="bookDetails.php?id=<?php echo $book["id"]; ?>" class=" border border-[#cac7bd] hover:bg-[#cac7bd] text-[#cac7bd] hover:text-[#191919] font-bold py-2 px-4 rounded mt-2 inline-block">Get Book</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    $conn->close();
    ?>
    <!-- end fetch data to create the page -->


    <?php
    include './components/footer.php';
    ?>
</body>

</html>