<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (empty($_POST["id"])) 
{
    echo "아이디를 입력해주세요";
    die();
} else if (empty($_POST["pw"])) {
    echo "비밀번호를 입력해주세요";
    die();
}

$searchId = $_POST["id"];
$searchPw = $_POST["pw"];
$file = fopen("data/person.txt", "r");

$arr = array();

while(!feof($file)) {
    $line = fgets($file);
    $arrLine = explode('/', $line);
    if (! isset($arrLine[1])) {
        $arrLine[1] = null;
    }
    $arr[$arrLine[0]] = $arrLine[1];
}

$len = 0;
foreach ($arr as $key => $value){
    $id_value = trim($key);
    $pw_value = trim($value);
    if (strcmp($id_value, $searchId) == 0 && strlen($id_value) == strlen($searchId)) {
        if (strcmp($pw_value, $searchPw) == 0 && strlen($pw_value) == strlen($searchPw)) {
            $_SESSION['id'] = $id_value;
            Header("Location: ./main.php"); 
        } else {
            echo "패스워드가 틀립니다";
            die();
        }
    } 
    $len = $len + 1;
}

if ($len == count($arr)) {
    echo "존재하지 않는 아이디 입니다";
    die();
}

?>