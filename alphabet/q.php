<?php 
if(isset($_POST['data'])){
    $arr=json_decode($_POST['data'], true);
    $dd='mysql:host=localhost;dbname=sandra';
    $user='root';
    $password='';
	$db=new PDO($dd,$user,$password);
    foreach($arr as $key =>$value)
    {
	   $q="INSERT into store VALUES ('$key', '$value')";
	   $db->exec($q);
	}
}

else if(isset($_GET['data']))
{
    $dd='mysql:host=localhost;dbname=sandra';
    $user='root';
    $password='';
	$db=new PDO($dd,$user,$password);
	$q="select * from store where 1";
	$res=$db->query($q);
	while($row=$res->fetch(PDO::FETCH_ASSOC)){
		echo $row['k']."   ".$row['v']."\n";
	}
	$q="DELETE FROM `store` WHERE 1";
    $db->exec($q);
}
else 
{
    echo "couldn't connect the data base";
}
?>