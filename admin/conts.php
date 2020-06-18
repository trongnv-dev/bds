<style>
<!--
#foot {
	clear: both;
	float: none;
	height: auto;
	width: 100%;
	text-align: center;
	font-size: 12px;
	color: #FFF;
	padding-top: 20px;
	padding-bottom: 20px;
	border-top-width: 3px;
	border-top-style: solid;
	border-top-color: #CCC;
}
#foot .copy {
	font-size: 14px;
	font-weight: bold;
	color: #FFF;
}
#foot .leminh {
	font-size: 12px;
	font-weight: bold;
	color: #FF0;
}
#foot .leminh a{
	font-size: 12px;
	font-weight: bold;
	color: #FF0;
	text-decoration: none;
}
#foot .leminh a:hover{
	color: #FFF;
	text-decoration: underline;
}
-->
</style>
<div id="foot">
	<?php 
		$foot=get_records("tbl_config","id=1"," "," "," ");
		$row_foot=mysql_fetch_assoc($foot);
	?>	
  <span class="copy">BDSTPHCM</span><br />
        <strong>Địa chỉ :</strong>778/56. Thống Nhất, Phường 15, Gò Vâp. TP HCM<br />
</div><!--foot -->