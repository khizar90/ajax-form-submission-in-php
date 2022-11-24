<?php

class AjaxForm{
	public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "testing";
    public $conn;
	public function __construct(){
        $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->db_name) or die("connection faield");
        if (mysqli_connect_errno($this->conn)){
             echo "Failed to connect to MySQL:" . mysqli_connect_error();
            }
    }
	public function insertData(){
		if(isset($_POST["fullname"]) && isset($_POST["age"]) && isset($_POST["gender"]) && isset($_POST["country"])){

			$name = $_POST['fullname'];
			$age = $_POST['age'];
			$gender = $_POST['gender'];
			$country = $_POST['country'];
		
			$sql = "INSERT INTO ajax_form(name, age, gender, country) VALUES ('{$name}', $age, '{$gender}', '{$country}')";
		
			if(mysqli_query($this->conn, $sql)){
				echo "Hello {$name} your record is saved.";
			}else{
				echo "Can't save form data.";
			}
		
		}else{
			echo "Must filled all form fields.";
		}

	}
}
$new = new AjaxForm();
$new->insertData();




?>
