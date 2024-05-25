<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- tailwindcss and flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include './components/header.php';
    include "./components/_dbconnect.php";

    // Fetch logged-in user's information from the "users" table
    $phone = $_SESSION['phone'];
    $sql_user = "SELECT * FROM `users` WHERE `phone`= '$phone'";
    $result_user = $conn->query($sql_user);
    $user = $result_user->fetch_assoc();

    // Fetch books contributed by the logged-in user
    $sql_books = "SELECT * FROM `books` WHERE `owner_phone` = '$phone'";
    $result_books = $conn->query($sql_books);
    ?>

    <div class="p-5 bg-cover bg-center h-screen" style="background-image: url('./components/dashboard_back.png'); ">
        <section class=" p-6 ">
            <!-- header for the table  -->
            <h2 class="text-3xl leading-9  tracking-tight text-center my-4 sm:text-4xl sm:leading-10 text-white p-4">
                YOUR CONTRIBUTION TO THE COMMUNITY
            </h2>
            <div class="relative overflow-x-auto w-2/3 mx-auto">
                <table class="w-full text-sm text-left rtl:text-right text-[#cac7bd] rounded-lg border-2 border-[#cac7bd]">
                    <thead class="text-xs  bg-[#191919] uppercase   text-[#cac7bd]">
                        <tr class="bg-[#191919]">
                            <th scope="col" class="px-6 py-3 bg-[#191919]">
                                Book name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Published Year
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Edition
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result_books->num_rows > 0) {
                            while($row = $result_books->fetch_assoc()) {
                                echo "<tr class='border-b border-[#cac7bd]'>";
                                echo "<th scope='row' class='px-6 py-4 font-medium text-white whitespace-nowrap'>{$row['name']}</th>";
                                echo "<td class='px-6 py-4 text-white text-lg'>{$row['author']}</td>";
                                echo "<td class='px-6 py-4 text-white text-lg'>{$row['category']}</td>";
                                echo "<td class='px-6 py-4 text-white text-lg'>{$row['published_year']}</td>";
                                echo "<td class='px-6 py-4 text-white text-lg'>{$row['edition']}</td>";
                                echo "<td class='px-6 py-4 text-white text-lg'>{$row['location']}</td>";
                                echo "<td class='px-6 py-4 text-white text-lg'>";
                                echo "<form method='POST' action='delete_book.php' style='display:inline;'>";
                                echo "<input type='hidden' name='book_id' value='{$row['id']}' />";
                                echo "<button type='submit' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded'>Delete</button>";
                                echo "</form>";
                                echo "<form method='GET' action='update_book.php' style='display:inline; margin-left: 10px;'>";
                                echo "<input type='hidden' name='book_id' value='{$row['id']}' />";
                                echo "<button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded'>Update</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr class='border-b border-[#cac7bd]'><td colspan='7' class='px-6 py-4 text-center'>No books found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <?php
    include './components/footer.php';
    ?>

</body>
</html>
