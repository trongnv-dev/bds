<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
		if(userPermissEdit($row_tbl_users['listEdit'],13,1)!=true) header("location: admin.php");
	}
}else{
	header("location:admin.php");
}

if (isset($_POST['tim'])==true)//isset kiem tra submit
{
	if($_POST['tukhoa']!=NULL){$tukhoa=$_POST['tukhoa'];}else {$tukhoa="";};
	if($tukhoa=="Từ khóa...") $tukhoa="";
	$_SESSION['kt_tukhoa_bignew']=$tukhoa;
	$tukhoa = trim(strip_tags($tukhoa));
	if (get_magic_quotes_gpc()==false) 
	{
		$tukhoa = mysql_real_escape_string($tukhoa);
	}
	
	if($_POST['ddCat']!=NULL){$parent=$_POST['ddCat'];}else {$parent=-1;}
	$_SESSION['kt_parent_bignew']=$parent;
	
	if($_POST['ddCatch']!=NULL){$parent1=$_POST['ddCatch'];}else {$parent1=-1;}
	$_SESSION['kt_ddCatch_bignew']=$parent1;
	
 
	
		
}

if (isset($_POST['reset'])==true) {

	$_SESSION['kt_tukhoa_bignew']="";
	$_SESSION['kt_parent_bignew']=-1;
	$_SESSION['kt_ddCatch_bignew']=-1; 
	
}
if($_SESSION['kt_tukhoa_bignew']==NULL){$tukhoa="";}
if($_SESSION['kt_tukhoa_bignew']!=NULL){$tukhoa=$_SESSION['kt_tukhoa_bignew'];}
if($_SESSION['kt_parent_bignew']==NULL){$parent=-1;}
if($_SESSION['kt_parent_bignew']!=NULL){$parent=$_SESSION['kt_parent_bignew'];}

if($_SESSION['kt_ddCatch_bignew']==NULL){$parent1=-1;}
if($_SESSION['kt_ddCatch_bignew']!=NULL){$parent1=$_SESSION['kt_ddCatch_bignew'];}

if($_GET['anhien']==NULL){$anhien=-1;$_SESSION['kt_anhien']=$anhien;}
if($_GET['anhien']!=NULL){$anhien=$_GET['anhien'];$_SESSION['kt_anhien']=$anhien;}
settype($anhien,"int");

if($_GET['tang']==NULL){$tang=-1;$_SESSION['kt_tang']=$tang;}
if($_GET['tang']!=NULL){$tang=$_GET['tang'];$_SESSION['kt_tang']=$tang;}
settype($tang,"int");

if($_GET['noibat']==NULL){$noibat=-1;$_SESSION['kt_noibat']=$noibat;}
if($_GET['noibat']!=NULL){$noibat=$_GET['noibat'];$_SESSION['kt_noibat']=$noibat;}
settype($noibat,"int");
 
