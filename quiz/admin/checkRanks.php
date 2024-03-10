<?php
require '../imp.php';
if (isset($_GET['gpin'])) {
    $gpin = $_GET['gpin'];
    $sql = "SELECT * FROM gamepins WHERE gpin='$gpin';";
    $result = mysqli_query($con, $sql);
    $records = mysqli_num_rows($result);
    $i = 1;
    if ($records > 0) {
        while ($rowGamepin = mysqli_fetch_assoc($result)) {
            $title = $rowGamepin['title'];
        }
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="../../css/fonts.css" />
    <title>Ranks | <?php echo $title; ?></title>
    <script src="../../js/index.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="icon" type="image/x-icon" href="../../img/logo.jpeg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<?php
if (isset($_GET['gpin'])) {
    $gpin = $_GET['gpin'];
    $sql = "SELECT * FROM gamepins WHERE gpin='$gpin';";
    $result = mysqli_query($con, $sql);
    $records = mysqli_num_rows($result);
    if ($records > 0) {
        while ($rowGamepin = mysqli_fetch_assoc($result)) {
            $title = $rowGamepin['title'];
        }
    }
}

$sql = "SELECT * FROM $tbl_usr WHERE gamepin='$gpin' ORDER BY marks DESC ;";
$query = mysqli_query($con, $sql);
$entries = mysqli_num_rows($query);
if ($entries > 0) {
    $val = mysqli_fetch_assoc($query);
    $rank1_rollno = $val["username"];
    $rank1_name = $val["name"];
    $rank1_marks = $val["marks"];
    $val = mysqli_fetch_assoc($query);
    $rank2_rollno = $val["username"];
    $rank2_name = $val["name"];
    $rank2_marks = $val["marks"];
    $val = mysqli_fetch_assoc($query);
    $rank3_rollno = $val["username"];
    $rank3_name = $val["name"];
    $rank3_marks = $val["marks"];
}
?>


<p align="center" class="Yatra text-center text-black"> || श्रीराम ||</p>
<div class="fixed text-white flex w-full h-screen bg-teal-900 relative Yatra">
    <div class="relative top-12 m-auto text-center flex flex-col items-center ">
        <img id="rank2img" src="../../img/2nd.png" alt="" srcset="" class="opacity-20 h-60 aspect-square w-60">
        <span id="rank2Name" class="text-center text-4xl"></span>
        <span id="rank2Rollno" class="text-center text-3xl"></span>
    </div>
    <div class="relative -top-4 m-auto text-center flex flex-col items-center">
        <img id="rank1img" src="../../img/1st.png" alt="" srcset="" class="opacity-20 h-96 aspect-square w-96">
        <span id="rank1Name" class="text-center text-4xl"></span>
        <span id="rank1Rollno" class="text-center text-3xl"></span>
    </div>
    <div class="relative top-16 m-auto text-center flex flex-col items-center ">
        <img  id="rank3img" src="../../img/3rd.png" alt="" srcset="" class="opacity-20 h-52 aspect-square w-52">
        <span id="rank3Name" class="text-center text-4xl"></span>
        <span id="rank3Rollno" class="text-center text-3xl"></span>
    </div>
</div>
<div class="relative bottom-20 Laila flex justify-center items-center "><button id="showNM" class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded" onclick="showName(number--);">Show 3rd Rank </button></div>
<script>
    let number = 3;
    function showName(number) {
        if (number == 1) {
            rank1Name.innerHTML = "<?php echo $rank1_name; ?>";
            rank1Rollno.innerHTML = "<?php echo $rank1_rollno; ?>";
            rank1img.style.opacity = 90;
            rank1img.style.transform = "scale(150%,150%)";
            rank2img.style.transform = "scale(100%,100%)";
            rank3img.style.transform = "scale(100%,100%)";
            rank1img.style.transition = "all 2s";
            showNM.remove();
        } else if (number == 2) {
            rank2Name.innerHTML = "<?php echo $rank2_name; ?>";
            rank2Rollno.innerHTML = "<?php echo $rank2_rollno; ?>";
            rank2img.style.opacity = 90;
            rank2img.style.transform = "scale(150%,150%)";
            rank1img.style.transform = "scale(100%,100%)";
            rank3img.style.transform = "scale(100%,100%)";
            showNM.innerHTML = "Show 1st Rank";
            rank2img.style.transition = "all 2s";
        } else if (number == 3) {
            rank3Name.innerHTML = "<?php echo $rank3_name; ?>";
            rank3Rollno.innerHTML = "<?php echo $rank3_rollno; ?>";
            rank3img.style.opacity = 90;
            rank3img.style.transform = "scale(130%,130%)";
            rank2img.style.transform = "scale(100%,100%)";
            rank1img.style.transform = "scale(100%,100%)";
            showNM.innerHTML = "Show 2nd Rank";
            rank3img.style.transition = "all 2s";
        }
    }
</script>