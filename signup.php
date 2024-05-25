<?php


include "./components/_dbconnect.php";


$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $user = $_POST["Name"];
    $road = $_POST["Road"];
    $city = $_POST["City"];
    $district = $_POST["District"];
    $phone = $_POST["Phone"];
    $email = $_POST["Email"];
    $password = $_POST["Password1"];
    $cpassword = $_POST["Password2"];





    //check if the phone number is exist
    $existSql = "SELECT * FROM `users` WHERE `phone`='$phone'";
    $result = mysqli_query($conn, $existSql);
    $numberExistRows = mysqli_num_rows($result);

    if ($numberExistRows > 0) {
        $exist = true;
    } else {
        $exist = false;
    }

    if (($password == $cpassword) && $exist == false) {
        $sql = "INSERT INTO `users`(`name`, `road`, `city`, `district`, `email`, `phone`, `password`) VALUES  ('$user','$road','$city','$district','$email','$phone','$password')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        }
    } else {
        $showError = true;
    }
}

//redirect to login page

if ($showAlert) {
    // Redirect to the login page
    header('Location: login.php');
    exit();
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

<body class="bg-[#191919]">
    <?php
    if ($showAlert) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Signin successful!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        $showAlert = false;
    }
    if ($showError) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password not same or phone number already exist!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

        $showError = false;
    }
    ?>



    <div class="w-screen h-screen bg-[#191919] p-24">

        <div class="flex items-center justify-center h-screen ">
            <div class="w-full max-w-xl p-4  border-2 border-[#cac7bd] rounded-lg shadow sm:p-6 md:p-8  ">
                <!-- register form -->
                <form class="space-y-4" action="./signup.php" method="post">
                    <h5 class="text-3xl font-medium text-[#cac7bd]  text-center">REGISTER</h5>

                    <div>
                        <label for="Name" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                            Name
                        </label>
                        <input type="text" name="Name" id="Name" class="bg-[#cac7bd] border border-[#cac7bd] text-[#191919] text-sm rounded-lg block w-full p-2.5      focus:ring-[#cac7bd] focus:border-[#cac7bd]" placeholder="name" required />
                    </div>

                    <div>
                        <label for="Email" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                            Email
                        </label>
                        <input type="email" name="Email" id="Email" class="bg-[#cac7bd] border border-[#cac7bd] text-[#191919] text-sm rounded-lg block w-full p-2.5      focus:ring-[#cac7bd] focus:border-[#cac7bd]" placeholder="name@company.com" required />
                    </div>

                    <div>
                        <label for="Phone" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                            Phone
                        </label>
                        <input type="phone" name="Phone" id="phone" class="bg-[#cac7bd] border border-[#cac7bd] text-[#191919] text-sm rounded-lg block w-full p-2.5      focus:ring-[#cac7bd] focus:border-[#cac7bd]" placeholder="+880 1*********" required />
                    </div>

                    <div>
                        <label for="Password1" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                            Password
                        </label>
                        <input type="password" name="Password1" id="Password1" placeholder="••••••••" class="bg-[#cac7bd] border border-[#cac7bd]  text-sm rounded-lg block w-full p-2.5     text-[#191919] focus:ring-[#cac7bd] focus:border-[#cac7bd]" required />
                    </div>

                    <div>
                        <label for="Password2" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                            Confirm Password
                        </label>
                        <input type="password" name="Password2" id="Password2" placeholder="••••••••" class="bg-[#cac7bd] border border-[#cac7bd]  text-sm rounded-lg block w-full p-2.5     text-[#191919] focus:ring-[#cac7bd] focus:border-[#cac7bd]" required />
                    </div>

                    <h5 class="text-md font-medium text-[#cac7bd] text-center pt-3">ADDRESS</h5>

                    <div>
                        <label for="Road" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                            Road
                        </label>
                        <input type="text" name="Road" id="Road" class="bg-[#cac7bd] border border-[#cac7bd] text-[#191919] text-sm rounded-lg block w-full p-2.5      focus:ring-[#cac7bd] focus:border-[#cac7bd]" placeholder="name" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="City" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                                City
                            </label>
                            <input type="text" name="City" id="City" class="bg-[#cac7bd] border border-[#cac7bd] text-[#191919] text-sm rounded-lg block w-full p-2.5      focus:ring-[#cac7bd] focus:border-[#cac7bd]" placeholder="name" required />
                        </div>

                        <div>
                            <label for="District" class="block mb-2 text-sm font-medium text-[#cac7bd]">
                                District
                            </label>
                            <select name="District" id="District" class="bg-[#cac7bd] border border-[#cac7bd] text-[#191919] text-sm rounded-lg block w-full p-2.5      focus:ring-[#cac7bd] focus:border-[#cac7bd]" required>
                                <option value="">Select a district</option>
                                <option value="district1">District 1</option>
                                <option value="district2">District 2</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>

                    </div>

                    <div class="flex items-start">
                        <div class="flex items-start">
                        </div>
                        <a href="#" class="ms-auto text-sm text-blue-700 hover:underline   ">Lost Password?</a>
                    </div>


                    <button type="submit" class="w-full  hover:bg-[#cac7bd] focus:ring-4 focus:outline-none border-2 border-[#cac7bd] text-[#cac7bd] hover:text-[#191919] font-medium rounded-lg text-sm px-5 py-2.5 text-center">REGISTER</button>

                    <div class="text-sm font-medium    text-gray-300 p-4">
                        Already registered? <a href="#" class="text-blue-700 hover:underline   " onclick="location.href='login.php'">Log in</a>
                    </div>
                </form>
            </div>

        </div>



    </div>


</body>

</html>