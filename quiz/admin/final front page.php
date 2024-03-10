<?php require '../imp.php';
if (isset($_GET['gpin'])) {$gpin = $_GET['gpin'];
$sql = "SELECT * FROM gamepins WHERE gpin='$gpin';";
            $result = mysqli_query($con, $sql);
            $records = mysqli_num_rows($result);
            $i = 1;
            if ($records > 0) {while ($rowGamepin = mysqli_fetch_assoc($result)) {
                $title = $rowGamepin['title'];}}
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="../../css/fonts.css" />
    <script src="../../js/index.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <p align="center" class="Yatra text-center text-black"> || श्रीराम ||</p>
    <!-- delete game -->
    <?php if (isset($_GET['delete'])) {
        $gpin = $_GET['delete'];
        $q1 = "DELETE FROM $tbl_que WHERE gamepin='$gpin';";
        $q2 = "DELETE FROM $tbl_ans WHERE gamepin='$gpin';";
        $q3 = "DELETE FROM gamepins WHERE gpin='$gpin';";
        $con->query($q1);
        $con->query($q2);
        $con->query($q3);
    } ?>

    <!-- for main menu -->
    <?php if (!isset($_GET['action'])) { ?>
        <title>Quiz Admin | <?php echo $title; ?></title>
        <form action="" class="flex items-center w-1/2 m-auto my-10">
            <input type="submit" name="action" class="px-4 py-2 w-30 text-blue-500 m-auto rounded hover:bg-blue-500 hover:text-white border-2 border-blue-500" value="Create New User" />
            <input type="submit" name="action" class="px-4 py-2 w-30 text-blue-500 m-auto rounded hover:bg-blue-500 hover:text-white border-2 border-blue-500" value="Total Users" />
        </form>
        <form id="cards" class="grid md:grid-cols-3 grid-cols-1" action="" method="get">
            <?php
            $sql = "SELECT * FROM gamepins;";
            $result = mysqli_query($con, $sql);
            $records = mysqli_num_rows($result);
            $i = 1;
            if ($records > 0) {
            
                while ($rowGamepin = mysqli_fetch_assoc($result)) { ?>
                    <div class="w-full Gotu max-w-sm mx-auto my-4 bg-gray-100 border border-gray-200 rounded-lg shadow">
                        <img class="p-2 rounded-t-lg" src="http://source.unsplash.com/1600x900/?<?php for ($j = 1; $j <= $i; $j++) echo "gradient,"; ?>" alt="<?php echo $rowGamepin['title']; ?>" />
                        <div class="px-5 pb-5">
                            <h5 class="text-xl  text-gray-900 "><?php echo $rowGamepin['title']; ?></h5>
                            <div class="flex mt-4 items-center justify-between ">
                                <input type="button" onclick="preview<?php echo $i; ?>()" name="action" class="px-4 py-2 text-green-500 rounded hover:bg-green-500 hover:text-white border-2 border-green-500" value="Preview" />
                                <input type="button" onclick="manage<?php echo $i; ?>()" name="action" class="px-4 py-2 text-blue-600 rounded hover:bg-blue-600 hover:text-white border-2 border-blue-600" value="Manage" />
                                <input id="gpin<?php echo $i; ?>" class="hidden" value="<?php echo $rowGamepin['gpin']; ?>" />
                            </div>
                        </div>
                    </div>
                    <script>
                        function preview<?php echo $i; ?>() {
                            location.href = "?action=Preview&gpin=" + gpin<?php echo $i; ?>.value;
                        }

                        function manage<?php echo $i; ?>() {
                            location.href = "?action=Manage&gpin=" + gpin<?php echo $i; ?>.value;
                        }
                    </script>
            <?php $i++;
                }
            } ?>


            <div class="w-full Gotu max-w-sm mx-auto my-4 bg-gray-100 border border-gray-200 rounded-lg shadow">
                <svg part="svg" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" aria-labelledby="icon-add" focusable="false" viewBox="0 0 24 24" class="h-icon icon-primary aspect-video h-icon--no-custom-width"><!---->
                    <g>
                        <path fill="#9333ea" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path>
                    </g>
                </svg>
                <div class="px-5 pb-5">
                    <h5 class="text-xl text-center text-gray-900 ">Create New Quiz</h5>
                    <div class="flex mt-8 items-center justify-center">
                        <input type="button" onclick="numQuestion()" name="action" class="px-4 py-2 text-purple-500 rounded hover:bg-violet-500 hover:text-white border-2 border-purple-500" value="New">
                    </div>
                </div>
            </div>
        </form>

        <script>
            function numQuestion() {
                let x = prompt("Enter number of question to enter ");
                if (x == null || x <= 0 || x > 20) {
                    x = 1;
                }
                location.href = "?action=New&create=" + x;
            }
        </script>

    <?php } ?>

    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "Delete") {
            $gpin = $_GET['gpin'];
            $q1 = "DELETE FROM answers WHERE gamepin='$gpin';";
            $q2 = "DELETE FROM question WHERE gamepin='$gpin';";
            $q3 = "DELETE FROM users WHERE gamepin='$gpin';";
            $q4 = "UPDATE login SET gamepin=NULL WHERE gamepin='$gpin';";
            $q5 = "DROP TABLE IF EXISTS " . $gpin . "_answers";
            $q6 = "DROP TABLE IF EXISTS " . $gpin . "_question";
            $q7 = "DELETE FROM gamepins WHERE gpin='$gpin';";
            $con->query($q1);
            $con->query($q2);
            $con->query($q3);
            $con->query($q4);
            $con->query($q5);
            $con->query($q6);
            $con->query($q7);
            echo '<meta http-equiv="Refresh" content="0.1;./">';
        }
    ?>
        <!-- for preview of questions  -->
        <?php
        if ($_GET['action'] == "Preview") { ?>
            <?php
            $sql = "SELECT * FROM gamepins WHERE gpin='$gpin';";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($query);
            $questionCount = $row['total'];

            if (isset($_POST['update'])) {

                for ($i = 1; $i <= $questionCount; $i++) {
                    $sql = "SELECT * FROM $tbl_que where qno='$i' AND gamepin='$gpin'";
                    $result = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($result);
                    if ($records > 0) {
                        while ($rowQuestion = mysqli_fetch_assoc($result)) {
                            $abc = $rowQuestion['qno'];
                        }
                        $quen = $_POST["quen" . $abc];
                        $quen = mysqli_real_escape_string($con, $quen);
                        $gamepin = $_POST["gamepin"];
                        $gamepin = mysqli_real_escape_string($con, $gamepin);
                        $gametitle = $_POST["gametitle"];
                        $gametitle = mysqli_real_escape_string($con, $gametitle);
                        $question = $_POST["question" . $abc];
                        $question = mysqli_real_escape_string($con, $question);
                        $ans = $_POST["option" . $abc];
                        $ans = mysqli_real_escape_string($con, $ans);
                        $correct = $_POST["correct" . $abc];
                        $correct = mysqli_real_escape_string($con, $correct);
                        $serAns = $_POST["serialAnswer" . $abc];
                        $serAns = mysqli_real_escape_string($con, $serAns);
                        $serQue = $_POST["serialQuestion" . $abc];
                        $serQue = mysqli_real_escape_string($con, $serQue);
                        $tmp1 = ($quen - 1) * 4 + 1;
                        $tmp2 = ($quen - 1) * 4 + 2;
                        $tmp3 = ($quen - 1) * 4 + 3;
                        $tmp4 = ($quen - 1) * 4 + 4;
                        $q2 = "UPDATE $tbl_que SET gamepin='$gamepin', question='$question',correct='$correct',qno='$quen' WHERE srno='$serQue';";
                        $q1 = "UPDATE $tbl_ans SET gamepin='$gamepin', answer='$ans' WHERE srno='$serAns';";

                        $result = $con->query($q1);

                        $con->query($q2);
                    }
                }
                $q3 = "UPDATE gamepins SET title='$gametitle' WHERE gpin='$gamepin';";
                $con->query($q3);
                if ($result) {
                    echo '<script>alert("Questions Updated Successfully")</script>';
                } else {
                    echo "<script>alert('error')</script>";
                }
            } ?>

            <form autocomplete="off" class="m-auto Poppins h-full bg-slate-100 w-full flex flex-col justify-center items-center" autocomplete="off" action="" method="post"><br>
                <?php

                $sql = "SELECT * FROM gamepins WHERE gpin='$gpin';";
                $result = mysqli_query($con, $sql);
                $records = mysqli_num_rows($result);
                if ($records > 0) {
                    while ($rowGamepin = mysqli_fetch_assoc($result)) { ?>
                        <title>Preview - <?php echo $rowGamepin['title']; ?></title>
                        <label>Quiz Pin
                            <input value="<?php echo $gpin; ?>" id="gamepin" type="number" name="gamepin" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" readonly />
                            <i class="fa fa-refresh ml-3 text-xl motion-safe:hover:animate-spin text-gray-500" onclick="generatePin()"></i>
                        </label><br>
                        <label class="-ml-10 pb-4 border-b-2 border-gray-500"> Quiz Title
                            <input id="gameTitle" name="gametitle" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $rowGamepin['title']; ?>" onkeyup="replaceme(gameTitle)" required />
                        </label><br>
                        <hr>

                <?php }
                } ?>
                <?php
                for ($i = 1; $i <= 20; $i++) {
                    $sql = "SELECT * FROM $tbl_que WHERE qno='$i' AND gamepin='$gpin';";
                    $result = mysqli_query($con, $sql);
                    $records = mysqli_num_rows($result);
                    if ($records > 0) {
                        while ($rowQuestion = mysqli_fetch_assoc($result)) {
                            $abc = $rowQuestion['qno']; ?>
                            <!--Question -->

                            <input type="number" name="serialQuestion<?php echo $rowQuestion['qno']; ?>" value="<?php echo $rowQuestion['srno']; ?>" id="serialQuestion<?php echo $rowQuestion['qno']; ?>" class="w-10 hidden focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly />
                            <input id="quen<?php echo $rowQuestion['qno']; ?>" type="number" min="1" max="20" name="quen<?php echo $rowQuestion['qno']; ?>" onchange="check<?php echo $rowQuestion['qno']; ?>()" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 rounded px-0 w-12 text-center pl-2" value="<?php echo $rowQuestion['qno']; ?>" required /><br>
                            <input id="question<?php echo $rowQuestion['qno']; ?>" name="question<?php echo $rowQuestion['qno']; ?>" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $rowQuestion['question']; ?>" onkeyup="replaceme(question<?php echo $rowQuestion['qno']; ?>)" required /><br>

                            <!--Multiple Choice starts-->
                            <div class=" px-4 py-2">
                                <?php
                                $sql2 = "SELECT * FROM $tbl_ans where que_no='$abc' AND gamepin='$gpin' ORDER BY que_no";
                                $result2 = mysqli_query($con, $sql2);
                                $records2 = mysqli_num_rows($result2);
                                if ($records2 > 0) {
                                    while ($rowAnswer = mysqli_fetch_assoc($result2)) { ?>
                                        <?php $t = ($rowAnswer['ano'] % 4);
                                        if ($t == 1)
                                            $t = 'A';
                                        else if ($t == 2)
                                            $t = 'B';
                                        else if ($t == 3)
                                            $t = 'C';
                                        else if ($t == 0)
                                            $t = 'D'; ?>

                                        <label>
                                            <input type="number" name="serialAnswer<?php echo $rowQuestion['qno']; ?>" value="<?php echo $rowAnswer['srno']; ?>" id=" serialAnswer<?php echo $rowQuestion['qno']; ?>" class="w-10 hidden focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly /> <?php $x = ($rowAnswer['ano'] % 4);
                                                                                                                                                                                                                                                                                                                                                if ($x == 0) $x = 4;
                                                                                                                                                                                                                                                                                                                                                echo $x; ?>)
                                            <input id="option<?php echo $i . $t ?>" name="option<?php echo $rowQuestion['qno']; ?>" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i . $t; ?>)' value="<?php echo $rowAnswer['answer']; ?>" required />
                                        </label><br><br>
                                <?php }
                                } ?>
                            </div>

                            <select id="select<?php echo $rowQuestion['qno']; ?>" name="select<?php echo $rowQuestion['qno']; ?>" onchange="check<?php echo $rowQuestion['qno']; ?>()" class="focus:outline-none w-40 bg-slate-200 border-2 border-slate-400 text-sm focus:border-slate-600 text-center rounded" required />
                            <option value="">--Correct Option--</option>
                            <option value="1" <?php if ($rowQuestion['correct'] % 4 == 1) echo "selected"; ?>>Option 1</option>
                            <option value="2" <?php if ($rowQuestion['correct'] % 4 == 2) echo "selected"; ?>>Option 2</option>
                            <option value="3" <?php if ($rowQuestion['correct'] % 4 == 3) echo "selected"; ?>>Option 3</option>
                            <option value="4" <?php if ($rowQuestion['correct'] % 4 == 0) echo "selected"; ?>>Option 4</option>
                            </select><br>
                            <input type="number" name="correct<?php echo $rowQuestion['qno']; ?>" id="correct<?php echo $rowQuestion['qno']; ?>" class=" w-10 focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center hidden" readonly />
                            <br>
                            <script>
                                document.ready = check<?php echo $rowQuestion['qno']; ?>();

                                function generatePin() {
                                    gamepin.value = Math.floor(1 + Math.random() * 10000);
                                }

                                function check<?php echo $rowQuestion['qno']; ?>() {
                                    correct<?php echo $rowQuestion['qno']; ?>.value = parseInt(select<?php echo $rowQuestion['qno']; ?>.value) + 4 * (parseInt(quen<?php echo $rowQuestion['qno']; ?>.value) - 1);
                                }
                            </script>
                            </div>
                            </div><br>

                <?php }
                    }
                } ?>
                <div align="center">
                    <input type="submit" id="update" onclick="refresh();" name="update" class="px-4 py-2 mx-auto border-2 border-slate-400 hover:bg-slate-400 hover:text-white focus:bg-slate-400 focus:text-white bg-white text-slate-400 rounded focus:outline-none" value="Update">
                </div><br>
                <input type="button" class="bg-red-100 border-2 border-red-600 hover:bg-red-600 hover:text-white text-red-600 py-1 px-4 rounded-md" value="Delete Game" onclick="deleteGame()">
                <br><br>

            </form>
            <script>
                let gpin = <?php echo $gpin; ?>;

                function deleteGame() {
                    if (confirm("Are You Sure To Delete Quiz")) {
                        location.href = "./?delete=" + gpin;
                    }
                }

                function replaceme(inputs) {
                    inputs.value = inputs.value.replace(/["]/g, "&quot;");
                    inputs.value = inputs.value.replace(/[']/g, "&apos;");
                    inputs.value = inputs.value.replace(/[<]/g, "&lt;");
                    inputs.value = inputs.value.replace(/[>]/g, "&gt;");
                    inputs.value = inputs.value.replace(/[=]/g, "&equals;");
                }
            </script>
            <div>
            <?php }
            ?>

            <!-- for new questions -->
            <?php
            if ($_GET['action'] == "New") {
                $i = 1;
                $total = 1; ?>
                <title>New Quiz</title>
                <form autocomplete="off" class="m-auto Poppins h-full w-full flex bg-gray-100 flex-col justify-center items-center" autocomplete="off" action="" method="post"> <br><br>


                    <?php if (!isset($_POST['add']) && $_GET['create'] > 0) {
                    ?>
                        <label>Quiz Pin
                            <input value="<?php echo $rowGamepin['gpin']; ?>" id="gamepin" type="number" name="gamepin" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" readonly />
                            <i class="fa fa-refresh ml-3 text-xl motion-safe:hover:animate-spin text-gray-500" onclick="generatePin()"></i>
                        </label><br>
                        <label class="-ml-10 pb-4 border-b-2 border-gray-500"> Quiz Title
                            <input id="gameTitle" name="gametitle" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup="replaceme(gameTitle);document.title=this.value;" required />
                        </label><br>
                        <hr>
                        <?php

                        while ($i <= $_GET['create']) { ?>
                            <br>
                            <input type="number" class="hidden" value="<?php echo $total++; ?>" name="total">
                            <input id="quen<?php echo $i; ?>" min="1" max="20" type="number" name="quen<?php echo $i; ?>" onchange="check()" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" value="<?php echo $i; ?>" required /><br>
                            <input id="question<?php echo $i; ?>" name="question<?php echo $i; ?>" class=" focus:outline-none bg-slate-100 border-2 border-slate-400 focus:border-slate-600 text-center rounded" placeholder="Enter Question" onkeyup='replaceme(question<?php echo $i; ?>)' required /><br>
                            <label>1) <input id="option<?php echo $i; ?>A" name="option<?php echo $i; ?>A" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i; ?>A)' required /></label><br>
                            <label>2) <input id="option<?php echo $i; ?>B" name=" option<?php echo $i; ?>B" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i; ?>B)' required />
                            </label><br>
                            <label>3) <input id="option<?php echo $i; ?>C" name=" option<?php echo $i; ?>C" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i; ?>C)' required />
                            </label><br>
                            <label>4) <input id="option<?php echo $i; ?>D" name=" option<?php echo $i; ?>D" class="focus:outline-none bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded" onkeyup='replaceme(option<?php echo $i; ?>D)' required />
                            </label><br>
                            <select id="select<?php echo $i; ?>" name="select<?php echo $i; ?>" onchange="check()" class="focus:outline-none w-40 bg-slate-200 border-2 border-slate-400 text-sm focus:border-slate-600 text-center rounded" required />
                            <option value="">--Correct Option--</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                            </select>
                            <br>
                            <label>
                                <input type="number" name="correct<?php echo $i; ?>" id="correct<?php echo $i; ?>" onchange="check()" class="w-10 hidden focus:outline-none focus:border-slate-600 border-2 border-slate-400 rounded text-center" readonly /></label><br>
                            <hr>
                        <?php $i++;
                        } ?>
                        <svg part="svg" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" aria-labelledby="icon-add" focusable="false" viewBox="0 0 24 24" class="h-10 icon-primary aspect-video h-icon--no-custom-width"><!---->
                            <g>
                                <path fill="green" clip-rule="evenodd" d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path>
                            </g>
                        </svg>
                        <br>
                        <input type="submit" onclick="check()" name="add" class="px-4 py-2 mx-auto btn btn-info border-2 border-slate-400 hover:text-white focus:bg-cyan-600 focus:text-white  text-slate-400 rounded focus:outline-none" value="Insert Question" /><br><br>

                </form>
            <?php }
                    if (isset($_POST['add'])) {
                        for ($i = 1; $i <= $_GET['create']; $i++) {
                            $total = $_POST['total'];
                            $quen = $_POST["quen" . $i];
                            $quen = mysqli_real_escape_string($con, $quen);
                            $question = $_POST["question" . $i];
                            $question = mysqli_real_escape_string($con, $question);
                            $gamepin = $_POST["gamepin"];
                            $gamepin = mysqli_real_escape_string($con, $gamepin);
                            $gametitle = $_POST["gametitle"];
                            $gametitle = mysqli_real_escape_string($con, $gametitle);
                            $a = $_POST["option" . $i . "A"];
                            $a = mysqli_real_escape_string($con, $a);
                            $b = $_POST["option" . $i . "B"];
                            $b = mysqli_real_escape_string($con, $b);
                            $c = $_POST["option" . $i . "C"];
                            $c = mysqli_real_escape_string($con, $c);
                            $d = $_POST["option" . $i . "D"];
                            $d = mysqli_real_escape_string($con, $d);
                            $correct = $_POST["correct" . $i];
                            $correct = mysqli_real_escape_string($con, $correct);
                            $tmp1 = ($quen - 1) * 4 + 1;
                            $tmp2 = ($quen - 1) * 4 + 2;
                            $tmp3 = ($quen - 1) * 4 + 3;
                            $tmp4 = ($quen - 1) * 4 + 4;
                            $q1 = "INSERT INTO $tbl_que (`qno`,`question`,`correct`,`gamepin`) VALUES ('$quen','$question','$correct','$gamepin');";
                            $q2 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`,`gamepin`) VALUES ('$tmp1','$a','$quen','$gamepin');";
                            $q3 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`,`gamepin`) VALUES ('$tmp2','$b','$quen','$gamepin');";
                            $q4 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`,`gamepin`) VALUES ('$tmp3','$c','$quen','$gamepin');";
                            $q5 = "INSERT INTO $tbl_ans (`ano`,`answer`,`que_no`,`gamepin`) VALUES ('$tmp4','$d','$quen','$gamepin');";
                            $con->query($q1);
                            $con->query($q2);
                            $con->query($q3);
                            $con->query($q4);
                            $con->query($q5);
                        }
                        $q6 = "INSERT INTO gamepins (`title`,`gpin`,`total`,`active`) VALUES ('$gametitle','$gamepin','$total','0');";
                        $insertedNewGame = $con->query($q6);
            ?>
                <h1 class="m-auto w-screen h-screen flex flex-col justify-center items-center text-gray-500  text-center text-2xl Yatra">
                    Inserted <?php echo $quen; ?> Questions.<br><a class="hover:underline" href="./">Please, get back and refresh page before re-entering.</a>
                </h1>
            <?php } ?>

            <script>
                document.ready = generatePin();

                function generatePin() {
                    gamepin.value = Math.floor(1 + Math.random() * 10000);
                }

                function check() {
                    <?php for ($i = 1; $i <= $_GET['create']; $i++) { ?>
                        correct<?php echo $i; ?>.value = parseInt(select<?php echo $i; ?>.value) + 4 * (parseInt(quen<?php echo $i; ?>.value) - 1);
                    <?php } ?>
                }

                function replaceme(inputs) {
                    inputs.value = inputs.value.replace(/["]/g, "&quot;");
                    inputs.value = inputs.value.replace(/[']/g, "&apos;");
                    inputs.value = inputs.value.replace(/[<] /g, "&lt;");
                    inputs.value = inputs.value.replace(/[>]/g, "&gt;");
                    inputs.value = inputs.value.replace(/[=]/g, "&equals;");
                }
            </script>
        <?php } ?>

        <!-- for managing quizes -->
        <?php
        if ($_GET['action'] == "Manage") {
            if (isset($_POST['accessBy'])) {
                $classAccess = $_POST['accessBy'];
                // $q1 = "UPDATE login SET gamepin=NULL WHERE classNumber<>'$classAccess';";
                // $con->query($q1);
                $q2 = "UPDATE login SET gamepin='$gpin';";
                $con->query($q2);
                $q3 = "UPDATE gamepins SET access='1' WHERE gpin='$gpin';";
                $con->query($q3);
            }

            $sql = "SELECT * FROM gamepins WHERE gpin='$gpin';";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($query);
            $title = $row['title'];

        ?>
            <title>Manage | <?php echo $title; ?></title>
            <br>
            <h1 class="text-xl mt-10 mx-auto text-center "> Manage - <b><?php echo $title; ?></b></h1>
            <div class="m-auto Poppins h-full gap-4 mt-40 w-full text-md flex flex-col items-center justify-center m-auto" autocomplete="off" action="" method="post">
                <?php if (isset($_GET['Game'])) { ?><b class="flex items-center ">Quiz pin - <i class="animate-pulse text-2xl text-orange-500"> <?php echo $gpin; ?></i></b><br><?php } ?>
                <!-- <form action="" method="post">
                    <label>Accessed By - <select name="accessBy" onchange='this.form.submit();' class="focus:outline-none w-40 bg-slate-200 border-2 border-slate-400 focus:border-slate-600 text-center rounded">
                            <option value="">---Choose A Class---</option>
                            <option value="1" <?php if ($row['access'] == 1) {
                                                    echo "selected";
                                                } ?>>FY HA</option>
                            <option value="2" <?php if ($row['access'] == 2) {
                                                    echo "selected";
                                                } ?>>FY CO-A</option>
                            <option value="3" <?php if ($row['access'] == 3) {
                                                    echo "selected";
                                                } ?>>FY CO-B</option>
                            <option value="4" <?php if ($row['access'] == 4) {
                                                    echo "selected";
                                                } ?>>FY ME</option>
                            <option value="4" <?php if ($row['access'] == 5) {
                                                    echo "selected";
                                                } ?>>FY CE</option>
                            <option value="4" <?php if ($row['access'] == 6) {
                                                    echo "selected";
                                                } ?>>FY EE</option>
                        </select></label><br>
                </form> -->
                <input type="button" onclick="ranks(<?php echo $gpin; ?>)" class="px-4 py-2 text-green-500 rounded hover:bg-green-500 hover:text-white border-2 border-green-500" value="Open Ranking Page">
                <input type="button" onclick="launch(<?php echo $gpin; ?>)" name="action" class="px-4 py-2 text-blue-600 rounded hover:bg-blue-600 hover:text-white border-2 border-blue-600" value="Launch" />
                <input type="button" onclick="deleteQuiz(<?php echo $gpin; ?>)" class="px-4 py-2 text-red-500 rounded hover:bg-red-500 hover:text-white border-2 border-red-500" value="Delete This Quiz">

            </div>
            <script>
                function ranks(gPin) {
                    location.href = "./?action=Ranks&gpin=" + <?php echo $gpin; ?>;
                }

                function launch(gPin) {
                    location.href = "?action=Launch&gpin=" + <?php echo $gpin; ?>;
                }

                function deleteQuiz(gPin) {
                    let tmp = confirm("Are You Sure To Delete This Page..?");
                    if (tmp == 1) {
                        location.href = "./?action=Delete&gpin=" + <?php echo $gpin; ?>;
                    }
                }
            </script>
        <?php
        } ?>

        <!-- for Ranking page -->
        <?php
        if ($_GET['action'] == "Ranks") { ?>
        <title>Ranking | <?php echo $title; ?> </title>
            <div class="bg-violet-100 h-full min-h-screen ">
                <?php
                $sql = "SELECT * FROM $tbl_usr WHERE gamepin='$gpin';";
                $query = mysqli_query($con, $sql);
                $i = 1;
                $entries = mysqli_num_rows($query);

                if ($entries > 0) {
                ?>

                    <br>
                    <meta http-equiv="Refresh" content="1.5">
                    <h1 class="text-violet-500 text-3xl text-center Laila ">Submitted By</h1><br>
                    <div class="text-lg border-2 border-violet-500 Poppins w-full m-auto lg:w-2/3">
                        <div class="text-center flex items-center justify-evenly">
                            <span class="p-2 m-1 font-bold bg-violet-300 w-full border-2 border-violet-500 rounded">Sr. No.</span>
                            <span class="p-2 m-1 font-bold bg-violet-300 w-full border-2 border-violet-500 rounded">Roll Number</span>
                            <span class="p-2 m-1 font-bold bg-violet-300 w-full border-2 border-violet-500 rounded">Name</span>
                            <span class="p-2 m-1 font-bold bg-violet-300 w-full border-2 border-violet-500 rounded">Class</span>
                        </div>
                        <?php
                        while ($val = mysqli_fetch_assoc($query)) {
                        ?>
                            <div class="text-center flex items-center justify-evenly">
                                <span class="p-2 m-1 font-bold bg-violet-100 w-full border-2 border-violet-500 rounded">
                                    <?php echo $i; ?>
                                </span>

                                <span class="p-2 m-1 font-bold bg-violet-100 w-full border-2 border-violet-500 rounded">
                                    <?php echo $val["username"]; ?>
                                </span>
                                <span class="p-2 m-1 font-bold bg-violet-100 w-full border-2 border-violet-500 rounded">
                                    <?php echo $val["name"]; ?>
                                </span>
                                </span>
                                <span class="p-2 m-1 font-bold bg-violet-100 w-full border-2 border-violet-500 rounded">
                                    <?php echo $val["class"]; ?>
                                </span>
                            </div>

                    <?php
                            $i++;
                        }
                    } else if ($entries == 0) {
                        echo '<div class="h-screen w-full flex bg-black text-white items-center justify-center text-3xl text-center Yatra"><h1>No Entry Yet..!</h1></div><br>';
                    } ?>
                    </div>
            </div>
        <?php } ?>


        <!-- for launching of page -->
        <?php if ($_GET['action'] == "Launch") {
            $q1 = "CREATE TABLE `" . $gpin . "_answers" . "` (`srno` int(11) NOT NULL, `ano` int(11) NOT NULL, `answer` text NOT NULL, `que_no` int(11) NOT NULL, `gamepin` int(15) NOT NULL);";
            $q2 = "CREATE TABLE `" . $gpin . "_question" . "` (`srno` int(11) NOT NULL, `qno` int(11) NOT NULL, `question` text NOT NULL, `correct` int(11) NOT NULL, `gamepin` int(15) NOT NULL)";
            $con->query($q1);
            $con->query($q2);
            $q3 = "INSERT INTO " . $gpin . "_answers" . " SELECT * FROM $tbl_ans WHERE gamepin='$gpin';";
            $con->query($q3);
            $q4 = "INSERT INTO " . $gpin . "_question" . " SELECT * FROM $tbl_que WHERE gamepin='$gpin';";
            $con->query($q4);
            $q5 = "UPDATE gamepins SET active='1' WHERE gpin='$gpin';";
            $con->query($q5);
        ?>
        <title>Launching | <?php echo $title; ?> </title>
        
            <meta http-equiv="Refresh" content="0.1;./?action=Manage&Game=<?php echo $gpin; ?>&gpin=<?php echo $gpin; ?>">
        <?php } ?>

        <!-- for creating new user -->
        <title>Create Users | <?php echo $title; ?></title>
        <?php if ($_GET['action'] == "Create New User") { ?>
            <div class="flex items-center justify-center min-h-screen Gotu bg-gray-100" id="create-user">
                <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
                    <div class="flex items-center justify-center text-4xl text-blue-600 mb-4 fa fa-user-plus"></div>
                    <h3 class="text-2xl font-bold text-center text-blue-600">Create New User</h3>
                    <form action="" method="GET">
                        <div class="mt-4">
                            <div class="flex">
                                <input type="text" required name="name" placeholder="Enter Name" class="w-full px-4 py-2 mt-2 focus:border-0 border focus:border-0 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                            </div>
                            <div class="mt-4">
                                <input type="number" name="regid" placeholder="Registration ID" class="w-full px-4 py-2 mt-2 focus:border-0 border focus:border-0 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                            </div><br>
                            <select id="class" name="classNumber" class="m-auto flex items-center justify-center w-full focus:outline-none w-40 border-blue-600 border text-center rounded" required />
                            <option value="">--Select Class--</option>
                            <option value="1">FY HA</option>
                            <option value="2">FY CO-A</option>
                            <option value="3">FY CO-B</option>
                            <option value="4">FY ME</option>
                            <option value="5">FY CE</option>
                            <option value="6">FY EE</option>
                            </select>
                            <div class="flex items-baseline justify-between">
                                <input type="submit" name="createUser" class="px-6 py-2 mt-4 text-blue-600 rounded hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:outline-none focus:text-white border-2 border-blue-600 m-auto" value="Create" required />

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>

        <!-- for total users  -->
        <title>Total Users | <?php echo $title; ?> </title>
        <?php if ($_GET['action'] == "Total Users") { ?>
            <br>
            <h1 class="text-sky-500 text-3xl text-center Laila">Total Students</h1><br>
            <div class="text-lg border-2 border-slate-500 Poppins w-full m-auto lg:w-2/3">
                <div class="text-center flex items-center justify-evenly">
                    <span class="p-2 m-1 font-bold bg-sky-300 w-full border-2 border-slate-500 rounded">Sr. No.</span>
                    <span class="p-2 m-1 font-bold bg-sky-300 w-full border-2 border-slate-500 rounded">Roll Number</span>
                    <span class="p-2 m-1 font-bold bg-sky-300 w-full border-2 border-slate-500 rounded">Name</span>
                    <span class="p-2 m-1 font-bold bg-sky-300 w-full border-2 border-slate-500 rounded">Class</span>
                </div>
                <?php
                $sql = "SELECT * FROM $tbl_login";
                $query = mysqli_query($con, $sql);
                $i = 1;
                $entries = mysqli_num_rows($query);
                if ($entries > 0) {
                    while ($val = mysqli_fetch_assoc($query)) {
                ?>
                        <div class="text-center flex items-center justify-evenly">
                            <span class="p-2 m-1 font-bold w-full border-2 border-slate-500 rounded">
                                <?php echo $val['sno']; ?>
                            </span>

                            <span class="p-2 m-1 font-bold w-full border-2 border-slate-500 rounded">
                                <?php echo $val["username"]; ?>
                            </span>
                            <span class="p-2 m-1 font-bold w-full border-2 border-slate-500 rounded">
                                <?php echo $val["name"]; ?>
                            </span>
                            </span>
                            <span class="p-2 m-1 font-bold w-full border-2 border-slate-500 rounded">
                                <?php echo $val["class"]; ?>
                            </span>
                        </div>
                <?php
                        $i++;
                    }
                } ?>
            </div>
    <?php }
    }  ?>
    <?php
    if (isset($_GET['createUser'])) {
        $name = $_GET['name'];
        $regid = $_GET['regid'];
        $classNo = $_GET['classNumber'];
        if ($classNo == 1) {
            $class = "FY HA";
        } else if ($classNo == 2) {
            $class = "FY CO-A";
        } else if ($classNo == 3) {
            $class = "FY CO-B";
        } else if ($classNo == 4) {
            $class = "FY ME";
        }
        else if ($classNo == 5) {
            $class = "FY CE";
        }
        else if ($classNo == 6) {
            $class = "FY EE";
        }


        $query1 = "INSERT INTO $tbl_login (`name`,`username`,`classNumber`,`class`) VALUES('$name','$regid','$classNo','$class')";
        $result = $con->query($query1);
        if ($result)
            echo "<script>alert('User Created.!'); location.href = './';</script>";
    }
    ?>
            </div>


</body>