<?php
	require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
?>
 
<?php
	$id=$_GET['id'];	
	$lati=$_GET['mlat'];
	$long=$_GET['mlong'];
	$radius=$_GET['mradius'];
	$radius1=$radius/1000;
	$query = mysql_query("SELECT *,( 6371 * acos( cos( radians({$lati}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$long}) ) + sin( 	radians({$lati}) ) * sin( radians( `latitude` ) ) ) ) AS distance
		FROM `tbl_rv_item` WHERE id <>  {$id}
		HAVING distance <= {$radius1}
		ORDER BY distance ASC
		");  
	$total=mysql_num_rows($query);
	
	$i=1;
	$place=array();
	$place['total']=$total;
	$place['markers']=array();
	$i=0;
	while($row = mysql_fetch_assoc($query))
	{
		
		$place['markers'][]=array('id'=>$row['id'],'subject'=>$row['subject'],'title'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude'],'icon'=>"place_7.png",'content'=>$row['content'],'image'=>$row['image'],'price'=>$row['price'].value_unit($row['donvi'])."/".dientich($row['dientich']),'tongdtsudung'=>$row['tongdtsudung'],'loai'=>get_field('tbl_rv_category','id',$row['parent'],'name'));
		$i++;
	}
	//print_r($place);
	print_r(json_encode($place));
?>
 
 