<div class="block_sb">
    <h4 class="t_sb">
        <span>
          XEM BẢN ĐỒ QUY HOẠCH
        </span>
    </h4><!-- End .t_sb -->
    <div class="m_sb">
    
        <div class="slx_ttp">
            <style type="text/css">
                .slx_ttp {background: #FCFCFC; padding: 10px;}
                .slx_ttp span.customSelect {background-color: #fff !important;}
				.styled {
					background: none repeat scroll 0 0 #f9f9f9;
					border: 1px solid #ddd;
					padding: 2px;
					margin:2px 0 2px 0;
				}
				ul.bando_quyhoach {
					float: left;
					width: 100%;
				}

				ul.bando_quyhoach li {
					float: left;
					margin-right: 10px;
					min-width: 22%;
				}
				div#view_bando {
					float: left;
					width: 100%;
					text-align: center;
					margin-top: 10px;
				}

				div#view_bando img {
					float: left;
					width: 100%;
				}
				footer#footer {
    float: left;
    width: 100%;
}
            </style>
			  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"></script>
      <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	
            <script>
			var map;
			$(document).ready(function() {
				//set	
					
				$("#tinh").select2();$("#huyen").select2();$("#phuong").select2();$("#duong").select2(); 
				$("#loai").select2();$("#ddCat").select2();
				$("#tinh").select2();$("#huyen").select2();$("#phuong").select2();$("#duong").select2(); 
				$("#loai").select2();$("#ddCat").select2(); $("#price").select2(); $("#dientich").select2(); 
				
				
				$('#tinh').val('ho-chi-minh').trigger('change');
				loadhuyen('ho-chi-minh');
				
				$("#tinh").change(function(){ 
					var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
					var table="tbl_quanhuyen";
					var tablep="tbl_quanhuyen_category";
					$("#huyen").load("<?php echo $linkrootbds?>module/getChildSubject.php?table="+ table+ "&tablep=" +tablep + "&id=" +id); //alert(idthanhpho)
					//tien hanh load ban do neu co
					if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest()
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
								if(xmlhttp.responseText!=""){
									//explode 
									var str=xmlhttp.responseText;
									var rs_ex=str.split(".");
									console.log(str);
									if(rs_ex[1]=="pdf"){
										//view pdf
										jQuery("#view_bando").html('<iframe frameBorder="0" width="100%" height="800px;" src="https://docs.google.com/gview?url=<?php echo $linkrootbds?>/'+str+'&embedded=true"></iframe>');	
									}else{
										//view image	
										//jQuery("#view_bando").html('<img src="<?php echo $linkrootbds?>/'+str+'" alt=""/>');	
										if(map != undefined || map != null)
										{
											map.remove();		
										}
										jQuery("#view_bando").html('');
										var container = L.DomUtil.get('view_bando');
											if(container != null){
												container._leaflet_id = null;
											}
											
										 map = L.map('view_bando', {
										  minZoom: 1,
										  maxZoom: 4,
										  center: [0, 0],
										  zoom: 2,
										  crs: L.CRS.Simple
										});
										
										// dimensions of the image
										var w = 2000,
											h = 1500,
											url = '<?php echo $linkrootbds?>/'+str;

										// calculate the edges of the image, in coordinate space
										var southWest = map.unproject([0, h], map.getMaxZoom()-1);
										var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
										var bounds = new L.LatLngBounds(southWest, northEast);

										// add the image overlay, 
										// so that it covers the entire map
										L.imageOverlay(url, bounds).addTo(map);

										// tell leaflet that the map is exactly as big as the image
										map.setMaxBounds(bounds);
									}
								}								
							}
						};
						var af= "<?php echo $linkrootbds?>module/loadbando.php?tinh="+id;			
						xmlhttp.open("GET", af, true);
						xmlhttp.send();
				});
				$("#huyen").change(function(){ 
					var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
					var table="tbl_street";
					var tablep="tbl_quanhuyen";
					$("#duong").load("<?php echo $linkrootbds?>module/getChildSubject.php?table="+ table+ "&tablep=" +tablep + "&id=" +id); //alert(idthanhpho)
					//tien hanh load ban do neu co
					if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest()
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
								if(xmlhttp.responseText!=""){
									//explode 
									var str=xmlhttp.responseText;
									var rs_ex=str.split("."); 
									
									if(rs_ex[1]=="pdf"){ 
										//view pdf
										jQuery("#view_bando").html('<iframe frameBorder="0" width="100%" height="800px;" src="https://docs.google.com/gview?url=<?php echo $linkrootbds?>/'+str+'&embedded=true"></iframe>');	
										
									}else{
										//view image	
										if(map != undefined || map != null)
										{
											map.remove();		
										}
										jQuery("#view_bando").html('');
										var container = L.DomUtil.get('view_bando');
											if(container != null){
												container._leaflet_id = null;
											}
										map = L.map('view_bando', {
										  minZoom: 1,
										  maxZoom: 4,
										  center: [0, 0],
										  zoom: 2,
										  crs: L.CRS.Simple
										});
										
										// dimensions of the image
										var w = 2000,
											h = 1500,
											url = '<?php echo $linkrootbds?>/'+str;

										// calculate the edges of the image, in coordinate space
										var southWest = map.unproject([0, h], map.getMaxZoom()-1);
										var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
										var bounds = new L.LatLngBounds(southWest, northEast);

										// add the image overlay, 
										// so that it covers the entire map
										L.imageOverlay(url, bounds).addTo(map);

										// tell leaflet that the map is exactly as big as the image
										map.setMaxBounds(bounds);	
									}
								}								
							}
						};
						var af= "<?php echo $linkrootbds?>module/loadbando.php?huyen="+id;			
						xmlhttp.open("GET", af, true);
						xmlhttp.send();
				});
				$("#huyen").change(function(){ 
					var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
					var table="tbl_phuongxa";
					var tablep="tbl_quanhuyen";
					$("#phuong").load("<?php echo $linkrootbds?>module/getChildSubject.php?table="+ table+ "&tablep=" +tablep + "&id=" +id); //alert(idthanhpho)
				});
				$("#phuong").change(function(){ 
					var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
					//alert(idthanhpho)
					//tien hanh load ban do neu co
					if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest()
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
								if(xmlhttp.responseText!=""){
									//explode 
									var str=xmlhttp.responseText;
									var rs_ex=str.split("."); 
									
									if(rs_ex[1]=="pdf"){ 
										//view pdf
										jQuery("#view_bando").html('<iframe frameBorder="0" width="100%" height="800px;" src="https://docs.google.com/gview?url=<?php echo $linkrootbds?>/'+str+'&embedded=true"></iframe>');	
										
									}else{
										//view image	
										//jQuery("#view_bando").html('<img src="<?php echo $linkrootbds?>/'+str+'" alt=""/>');	
										if(map != undefined || map != null)
										{
											map.remove();		
										}
										jQuery("#view_bando").html('');
										var container = L.DomUtil.get('view_bando');
											if(container != null){
												container._leaflet_id = null;
											}
										map = L.map('view_bando', {
										  minZoom: 1,
										  maxZoom: 4,
										  center: [0, 0],
										  zoom: 2,
										  crs: L.CRS.Simple
										});
										
										// dimensions of the image
										var w = 2000,
											h = 1500,
											url = '<?php echo $linkrootbds?>/'+str;

										// calculate the edges of the image, in coordinate space
										var southWest = map.unproject([0, h], map.getMaxZoom()-1);
										var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
										var bounds = new L.LatLngBounds(southWest, northEast);

										// add the image overlay, 
										// so that it covers the entire map
										L.imageOverlay(url, bounds).addTo(map);

										// tell leaflet that the map is exactly as big as the image
										map.setMaxBounds(bounds);
									}
								}								
							}
						};
						var af= "<?php echo $linkrootbds?>module/loadbando.php?phuong="+id;			
						xmlhttp.open("GET", af, true);
						xmlhttp.send();
				});
				$("#duong").change(function(){ 
					var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form//alert(idthanhpho)
					//tien hanh load ban do neu co
					if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest()
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
								if(xmlhttp.responseText!=""){
									//explode 
									var str=xmlhttp.responseText;
									var rs_ex=str.split("."); 
									
									if(rs_ex[1]=="pdf"){ 
										//view pdf
										jQuery("#view_bando").html('<iframe frameBorder="0" width="100%" height="800px;" src="https://docs.google.com/gview?url=<?php echo $linkrootbds?>/'+str+'&embedded=true"></iframe>');	
										
									}else{
										//view image	
										//jQuery("#view_bando").html('<img src="<?php echo $linkrootbds?>/'+str+'" alt=""/>');	
										if(map != undefined || map != null)
										{
											map.remove();		
										}
										jQuery("#view_bando").html('');
										var container = L.DomUtil.get('view_bando');
											if(container != null){
												container._leaflet_id = null;
											}
										map = L.map('view_bando', {
										  minZoom: 1,
										  maxZoom: 4,
										  center: [0, 0],
										  zoom: 2,
										  crs: L.CRS.Simple
										});
										
										// dimensions of the image
										var w = 2000,
											h = 1500,
											url = '<?php echo $linkrootbds?>/'+str;

										// calculate the edges of the image, in coordinate space
										var southWest = map.unproject([0, h], map.getMaxZoom()-1);
										var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
										var bounds = new L.LatLngBounds(southWest, northEast);

										// add the image overlay, 
										// so that it covers the entire map
										L.imageOverlay(url, bounds).addTo(map);

										// tell leaflet that the map is exactly as big as the image
										map.setMaxBounds(bounds);
									}
								}								
							}
						};
						var af= "<?php echo $linkrootbds?>module/loadbando.php?duong="+id;			
						xmlhttp.open("GET", af, true);
						xmlhttp.send();
				});
			});
			function loadhuyen(id){				
					var table="tbl_quanhuyen";
					var tablep="tbl_quanhuyen_category";
					$("#huyen").load("<?php echo $linkrootbds?>module/getChildSubject.php?table="+ table+ "&tablep=" +tablep + "&id=" +id); //alert(idthanhpho)
					//tien hanh load ban do neu co
					if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest()
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
						}
						xmlhttp.onreadystatechange = function() {
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
								if(xmlhttp.responseText!=""){
									//explode 
									var str=xmlhttp.responseText;
									var rs_ex=str.split(".");
									
									if(rs_ex[1]=="pdf"){
										//view pdf
										jQuery("#view_bando").html('<iframe frameBorder="0" width="100%" height="800px;" src="https://docs.google.com/gview?url=<?php echo $linkrootbds?>/'+str+'&embedded=true"></iframe>');	
									}else{
										//view image	
										//jQuery("#view_bando").html('<img src="<?php echo $linkrootbds?>/'+str+'" alt=""/>');	
										if(map != undefined || map != null)
										{
											map.remove();		
										}
										jQuery("#view_bando").html('');
										var container = L.DomUtil.get('view_bando');
											if(container != null){
												container._leaflet_id = null;
											}
										map = L.map('view_bando', {
										  minZoom: 1,
										  maxZoom: 4,
										  center: [0, 0],
										  zoom: 2,
										  crs: L.CRS.Simple
										});
										
										// dimensions of the image
										var w = 2000,
											h = 1500,
											url = '<?php echo $linkrootbds?>/'+str;

										// calculate the edges of the image, in coordinate space
										var southWest = map.unproject([0, h], map.getMaxZoom()-1);
										var northEast = map.unproject([w, 0], map.getMaxZoom()-1);
										var bounds = new L.LatLngBounds(southWest, northEast);

										// add the image overlay, 
										// so that it covers the entire map
										L.imageOverlay(url, bounds).addTo(map);

										// tell leaflet that the map is exactly as big as the image
										map.setMaxBounds(bounds);
									}
								}								
							}
						};
						var af= "<?php echo $linkrootbds?>module/loadbando.php?tinh="+id;			
						xmlhttp.open("GET", af, true);
						xmlhttp.send();
			}
			</script> 
            <form action="<?php echo $linkrootbds ;?>ban-do-quy-hoach.html" method="POST" enctype="multipart/form-data" >
            <ul class="bando_quyhoach">
                <li>
                    <select name="tinh" id="tinh"  class="styled"  > <?=$idtinh?>
                        
                            <option value=""> Chọn thành phố </option> 
                            
                            <?php   
                            $cate=get_records("tbl_quanhuyen_category","bando='1'","sort ASC"," "," ");
                            while ($row=mysql_fetch_assoc($cate)){?>
                            <option value="<?php echo $row['subject']; ?>"  <?php if($idtinh==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                            <?php } ?>
                        
                        </select>
                </li>
                <li>
                    <select name="huyen" id="huyen"  class="styled"  > 
                    	 
                    	<option value=""> Chọn Quận / Huyện </option> 
                    	<?php if($idquan>0) {?>
                        <?php   
                            $cate=get_records("tbl_quanhuyen","parent='".$idtinh."'","sort ASC"," "," ");
                            while ($row=mysql_fetch_assoc($cate)){?>
                            <option value="<?php echo $row['subject']; ?>"  <?php if($idquan==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                            <?php } ?>
                        <?php }?>
                    </select>
                </li>
                <li>
                    <select name="phuong" id="phuong"  class="styled"  > 
                    
                        <option value="">Chọn Phường / Xã</option> 
                    	<?php if($idphuong>0) {?>
                        <?php   
                            $cate=get_records("tbl_phuongxa","parent='".$idquan."'","sort ASC"," "," ");
                            while ($row=mysql_fetch_assoc($cate)){?>
                            <option value="<?php echo $row['subject']; ?>"  <?php if($idphuong==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                            <?php } ?>
                        <?php }?>
                    </select>
                </li>
                <li>
                <select name="duong" id="duong"  class="styled"  > 
                
                	<option value="">Chọn đường / Dự án</option> 
                    <?php if($idstreet>0) {?>
					<?php   
                    $cate=get_records("tbl_street","parent='".$idquan."'","sort ASC"," "," ");
                    while ($row=mysql_fetch_assoc($cate)){?>
                    <option value="<?php echo $row['subject']; ?>"  <?php if($idstreet==$row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option> 
                    <?php } ?> 
                    <?php }?>
                </select>
                </li>
            </ul>
			<div id="view_bando" style="width:100%;min-height:700px;">
			</div>
            </form>
        </div>
    
    </div><!-- End .m_sb -->
</div>