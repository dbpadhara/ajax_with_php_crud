<?php

$con=mysqli_connect('localhost','root','','mydb');
		if(!$con){
			die("connection aborted");
		}
		else{
		//	echo "connection success<br>";
		}

$action=$_REQUEST['action'];

switch ($action) {
	case 'getdata':
		$json = array();
		$table_name=$_GET["model"];
		$json=array();
		$qry="select * from $table_name";

		$data="";
		if($result=mysqli_query($con,$qry)){

			if(mysqli_num_rows($result)>0){
				
				// echo json_encode(mysqli_fetch_assoc($result);
				while ($row=mysqli_fetch_array($result)) {
					// $data+=$row;
					// echo $row;
					$json["data"][]=$row;
				}
			}
		}
	// $myjson = json_encode($json);
	echo json_encode($json);
		break;
	case 'add_data':

		$id = $_POST['userid'];
		$username = $_POST['username'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if($id==0){
			$qry = "insert into user_table(uname,unumber,email,password) values('$username',$number,'$email','$password')";	
		}
		else{
			$qry = "update user_table set uname='$username',unumber=$number,email='$email',password='$password' where uid=$id";
		}

		if(mysqli_query($con,$qry)){
			echo json_encode("true");
		}else{
			echo json_encode("false");
		}

		break;

	case 'deleteData':
		$id = $_POST['id'];

		$qry = "delete from user_table where uid=$id";

		if(mysqli_query($con,$qry)){
			echo json_encode("true");
		}else{
			echo json_encode("false");
		}
		break;	
		
	default:
		echo "can't perform any method";
		break;
}




	 		

?>