if($tang==0){$ks='ASC';}//0 tang
elseif($tang==1){$ks='DESC';}//1 giam
else $ks='DESC';
?>
<script>
$(document).ready(function() {	  
		//dao trang thai an hien
	<?php 
if(userPermissEdit($row_tbl_users['listEdit'],13,7 )==true  ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1){
?>
	$("img.anhien").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=tbl_quanhuyen_category' +'&type=1&cate=13',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/anhien_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
	$("img.bando").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=tbl_quanhuyen_category' +'&type=999&cate=13',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/anhien_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
<?php }?>
	
<?php 
if(userPermissEdit($row_tbl_users['listEdit'],13,6)==true ||  $_SESSION['kt_login_level']==4 ||  $_SESSION['kt_login_level']==-1 ){
?>
	$("img.hot").click(function(){

	id=$(this).attr("value");

	obj = this;

		$.ajax({

		   url:'field.php',

		   data: 'id='+ id +'&table=tbl_quanhuyen_category' +'&type=2&cate=13',

		   cache: false,

		   success: function(data){ //alert(idvnexpres);

			obj.src=data;

			if (data=="images/noibat_1.png") obj.title="Nhắp vào để ẩn";

			else obj.title="Nhắp vào để hiện";

		  }

		});

	});
<?php }?>
	
	$("#chkall").click(function(){
		var status=this.checked;
		$("input[class='tai_c']").each(function(){this.checked=status;})
	});
	
});
</script>
<script>
$(document).ready(function() {
	$("#ddCat").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_quanhuyen_category";
		$("#ddCatch").load("getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
});
</script>
<?php
	if( $errMsg !=""){ 
?>
<div class="alert alert-block no-radius fade in">
    <button type="button" class="close" data-dismiss="alert"><span class="mini-icon cross_c"></span></button>
    <h4>Warning!</h4>
     <? $errMsg =''?>
</div>
<?php }?>
<div class="row-fluid">
    <div class="span12">
        <div class="box-widget">
             
            <div class="widget-container">
                <div class="widget-block">
                    
                    
				<?
				 if(userPermissEdit($row_tbl_users['listEdit'],13,4)==true ||  $_SESSION['kt_login_level']==4  ||   $_SESSION['kt_login_level']==-1  ){
					switch ($_GET['action']){
						case 'del' :
							$id = $_GET['id'];
							$r = getRecord("tbl_quanhuyen_category","id=".$id);
							$resultParent = mysql_query("select id from tbl_quanhuyen_category where parent='".$id."'",$conn);
							if (mysql_num_rows($resultParent) <= 0){
								@$result = mysql_query("delete from tbl_quanhuyen_category where id='".$id."'",$conn);
								if ($result){
									if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
									if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
									$errMsg = "Đã xóa thành công.";
								}else $errMsg = "Không thể xóa dữ liệu !";
							}else{
								$errMsg = "Đang có danh mục sử dụng. Bạn không thể xóa !";	
							}
							break;
					}
					
					if (isset($_POST['btnDel'])){
						$cntDel=0;
						$cntNotDel=0;
						$cntParentExist=0;
						if($_POST['chk']!=''){
							foreach ($_POST['chk'] as $id){
								$r = getRecord("tbl_quanhuyen_category","id=".$id);
								$resultParent = mysql_query("select id from tbl_quanhuyen_category where parent='".$id."'",$conn);
								if (mysql_num_rows($resultParent) <= 0){
									@$result = mysql_query("delete from tbl_quanhuyen_category where id='".$id."'",$conn);
									if ($result){
										if(file_exists('../'.$r['image'])) @unlink('../'.$r['image']);
										if(file_exists('../'.$r['image_large'])) @unlink('../'.$r['image_large']);
										$cntDel++;
									}else $cntNotDel++;
								}else{
									$cntParentExist++;
								}
							}
							$errMsg = "Đã xóa ".$cntDel." phần tử.<br><br>";
							$errMsg .= $cntNotDel>0 ? "Không thể xóa ".$cntNotDel." phần tử.<br>" : '';
							$errMsg .= $cntParentExist>0 ? "Đang có danh mục con sử dụng ".$cntParentExist." phần tử." : '';
						}else{
							$errMsg = "Hãy chọn trước khi xóa !";
						}
					}
				 }
				$pageSize = 50;
				$pageNum = 1;
				$totalRows = 0;
				
				if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
				if ($pageNum<=0) $pageNum=1;
				$startRow = ($pageNum-1) * $pageSize;
			
                if($parent!=-1 || $parent1!=-1) {
						if($parent1!='-1') $parenstrt="$parent1";
						else $parenstrt=getParent("tbl_quanhuyen_category",$parent);
						$where="1=1   and (id='{$tukhoa}' or name LIKE '%$tukhoa%' or '{$tukhoa}'=-1) and  ( parent in ({$parenstrt}) or id=$parent)";
					}
                    else $where="1=1    and (id='{$tukhoa}' or name LIKE '%$tukhoa%' or '{$tukhoa}'=-1)";
					
					$where.=" AND ( status='{$anhien}' or '{$anhien}'=-1)  AND ( hot='{$noibat}' or '{$noibat}'=-1)";
				
                $MAXPAGE=1;
				$totalRows=countRecord("tbl_quanhuyen_category",$where);
				
                if ($_REQUEST['cat']!='') $where="parent=".$_REQUEST['cat']; ?>
                <form method="POST" action="#" name="frmForm" enctype="multipart/form-data">
                <input type="hidden" name="page" value="<?=$page?>">
                <input type="hidden" name="act" value="quanhuyen_category">
                <?
               // $pageindex = createPage(countRecord("tbl_quanhuyen_category",$where),"./?act=quanhuyen_category&cat=".$_REQUEST['cat']."&page=",$MAXPAGE,$page)?>
                
                <? if ($_REQUEST['code']==1) $errMsg = 'Cập nhật thành công.'?>
  
                    <table width="100%"  class="admin_table">

                            <thead>
    
                                <tr align="center" >
                                  <td valign="middle"  colspan="9">
                                    <center>
                                        <div class="table_chu_tieude">
                                        <strong>TỈNH THÀNH PHỐ</strong>
                                        </div>
                                    </center>
                                   </td>
                                </tr>
                                <tr align="center" >
                                  <td valign="middle" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="9">  
                                  		<? //comboCategory('ddCat',getArrayCategory('tbl_quanhuyen_category'),'list_tim_loc',$parent,1)?>
                                  		<input class="table_khungnho"  name="tukhoa" id="tukhoa" type="text" value="<?=$tukhoa?>"  placeholder="Từ khóa" />
                                        <input name="tim" type="submit" class="nut_table" id="tim" value="Tìm kiếm"/>
                                        <input type="submit" name="reset" class="nut_table" value="Reset" title=" Reset " />
                                 
                                  
                                  </td>
                                </tr>
                                <tr >
                                  <td valign="middle" align="left" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="9"> 
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($noibat==0  &&  $anhien==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=quanhuyen_category&tang=1&anhien=-1&noibat=-1">Tất cả</a>
                                        </div>
                                        <div class="link_loc" style="width:80px; text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($tang==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>" >
                                        	<a href="admin.php?act=quanhuyen_category&tang=1&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=<?php echo $_SESSION['kt_noibat']?>">Tăng dần</a>
                                        </div>
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($tang==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=quanhuyen_category&tang=0&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=<?php echo $_SESSION['kt_noibat']?>">Giảm dần</a>
                                        </div>
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($anhien==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=quanhuyen_category&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=1&noibat=<?php echo $_SESSION['kt_noibat'] ?>"> Ẩn </a>
                                        </div>
                                         <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($anhien==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=quanhuyen_category&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=0&&noibat=<?php echo $_SESSION['kt_noibat'] ?>">Hiện</a>
                                        </div>
                                        <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($noibat==1) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=quanhuyen_category&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=1">Nổi bật</a>
                                        </div>
                                         <div class="link_loc" style="width:80px;text-align:center; padding:3px; border:solid 1px #999; float:left; margin-right:5px;<?php if($noibat==0) echo 'background-color:#FF0; color:#000;';else echo 'background-color:#FFF; color:#FFF;"';?>">
                                        	<a href="admin.php?act=quanhuyen_category&tang=<?php echo $_SESSION['kt_tang'] ?>&anhien=<?php echo $_SESSION['kt_anhien'] ?>&noibat=0">ko nổi bật</a>
                                        </div>
                                  </td>
                                </tr>
                               <tr>
                                  <td align="center" colspan="2">
                                   <? if(userPermissEdit($row_tbl_users['listEdit'],13,4)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                  <input type="submit" value="Xóa chọn" name="btnDel" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');" class="button">
                                  <? } ?>
                                  </td>
                                  <td align="center" class="PageNum" colspan="5" height="30">
                                    	<?php echo pagesListLimit($totalRows,$pageSize);?>   
                                  </td>
                                  
                                 <td width="81" align="center" colspan="1">
                                 <? if(userPermissEdit($row_tbl_users['listEdit'],13,2)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                  <div><a href="admin.php?act=quanhuyen_category_m">
                                  <img width="48" height="48" border="0" src="images/them.png">
                                  </a></div>
                                  <? } ?>
                                  </td>
                                </tr>
                                <tr class="admin_tieude_table">
                                <td align="center">
                                    <input name="chkall" id="chkall" type="checkbox"   onClick="chkallClick(this);"/>
                                </td>
                                <td align="center">
                                    STT
                                </td>
                                <td align="center"><span class="title"><a class="title" href="<?=getLinkSort(3)?>">Tên danh mục</a></span></td>
                                <td align="center"><a class="title" href="<?=getLinkSort(10)?>">Thứ tự sắp xếp</a></td>
                                <td align="center"><a class="title" href="<?=getLinkSort(15)?>">Tiêu biểu</a></td>
                                <td align="center"><span class="title"><a class="title" href="<?=getLinkSort(11)?>">Không hiển thị</a></span></td>
                                <td align="center"><a class="title" href="<?=getLinkSort(12)?>">Ngày tạo lập</a></td>
								<td align="center"><a class="title" href="<?=getLinkSort(19)?>">Bản đồ</a></td>
                                <td align="center">
                                    Công cụ
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                        <?
						$sortby="order by id $ks";
						if ($_REQUEST['sortby']!='') $sortby="order by ".(int)$_REQUEST['sortby'];
						$direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?"desc":"");
						
					    $sql="select *,DATE_FORMAT(date_added,'%d/%m/%Y %h:%i') as dateAdd,DATE_FORMAT(last_modified,'%d/%m/%Y %h:%i') as dateModify from tbl_quanhuyen_category where   $where $sortby   limit ".($startRow).",".$pageSize;
						$result=mysql_query($sql,$conn);
						$i=0;
						while($row=mysql_fetch_array($result)){
						$parent = getRecord('tbl_quanhuyen_category','id = '.$row['parent']);
						$color = $i++%2 ? "#d5d5d5" : "#e5e5e5";
						?>
                            <tr>
                                <td align="center">
                                    <input type="checkbox" name="chk[]" value="<?=$row['id']?>"  class="tai_c" />
                                </td>
                                <td align="center">
                                    <?=$row['id']?>
                                </td>
                                <td align="center">
                                    <?=$row['name']?>
                                </td>
                                <td align="center">
                                    <?=$row['sort']?>
                                </td>
                                <td align="center"><span class="smallfont"><img src="images/noibat_<?=$row['hot']?>.png" alt="" width="25" height="25" class="hot" title="Tiêu biểu" value="<?=$row['id']?>" /></span></td>
                                <td align="center"><span class="smallfont"><img src="images/anhien_<?=$row['status']?>.png" width="25" height="25" class="anhien" title="Ẩn hiện" value="<?=$row['id']?>" /></span></td>
                                <td align="center">
                                    <?=$row['dateAdd']?>
                                </td>  
								 <td align="center"><span class="smallfont"><img src="images/anhien_<?=$row['bando']?>.png" width="25" height="25" class="bando" title="Ẩn hiện" value="<?=$row['id']?>" /></span></td>	
                                <td align="center">
                                <? if(userPermissEdit($row_tbl_users['listEdit'],13,3)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                    <a href="admin.php?act=quanhuyen_category_m&cat=<?=$_REQUEST['cat']?>&page=<?=$_REQUEST['page']?>&id=<?=$row['id']?>"><img src="images/icon3.png"/></a>
                                <? }?>
                                <? if(userPermissEdit($row_tbl_users['listEdit'],13,4)==true ||  $_SESSION['kt_login_level']==4 ||   $_SESSION['kt_login_level']==-1 ){?>
                                    <a  title="Xóa" href="admin.php?act=quanhuyen_category&action=del&page=<?=$_REQUEST['page']?>&id=<?=$row['id']?>" onclick="return confirm('Bạn có muốn xoá luôn không ?');" ><img src="images/icon4.png" width="20" border="0" /></a>
                                <? } ?>
                                </td>
                            </tr>
                         <?php }?> 
                          <tr>
                              <td  class="PageNext" colspan="9" align="center" valign="middle">
							  <div style="padding:5px;">
							  <?php echo pagesLinks($totalRows,$pageSize);// Trang đầu,  Trang kế, tang trước, trang cuối ??>
                              </div>
                              </td>  							  
                            </tr>
                            
                        </tbody>
                         
                        
                    </table>
                 
                 	 
				</form>
                
             
                </div>
            </div>
        </div>
    </div>
</div>