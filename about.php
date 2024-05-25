<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- tailwindcss and flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body class="  bg-[#191919]">
    <?php
    include  "./components/header.php";;
    ?>
    <div class=" py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24   bg-[#191919] h-screen">
        <div class="relative max-w-xl mx-auto">
            <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
            </svg>
            <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
            </svg>
            <div class="text-center">
                <h2 class="text-3xl leading-9 font-bold tracking-tight  sm:text-4xl sm:leading-10   text-[#cac7bd]">
                    About Our Book Sharing Community
                </h2>
                <p class="mt-3 max-w-md mx-auto text-base  sm:text-lg md:mt-5 md:text-xl md:max-w-3xl   text-[#cac7bd]	">
                    We are a community of book lovers who believe in the power of reading and the value of shared stories. Our mission is to create a platform where everyone can share their physical books with others.
                </p>
            </div>
        </div>
        <div class="text-center mt-12">
            <h2 class="text-3xl leading-9 font-bold tracking-tight  sm:text-4xl sm:leading-10   text-[#cac7bd]">
                Contact Us
            </h2>
            <p class="mt-3 max-w-md mx-auto text-base  sm:text-lg md:mt-5 md:text-xl md:max-w-3xl   text-[#cac7bd]">
                We'd love to hear from you! Send us a message or follow us on social media.
            </p>
            <div class="mt-8">
                <a href="mailto:info@bookshare.com" class="text-[#cac7bd] hover:text-[#cac7bd]">info@bookshare.com</a>
            </div>
            <div class="mt-6">
                <a href="https://www.facebook.com/bookshare" class="text-[#cac7bd] hover:text-blue-900 mx-2">Facebook</a>
                <a href="https://www.twitter.com/bookshare" class="text-[#cac7bd] hover:text-blue-900 mx-2">Twitter</a>
                <a href="https://www.instagram.com/bookshare" class="text-[#cac7bd] hover:text-blue-900 mx-2">Instagram</a>
            </div>
        </div>
    </div>

    <?php
    include  "./components/footer.php";;
    ?>

</body>

</html>