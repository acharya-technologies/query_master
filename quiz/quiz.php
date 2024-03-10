<?php
require('imp.php');
if (isset($_GET['logout'])) {
    $tmp = $_SESSION['tmp'];
    $q = "DELETE FROM $tbl_usr WHERE username='$tmp';";
    $con->query($q);
    session_unset();
    session_destroy();
    echo "<script>alert('logout');location.href= './quiz.php'</script>";
}
$_SESSION['logged'];
$count;
$userAccess;
if (isset($_POST['result'])) {
    $gpin = $_SESSION['gpin'];
    $rollno = $_SESSION['logged'];
    $name = $_SESSION['name'];
     $time = microtime(true);
    $sql = "SELECT * FROM " . $tbl_que . " WHERE gamepin='$gpin';";
    $query = mysqli_query($con, $sql);
    $choice = $_POST['final'];
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
    }
    $q = "UPDATE $tbl_usr SET marks=$result, submitTime='$time' WHERE username='$rollno'; ";
    $con->query($q);
    $_SESSION['logged'] = 0;
}

?>
<?php if (isset($_POST['checkpin'])) {
    $gpin = $_POST['gpin'];
    $uid = $_POST['uid'];
    $sql_query = "select count(*) as gpin from gamepins where gpin='$gpin' and active='1';";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['gpin'];
    $sql_query2 = "select count(*) as user,username,name from $tbl_login where username='$uid' and gamepin='$gpin' ;";
    $result2 = mysqli_query($con, $sql_query2);
    $row2 = mysqli_fetch_array($result2);
    $userAccess = $row2['user'];
    $userName = $row2['username'];
    $userNm = $row2['name'];

    if ($userAccess == 1) {
        $_SESSION['tmp'] = $_SESSION['logged'] = $userName;
        $_SESSION['name'] = $userNm;
        $_SESSION['gpin'] = $gpin;
        $time = microtime(true);
        $q2 = "INSERT INTO $tbl_usr (`name`,`username`,`gamepin`,`loginTime`) VALUES ('$userNm','$userName','$gpin','$time');";
        $con->query($q2);
    }
}
echo $_SESSION['tmp'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#fed7aa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz 2 |
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="../css/fonts.css">
    <script src="../js/index.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>


<body class="mt-10 select-user">
    <?php if ($_SESSION['logged'] == 0) {
        ?>
        <form autocomplete="off" method="post" action="" class="mx-4 lg:m-auto lg:w-1/3" align="center">
            <?php if (isset($_POST['gpin']) && $count == 0) { ?><i class="text-xl text-red-500 Poppins ">No Quiz
                    Found.</i><br><br>
            <?php } ?>
            <?php if (isset($_POST['gpin']) && $userAccess == 0 && $count == 1) { ?><i
                    class="text-xl text-red-500 Poppins ">
                    You Don't Have Access.
                </i><br><br>
            <?php } ?>
            <div align="center">
                <input id="gpin" name="gpin" type="number" placeholder="Enter Quiz Pin"
                    class="text-center text-xl border-2 py-2 w-80 Gotu rounded border-gray-100 focus:outline-none focus:border-black"
                    required autofocus>
            </div><br>
            <div align="center">
                <input id="rollno" type="number" name="uid" placeholder="Enter Unique ID"
                    class="text-center text-xl border-2 py-2 w-80 Gotu rounded border-gray-100 focus:outline-none focus:border-black"
                    required>
            </div><br>
            <div>
                <input type="submit" name="checkpin" value="Start Quiz" align="center"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 Gotu hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"><br>
            </div>
        </form>
    <?php } else {
        $gpin = $_SESSION['gpin'];
        $q = "SELECT * FROM gamepins where gpin='$gpin';";
        $query = $con->query($q);
        $entries = mysqli_num_rows($query);
        $i = 1;
        while ($val = mysqli_fetch_assoc($query)) { ?>
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
                                    <span class="bg-transparent w-full focus:outline-none select-none">
                                        <?php echo $i . ". " . $row["question"]; ?>
                                    </span>
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
                <div align="center">
                    <!-- <input type="number"
                        class="bg-transparent text-black font-semibold py-1 px-2 border border-blue-500  rounded w-20" readonly
                        name="timer" value="0" id="timer"><br><br> -->
                    <input type="submit" id="result" name="result"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 Gotu hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded my-10"
                        value="Submit">
                </div>

            </form>
            <script>
                window.onblur = submitform;
                function submitform() {
                    alert("Form submitted as you changed the window.");
                    result.click();
                }
                // document.onready = function () { timer.value = 0 };
                // setInterval(() => {
                //     timer.value = (Math.round(parseFloat(timer.value) * 100) / 100 + 0.10);
                // }, 100);
            </script>
            <?php
        }
    }
    ?>

</body>