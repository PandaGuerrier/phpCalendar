<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Calendrier</title>
</head>
<body class="bg-gradient-to-r from-cyan-500 to-blue-500 flex justify-center mt-52 overflow-hidden">
    <div class="absolute bottom-[-50px]">
        <svg width="2000" height="685" viewBox="0 0 1440 420" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 95C130.028 -21.617 323.901 -31.4098 465.018 71.5112L498.852 96.1871C638.906 198.333 827.203 204.363 973.505 111.387L978.795 108.025C1089.22 37.8476 1225.56 21.6481 1349.36 63.9947L1440 95V420H0V95Z" fill="url(#paint0_linear_1_25)"/>
            <defs>
                <linearGradient id="paint0_linear_1_25" x1="720" y1="-105" x2="720" y2="420" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#1D5CFC"/>
                    <stop offset="1" stop-color="#57B9A7"/>
                </linearGradient>
            </defs>
        </svg>
    </div>


    <div class="w-[500px] h-[550x] md:w-[550px] md:flex md:justify-center bg-red-500 md:p-5 bg-gray-500 rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-20 border border-gray-400">
        <div>

            <div class="flex justify-center space-x-5 w-full mt-4">
                <form action="request.php" method="post" class="space-y-5">
                    <h1 class='font-extralight text-transparent text-4xl bg-clip-text bg-gradient-to-r from-blue-800 to-purple-800'>Le super calendrier !</h1>
                    <div class="flex space-x-5">
                        <div>
                            <label for="month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mois</label>
                            <input type="number" id="month" name='month' class="bg-transparent border border-blue-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="07" required>
                        </div>
                        <div>
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Année</label>
                            <input type="number" id="year" name="year" class="bg-transparent border border-blue-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="2007" required>
                        </div>
                    </div>
                    <button type='submit' class='duration-200 bg-blue-400 text-white hover:bg-blue-600 px-3 py-2 w-full rounded-full text-sm font-medium focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-blue-300'>C'est parti !</button>

                </form>
            </div>
        </div>
</div>
</body>
</html>