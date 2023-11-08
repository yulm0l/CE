<?php 
 include("../../../conn.php");


extract($_POST);

$deleteUser = $conn->query("DELETE  FROM examinee_tbl WHERE exmne_id='$id'  ");
if($deleteUser)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}


	echo json_encode($res);
 ?>
<script type="text/javascript" src="js/ajax.js"></script>
