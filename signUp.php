<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (empty($_POST["id"]) || empty($_POST["pw"])) 
{
    echo "아이디 또는 패스워드를 입력해주세요";
    die();
}

$searchId = $_POST["id"];
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

foreach ($arr as $key => $value){
    $id_value = trim($key);
    if (strcmp($id_value, $searchId) == 0 && strlen($id_value) == strlen($searchId)) {
        echo "이미 존재하는 아이디가 있습니다";
        die();
    }
}


$data = new Info();
$data->id = $_POST["id"];
$data->passwd = $_POST["pw"];
$data->signUp();
$dir = "./data/".$data->id;
if (! is_dir($dir)) {
    mkdir($dir);
    chmod($dir, 0777);
}
$file_dir = "./data/".$data->id."/";
fopen($file_dir."family.txt", "a+");
fopen($file_dir."exercise.txt", "a+");
fopen($file_dir."trip.txt", "a+");
fopen($file_dir."school.txt", "a+");
echo "성공적으로 저장되었습니다.";

class Info 
{
    public $file, $id, $passwd;

    function signUp() {
        $file = fopen("data/person.txt", "a+") or die("Unable to open file!");
        fwrite($file, $this->id);
        fwrite($file, "/");
        fwrite($file, $this->passwd);
        fwrite($file, "\n");
        fclose($file);
    }
}

?>