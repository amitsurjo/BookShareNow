<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwindcss and flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <title>Add Book</title>
</head>

<body class="bg-[#191919]">
    <?php
    include './components/header.php';
    include "./components/_dbconnect.php";

    // Fetch logged-in user's information from the "users" table
    $phone = $_SESSION['phone'];
    $sql_user = "SELECT * FROM `users` WHERE `phone`= '$phone'";
    $result_user = $conn->query($sql_user);
    $user = $result_user->fetch_assoc();

    // Handle form submission
    $showAlert = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $published_year = mysqli_real_escape_string($conn, $_POST['published_year']);
        $edition = mysqli_real_escape_string($conn, $_POST['edition']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);

        // Insert data into the "books" table
        $sql_insert = "INSERT INTO `books`(`name`, `author`, `published_year`, `edition`, `owner_name`, `owner_phone`, `location`, `availability`, `category`) VALUES ('$name', '$author', '$published_year', '$edition', '{$user['name']}', '{$user['phone']}', '$location', 1, '$category')";
        if ($conn->query($sql_insert) === TRUE) {
            $showAlert = true;
        } else {
            $showError = true;
        }
    }
    ?>

    <!-- <div class="bg-[#cac7bd] text-[#191919] py-2 px-4 text-right">
        <p>Logged in as: <?php echo htmlspecialchars($user['name']); ?></p>
        <p>Phone: <?php echo htmlspecialchars($user['phone']); ?></p>
    </div> -->

    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success" role="alert">Book added successfully!</div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger" role="alert">There was an error adding the book.</div>';
    }
    ?>

    <div class="bg-[#191919] py-8">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold text-[#cac7bd] mb-4 text-center">Add a New Book</h1>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="max-w-md mx-auto border-2 border-[#cac7bd] text-[#cac7bd] bg-[#191919] shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label for="name" class="block text-[#cac7bd] font-bold mb-2">Book Name:</label>
                    <input type="text" id="name" name="name" class="border border-[#cac7bd] text-[#191919] bg-[#cac7bd] focus:ring-[#cac7bd] focus:border-[#cac7bd] rounded-lg py-2 px-4 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="author" class="block text-[#cac7bd] font-bold mb-2">Author:</label>
                    <input type="text" id="author" name="author" class="border border-[#cac7bd] text-[#191919] bg-[#cac7bd] focus:ring-[#cac7bd] focus:border-[#cac7bd] rounded-lg py-2 px-4 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="published_year" class="block text-[#cac7bd] font-bold mb-2">Published Year:</label>
                    <input type="number" id="published_year" name="published_year" class="border border-[#cac7bd] text-[#191919] bg-[#cac7bd] focus:ring-[#cac7bd] focus:border-[#cac7bd] rounded-lg py-2 px-4 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="edition" class="block text-[#cac7bd] font-bold mb-2">Edition:</label>
                    <input type="text" id="edition" name="edition" class="border border-[#cac7bd] text-[#191919] bg-[#cac7bd] focus:ring-[#cac7bd] focus:border-[#cac7bd] rounded-lg py-2 px-4 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-[#cac7bd] font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" class="border border-[#cac7bd] text-[#191919] bg-[#cac7bd] focus:ring-[#cac7bd] focus:border-[#cac7bd] rounded-lg py-2 px-4 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-[#cac7bd] font-bold mb-2">Category:</label>
                    <select id="category" name="category" class="border border-[#cac7bd] text-[#191919] bg-[#cac7bd] focus:ring-[#cac7bd] focus:border-[#cac7bd] rounded-lg py-2 px-4 w-full" required>
                        <option value="">Select a category</option>
                        <optgroup label="Fiction">
                            <option value="Romance">Romance</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Thriller">Thriller</option>
                            <option value="Science Fiction">Science Fiction</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Horror">Horror</option>
                            <option value="Historical Fiction">Historical Fiction</option>
                            <option value="Contemporary Fiction">Contemporary Fiction</option>
                            <option value="Literary Fiction">Literary Fiction</option>
                        </optgroup>
                    </select>
                </div>

                <button type="submit" class="border-2 border-[#cac7bd] text-[#cac7bd] hover:text-[#191919] hover:bg-[#cac7bd] font-bold py-2 px-4 rounded w-full">Add Book</button>
            </form>
        </div>
    </div>
    <?php
    include './components/footer.php';
    ?>
</body>

</html>
