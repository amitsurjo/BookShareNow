<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "components/_dbconnect.php";
    $phone = $_POST["phone"];
    $password = $_POST["password"];



    $sql = "SELECT * FROM `users` WHERE `phone`='$phone' AND `password`='$password'; ";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['phone'] = $phone;
        header("location: dashboard.php");
    } else {
        $showError = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="dark">

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

</head>

<body>

    <div class="w-screen h-screen bg-[#191919]">
        <div class=" flex items-center justify-center h-screen bg-[#191919]">
            <div class="w-full max-w-sm p-4  border-2 border-[#cac7bd] rounded-lg shadow sm:p-6 md:p-8 ">
                <form class="space-y-6" action="./login.php" method="post">
                    <h5 class="text-xl font-medium text-[#cac7bd]  ">Sign in</h5>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                            Phone
                        </label>
                        <input type="phone" name="phone" id="phone" class="bg-[#cac7bd] border border-gray-300 text-[#191919] text-sm rounded-lg block w-full p-2.5      focus:ring-[#cac7bd] focus:border-[#cac7bd]" placeholder="+880 1*********" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                            Password
                        </label>

                        <input type="password" name="password" id="password" class="bg-[#cac7bd] border border-gray-300 text-[#191919] text-sm rounded-lg block w-full p-2.5      " placeholder="+880 1*********" required />
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-start">


                        </div>
                        <a href="#" class="ms-auto text-sm  hover:underline   text-blue-500">Lost Password?</a>
                    </div>
                    <button type="submit" class="w-full  hover:bg-[#cac7bd] focus:ring-4 focus:outline-none border-2 border-[#cac7bd] text-[#cac7bd] hover:text-[#191919] font-medium rounded-lg text-sm px-5 py-2.5 text-center  ">
                        Login to your account
                    </button>
                    <div class="text-sm font-medium text-[#cac7bd]">
                        Not registered? <a href="#" class="text-blue-700 hover:underline   " onclick="location.href='signup.php'">Create account</a>
                    </div>
                </form>
            </div>

        </div>



    </div>


</body>

</html>