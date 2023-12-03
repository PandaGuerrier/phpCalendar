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
           <?php
            $month = $_POST['month'];

            if (str_starts_with($month, '0')) {
                $month = substr($month, 1);
            }

            $year = $_POST['year'];
            $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
            $daysMin = array('Lundi', 'Mardi', 'Mercr', 'Jeudi', 'Vendre', 'Samedi', 'Diman');
            $months = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
            $firstDay = getDay(0, $month, $year);
            $daysInMonth = getDaysInMonth($month, $year);

            if ($month == 1) {
                $lastMonth = 12;
                $daysInLastMonth = getDaysInMonth($lastMonth, $year - 1);
            } else {
                $lastMonth = $month - 1;
                $daysInLastMonth = getDaysInMonth($lastMonth, $year);
            }

            if ($month == 12) {
                $nextMonth = 1;
                $daysInNextMonth = getDaysInMonth($nextMonth, $year + 1);
            } else {
                $nextMonth = $month + 1;
                $daysInNextMonth = getDaysInMonth($nextMonth, $year);
            }


            function getDay($day, $month, $year)
            {
                if ($month < 3) {
                    $z = $year - 1;
                } else {
                    $z = $year;
                }
                return ((int)((23 * $month) / 9) + $day + 2 + $year + (int)($z / 4) - (int)($z / 100) + (int)($z / 400)) % 7;
            }

            function getDaysInMonth($month, $year)
            {
                if ($month == 2) {
                    if ($year % 4 == 0) {
                        return 29;
                    } else {
                        return 28;
                    }
                } else {
                    if ($month % 2 == 0) {
                        return 30;
                    } else {
                        return 31;
                    }
                }
            }

            ?>
            <div class="flex justify-center mb-10">
                <h1>
                    <?php
                    echo "<h1 class='font-extralight text-transparent text-4xl bg-clip-text bg-gradient-to-r from-blue-800 to-purple-800'>$months[$month] - $year</h1>";
                    ?>
                </h1>
            </div>
            <div class="w-full">
                <div class="w-full flex justify-start md:space-x-5 space-x-3 text-white">
                    <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo("              
                                  <span class='xl:block lg:block md:block sm:block hidden'>$days[$i]</span>
                                  <span class='xl:hidden lg:hidden md:hidden sm:hidden block'>$daysMin[$i]</span>
                                  ");
                    }
                    ?>
                </div>
            </div>

            <div class="flex grid grid-cols-7 justify-center">
                <?php
                for ($i = 0; $i < $firstDay; $i++) {
                    $d = $daysInLastMonth - $firstDay + $i + 1;
                    echo("<div class='flex'>
                                    <span class='h-7 w-7 justify-center items-center text-center flex bg-gray-300 rounded-full m-2'>
                                        $d
                                    </span>
                                  </div>
                                  ");
                }

                for ($i = 1; $i <= $daysInMonth; $i++) {
                    echo("<div class='flex'>
                                    <span class='h-7 w-7 justify-center items-center text-center text-white flex bg-blue-500 rounded-full m-2'>
                                        $i
                                    </span>
                                  </div>
                                  ");
                }

                for ($i = 1; $i <= 6 - getDay($daysInMonth - 1, $month, $year); $i++) {
                    echo("<div class='flex'>
                                    <span class='h-7 w-7 justify-center items-center text-center flex bg-gray-300 rounded-full m-2'>
                                        $i
                                    </span>
                                  </div>
                                  ");
                }
                ?>
            </div>

            <div class="flex justify-center space-x-5 w-full mt-4">
                <form action="request.php" method="post">
                    <div>
                        <?php
                        $lastY = $year - 1;

                        echo "<input type='hidden' name='month' value='$month'>";
                        echo "<input type='hidden' name='year' value='$lastY'>";
                        echo "<button type='submit' class='bg-blue-600 rounded-full px-4 py-2 text-white'>$lastY<button>";
                        ?>
                    </div>
                </form>
                <form action="request.php" method="post">
                    <div>
                        <?php
                        if ($month == 1) {
                            $lastM = 12;
                            $lastY = $year - 1;
                        } else {
                            $lastM = $lastMonth;
                            $lastY = $year;
                        }

                        echo "<input type='hidden' name='month' value='$lastM'>";
                        echo "<input type='hidden' name='year' value='$lastY'>";
                        echo "<button type='submit' class='bg-blue-600 rounded-full px-4 py-2 text-white'>{$months[$lastM]}</button>";
                        ?>
                    </div>
                </form>

                <form action="request.php" method="post">
                    <div>
                        <?php
                        if ($month == 12) {
                            $nextM = 1;
                            $nextY = $year + 1;
                        } else {
                            $nextM = $nextMonth;
                            $nextY = $year;
                        }

                        echo "<input type='hidden' name='month' value='$nextM'>";
                        echo "<input type='hidden' name='year' value='$nextY'>";
                        echo "<button type='submit' class='bg-blue-600 rounded-full px-4 py-2 text-white'>{$months[$nextM]}</button>";
                        ?>
                    </div>
                </form>

                <form action="request.php" method="post">
                    <div>
                        <?php
                        $nextY = $year + 1;

                        echo "<input type='hidden' name='month' value='$month'>";
                        echo "<input type='hidden' name='year' value='$nextY'>";
                        echo "<button type='submit' class='bg-blue-600 rounded-full px-4 py-2 text-white'>$nextY</button>";
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>