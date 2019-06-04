<?php

session_start();
$id = $_SESSION['id'];

$dir = "./data/".$id."/";

function showData($fileName) {
    $file = fopen($fileName, "r");

    while(!feof($file)) {
        $line = fgets($file);
        if ($line != "") {
            $splitData = explode('|', $line);
            echo "<li>".$splitData[0]." (".$splitData[1]."~".$splitData[2].")</li>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>ToDoList</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="contents">
        <Button id="openAdd">추가</Button>
        <Button id="openSearch">검색</Button>
        <br><br>
        <table id="todotable">
            <tr>
                <th class="redth">가족</th>
                <th class="blueth">학교</th>
            </tr>
            <tr>
                <td id="family_data">
                    <?php
                        $dataPath = "./data/".$id."/family.txt";
                        showData($dataPath);
                    ?>
                </td>
                <td id="school_data">
                    <?php
                        $dataPath = "./data/".$id."/school.txt";
                        showData($dataPath);
                    ?>
                </td>
            </tr>
            <tr>
                <th class="redth">여행</th>
                <th class="blueth">운동</th>
            </tr>
            <tr>
                <td id="trip_data">
                    <?php
                        $dataPath = "./data/".$id."/school.txt";
                        showData($dataPath);
                    ?>
                </td>
                <td id="exercise_data">
                    <?php
                        $dataPath = "./data/".$id."/school.txt";
                        showData($dataPath);
                    ?>
                </td>
            </tr>
        </table>   
        <div id="myModal-Add" class="modal">
            <div class="modal-content">
                <form action="addList.php" method="POST">
                    할 일 분류 : 
                    <select name="group">
                        <option value="family">가족</option>
                        <option value="school">학교</option>
                        <option value="trip">여행</option>
                        <option value="exercise">운동</option>
                    </select>
                    <br><br>
                    메모 : <input type="text" name="memo"><br><br>
                    시작 날짜 : <input type="date" name="startDate"><br><br>
                    끝나는 날짜 : <input type="date" name="endDate"><br><br>
                    <input type="submit">
                    <Button id="close-button">Close</Button>
                </form>
            </div>
        </div>  
        </div> 
        <script src="main.js"></script>  
    </body>
</html>