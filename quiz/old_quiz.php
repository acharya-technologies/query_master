<?php

$count = $userAccess = 0;
session_start();
require 'imp.php';
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}


if (!isset($_SESSION['logged']))
    $_SESSION['logged'] = 0;
if (!isset($_SESSION['gpin']))
    $_SESSION['gpin'] = 1;


if (isset($_GET['gpin'])) {
    $gpin = $_GET['gpin'];
    $rollno = $_GET['rollno'];
}
if (isset($_GET['gpin'])) {
    $sql_query = "select count(*) as gpin from gamepins where gpin='$gpin' and active='1';";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['gpin'];
    $sql_query2 = "select count(*) as user,username,name from $tbl_login where username='$rollno' and gamepin='$gpin' ;";
    $result2 = mysqli_query($con, $sql_query2);
    $row2 = mysqli_fetch_array($result2);
    $userAccess = $row2['user'];
    $userName = $row2['username'];
    $userNm = $row2['name'];
    if ($userAccess == 1) {
        $_SESSION['logged'] = $userName;
        $_SESSION['name'] = $userNm;
        $_SESSION['gpin'] = $gpin;
    }
}

if (!isset($_POST['result'])) {
    ?>
    <?php
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#fed7aa">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz |
            <?php echo $title; ?>
        </title>
        <link rel="stylesheet" href="../css/fonts.css">
        <script src="../js/index.js"></script>
        <link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>


    <body class="text-black h-screen w-screen Time">
        <!-- <p align="center" class="Yatra text-center bg-gray-50 text-black"> || श्री ||</p> -->
        <!-- default page -->
        <?php if ($_SESSION['logged'] == 0) {

            ?>
            <br><br>
            <form autocomplete="off" method="get" action="" class="mx-4 lg:m-auto lg:w-1/3" align="center">
                <?php if (isset($_GET['gpin']) && $count == 0) { ?><i class="text-xl text-red-500 Poppins ">No Quiz
                        Found.</i><br><br>
                <?php } ?>
                <?php if (isset($_GET['gpin']) && $userAccess == 0 && $count == 1) { ?><i class="text-xl text-red-500 Poppins ">
                        You Don't Have Access.
                    </i><br><br>
                <?php } ?>
                <div align="center"><input id="gpin" name="gpin" type="number" placeholder="Enter Quiz Pin"
                        class="text-center text-xl border-2 py-2 w-80 Gotu rounded border-gray-100 focus:outline-none focus:border-black"
                        required autofocus></div><br>
                <div align="center">
                    <input id="rollno" type="number" name="rollno" placeholder="Enter Roll Number"
                        class="text-center text-xl border-2 py-2 w-80 Gotu rounded border-gray-100 focus:outline-none focus:border-black"
                        required>
                </div><br>
                <div>
                    <input type="submit" name="checkpin" value="Start Quiz" align="center"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 Gotu hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><br>
                </div>

            </form>

        <?php } ?>
        <!-- quiz starts after right quiz pin and user registration -->
        <?php if ($_SESSION['logged'] != 0) {
            $gpin = $_SESSION['gpin'];
            $sql = "SELECT * FROM gamepins WHERE gpin='$gpin' ";
            $query = mysqli_query($con, $sql);
            $entries = mysqli_num_rows($query);
            while ($val = mysqli_fetch_assoc($query)) {

                ?>
                <br>
                <h1 class="text-center text-2xl Gotu text-black font-bold">

                </h1>
                <br>
                <form autocomplete="off" method="post" action="" class="m-auto mx-4 lg:mx-auto lg:w-1/3" id="form">
                    <h1 class="text-center text-2xl Gotu text-black font-bold">
                        Welcome,<br>
                        <?php echo $_SESSION['name']; ?><br>
                    </h1><br>
                    <?php
                    for ($i = 1; $i <= 20; $i++) {
                        $sql = "SELECT * FROM " . $gpin . "_question where qno='$i' and  gamepin='$gpin';";
                        $result = mysqli_query($con, $sql);
                        $records = mysqli_num_rows($result);
                        if ($records > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <!--Question -->

                                <div class="text-justify bg-gray-50 question border-2 rounded-lg border-black">
                                    <h2 class="text-xl bg-gray-100 border-black rounded-tr-lg rounded-tl-lg border-b-2 py-2 px-4 font-bold">
                                        <span class="bg-transparent w-full focus:outline-none select-none"
                                            readonly><?php echo $i . ". " . $row["question"]; ?> </span>
                                    </h2>

                                    <!--Multiple Choice starts-->
                                    <div class="px-4 options py-2">
                                        <?php

                                        $sql2 = "SELECT * FROM " . $tbl_ans . " where que_no='$i' and  gamepin='$gpin' ORDER BY que_no";
                                        $result2 = mysqli_query($con, $sql2);
                                        $records2 = mysqli_num_rows($result2);
                                        if ($records2 > 0) {
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                ?>
                                                <label class="text-lg select-none"> <input type="radio" value="<?php echo $row2['ano']; ?>"
                                                        name="final[<?php echo $row2['que_no']; ?>]" id="final[<?php echo $row2['que_no']; ?>]">
                                                    <?php echo $row2['answer']; ?>
                                                </label><br>
                                            <?php }
                                        } ?>
                                    </div>
                                </div><br>
                            <?php }
                        }
                    } ?>
                    <input name="usrnm" type="hidden" value="<?php echo $username ?>">
                    <input name="name" type="hidden" value="<?php echo $name ?>">
                    <div align="center">
                        <input type="number"
                            class="bg-transparent text-black font-semibold py-1 px-2 border border-blue-500  rounded w-20" readonly
                            name="timer" value="0" id="timer"><br><br>
                        <input type="submit" id="result" name="result"
                            class="bg-transparent hover:bg-blue-500 text-blue-700 Gotu hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded"
                            value="Submit">
                    </div>
                </form>
                <script>
                    window.onblur = submitform;
                    function submitform() {
                        alert("Form submitted as you changed the window.");
                        result.click();
                    }
                    document.onready = function () { timer.value = 12 };
                    setInterval(() => {
                        timer.value = (Math.round(parseFloat(timer.value) * 100) / 100 + 0.10);
                    }, 100);
                </script>
            <?php }
        }
} ?>

    <!-- for result after submission -->
    <?php if (isset($_POST['result'])) { ?>

        <?php
        $gpin = $_SESSION['gpin'];
        $rollno = $_SESSION['logged'];
        $name = $_SESSION['name'];
        $sql = "SELECT * FROM " . $tbl_que . " WHERE gamepin='$gpin';";
        $query = mysqli_query($con, $sql);
        $choice = $_POST['final'];
        $time = $_POST['timer'];
        $j = 1;
        $result = 0;
        $entries = mysqli_num_rows($query);
        if ($entries > 0) {
            while ($val = mysqli_fetch_assoc($query)) {
                if ($val['correct'] == $choice[$j]) {
                    $result++;
                }
                $j++;
            }
        } ?>


        <!-- <meta http-equiv="Refresh" content="3;url='./'"> -->
        <i id="result"></i>
        <br>

        <?php
        $queryLogin = "SELECT * FROM $tbl_login WHERE username='$rollno';";
        $query = mysqli_query($con, $queryLogin);
        $entries = mysqli_num_rows($query);

        if ($entries > 0) {
            while ($val = mysqli_fetch_assoc($query)) {
                $name = $val['name'];
                $username = $rollno;
                $class = $val['class'];
            }
        }

        $q2 = "INSERT INTO $tbl_usr (`name`,`username`,`marks`,`gamepin`,`class`,`submitTime`) VALUES ('$name','$username','$result','$gpin','$class','$time');";
        $ins = $con->query($q2);
        ?>
        <script>alert("Form Submitted Successfully!"); location.href = './'</script>
    <?php }




    // echo $_SESSION['gpin'];
    // echo $_SESSION['name'];
    // echo $_SESSION['logged'];
    ?>





    <!-- footer -->
    <!-- <div
        class="bg-gray-200 px-2 py-1 right-0.5 border-t-2 border-l-2 border-gray-900 rounded fixed text-center z-20 bottom-1 text-xs Time">
        <a href="<?php echo $website; ?>">Powered by<span class="Gotu text-red-500 font-bold text-sm">
                प्रश्नावली</span><br></a>
    </div> <br><br><br><br> -->




    <!-- <form action=""><button name="logout">logout</button> </form> -->

</body>

</html>