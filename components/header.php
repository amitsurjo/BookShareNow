<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- tailwindcss and flowbite -->



</head>

<body>


    <header>

        <nav class=" border-gray-200 bg-[#191919]">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="books.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://th.bing.com/th/id/OIP.MTeMMIyyRQD3b2XeEjBFkwHaHa?rs=1&pid=ImgDetMain" class="h-8" />
                    
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-[#CAC7BD]">Book Share</span>
                </a>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="text-[#CAC7BD] bg-[#CAC7BD]  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center  border-2  border-[#cac7bd]  hover:bg-[#b3aea0]  hover:text-[#191919]" onclick="window.location.href = 'signup.php'">Get started</button>
                    <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200    hover:bg-gray-700  " aria-controls="navbar-cta" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border  rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0   bg-[#191919] md:   border-[#191919]">
                        <?php
                        $pages = array(
                            'Dashboard' => 'dashboard.php',
                            'Books' => 'books.php',
                            'Post' => 'post.php',
                            'About' => 'about.php',
                        );

                        $current_page = basename($_SERVER['REQUEST_URI']);


                        foreach ($pages as $page => $url) {
                            $active_class = ($current_page == $url) ? 'text-red-500' : 'text-gray-900';
                            echo "<li><a href='$url' class='block py-2 px-3 md:p-0 rounded hover:bg-[#191919] md:hover:bg-transparent md:hover:text-[#CAC7BD] md: hover:text-[#CAC7BD]  text-white     md: hover:bg-transparent  border-gray-700 $active_class'>$page</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>




</body>

</html>