var checkNumber =/[\d]+(\.[\d]+)?/;
var checkInt =/^\d+$/;

$url_datanhadat = 'https://dalo.vn/home/libs_w/nhadat/data_nhadat.php';
/*
$.get($url_datanhadat, function(data){
    var dataMaps =$.parseJSON(data);
     $('#province').change(function(){
            var $htmlDistrict ='<option value="">---Lựa chọn---</option>';
            var $valProvince =$(this).val(); //alert($valProvince);
            for( var key in dataMaps ){
               if(dataMaps.hasOwnProperty(key) && dataMaps[key]['parent']==$valProvince){
                $htmlDistrict +='<option value="'+dataMaps[key]['id']+'">'+dataMaps[key]['district']+'</option>';
               }
                
            }
            $('#district').html($htmlDistrict);
            if($valProvince ==''){
                $('#district').html('<option value="">---Lựa chọn---</option>');
                $('#street').html('<option value="">---Lựa chọn---</option>');
            }
           
        });

       
        $('#district').change(function(){
            var $htmlWard ='<option value="">---Lựa chọn---</option>';
            var $valDistrict =$(this).val();
           

            var $htmlStreet ='<option value="">---Lựa chọn---</option>';
            //var $valDistrict =$(this).val();
            for( var keyW in dataMaps){
                if(dataMaps.hasOwnProperty(keyW) && dataMaps[keyW]['parent']==$valDistrict && dataMaps[keyW]['street']!=null  ){
                    $htmlStreet +='<option value="'+dataMaps[keyW]['id']+'">'+dataMaps[keyW]['street']+'</option>';
                }
            }
            $('#street').html($htmlStreet);

             if($valDistrict ==''){
                
                $('#street').html('<option value="">---Lựa chọn---</option>');
            }
        });

});
*/
$('#street').change(function(){
	$valStreet = $(this).val();
	$textStreet = $('#street option:selected').text();
	if($valStreet != ''){
		$.ajax({
			url:urlbasic+'home/libs_w/nhadat/dulieusosanh_strees.php',
			method:'post',
			data:{
				id_street:$valStreet
			}, 
			success:function(data){ 
				$('#filter-tsss').removeClass('hidden');
				$('#accordion-12').html(data);
				$('#strees-sosanh').text('đoạn: '+$textStreet);
			}
		});

        $.ajax({
          url:urlbasic+'home/libs_w/nhadat/dulieuthaphon_street.php',
          method:'post',
          data:{
            id_street:$valStreet
          }, 
          success:function(data1){  //console.log(data1);
            $html1 ='';
            $total1 =0;
            if(data1 !='' && data1.length > 10){
              $jdata = $.parseJSON(data1);
              for(var k in $jdata){
                $total1++;
                if($total1 == 1){
                  $html1 += html_tsth($jdata[k]['title'],$jdata[k]['dongia'],$jdata[k]['giaban'],$jdata[k]['dientich'],$jdata[k]['mota'],$jdata[k]['link'],(parseInt(k)+1));
                }else{
                  $html1 += html_tsth2($jdata[k]['title'],$jdata[k]['dongia'],$jdata[k]['giaban'],$jdata[k]['dientich'],$jdata[k]['mota'],$jdata[k]['link'],(parseInt(k)+1));
                }
                
              } //console.log($html1);
            }
            
            $('#accordion-123').html($html1);
            $('#total-dulieuthaphon').text($total1);
            $('#strees-thaphon').text('đoạn: '+$textStreet);
          }
        });

         $.ajax({
          url:urlbasic+'home/libs_w/nhadat/chart_tsss.php',
          method:'post',
          cache: true,
          data:{
            id_street:$valStreet
          }, 
          success:function(data1){  //console.log(data1);
         
            if(data1 !='' && data1.length > 10){ 
                var chart_data = JSON.parse(data1) ; //console.log(data1);
                    var chart = new CanvasJS.Chart("chartContainer",
                        {

                          title:{
                            text: "Tài sản so sánh"
                          },
                          axisX:{  
                                  valueFormatString: "MM/YYYY",
                                  titleFontSize: 12,
                                  labelFontSize: 8,
                          },

                          axisY: {
                                   valueFormatString:"#,,.",
                                   titleFontSize: 2,
                                   gridDashType: "dot",
                                   lineDashType: "etc",
                                gridThickness: 1,
                                labelFontSize: 8,
                                margin: 0,
                          },
                          
                          data: [
                            {        
                            type: "spline",

                            showInLegend: true,
                            name: "Nhà đất",
                            markerSize: 5,
                            color: "green",
                            xValueType: "dateTime",
                            lineThickness: 2,
                            dataPoints:chart_data,
                            fontSize:12,
                            fontWeight: "normal",
                            fontStyle:"italic"
                            }
                          ]
                        });

                    chart.render();
            }
         
          }
        });

          $.ajax({
              url:urlbasic+'home/libs_w/nhadat/data_note_street.php',
              method:'post',
              data:{
                id_street:$valStreet
              }, 
              success:function(data1){  //console.log(data1);
             
                if(data1 !='' && data1.length > 10){
                  //$jdata = $.parseJSON(data1);
                    
                    $('#note_street').html(' <blockquote style="color:#fb0000;" class="blockquote-default primary-color">'+data1+'</blockquote>')
                }else{
                    $('#note_street').html('');
                }
             
              }

         });
	}else{
		$('#accordion-12').html('');
		$('#total-dulieusosanh').text('0');
		$('#strees-sosanh').text('');

                        $('#accordion-123').html('');
                        $('#total-dulieuthaphon').text('0');
                        $('#strees-thaphon').text('');
                        $('#note_street').html('');
	}
});

$('#ss_year,#ss_month').change(function(){
        var month = $('#ss_month').val();
        var year = $('#ss_year').val();
        if(month!=0&&year!=0){ //alert("OK");
           $.ajax({
                url:urlbasic+'home/libs_w/nhadat/filter-tsss-nhadat.php',
                method:'post',
                data:{
                    m:month,
                    y:year,
                    id:$('#street').val()
                },
                success:function(data){ //console.log(data);
                    $('#accordion-12').html(data);
                }
            });
        }
    });


function html_tsss(title,dgia,gia,dientich,mota,url,stt){
	return '<div class="panel panel-default"> <div style="background:#47b474;" class="panel-heading" role="tab" id="heading'+stt+'-12"> <h5 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion-12" href="#collapse'+stt+'-12" aria-expanded="true" aria-controls="collapse'+stt+'-12" class="trans">'+title+' ('+gia+'-'+dientich+' m2) <span class="icon fa fa-plus trans"></span></a></h5> </div><div id="collapse'+stt+'-12" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'+stt+'-12"> <div class="panel-body"> <strong>Đơn giá: </strong>'+dgia+' <br> <strong>Giá bán: </strong>'+gia+' <br><strong>Diện tích: </strong>'+dientich+' m2 <hr> '+mota+'<br><strong>Nguồn: </strong><a href="'+url+'" target="_blank">'+url+'</a> </div></div></div>';
}

function html_tsss2(title,dgia,gia,dientich,mota,url,stt){
	return '<div class="panel panel-default"> <div style="background:#47b474;" class="panel-heading" role="tab" id="heading'+stt+'-12"> <h5 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion-12" href="#collapse'+stt+'-12" aria-expanded="false" aria-controls="collapse'+stt+'-12" class="collapsed trans">'+title+' ('+gia+'-'+dientich+' m2) <span class="icon fa fa-plus trans"></span></a></h5> </div><div id="collapse'+stt+'-12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+stt+'-12"> <div class="panel-body"> <strong>Đơn giá: </strong>'+dgia+' <br> <strong>Giá bán: </strong>'+gia+' <br><strong>Diện tích: </strong>'+dientich+' m2 <hr> '+mota+' <br><strong>Nguồn: </strong><a href="'+url+'" target="_blank">'+url+'</a> </div></div></div>';
}

function html_tsth(title,dgia,gia,dientich,mota,url,stt){
  return '<div class="panel panel-default"> <div style="background:#2098d1;" class="panel-heading" role="tab" id="heading'+stt+'-123"> <h5 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion-123" href="#collapse'+stt+'-123" aria-expanded="true" aria-controls="collapse'+stt+'-123" class="trans">'+title+' ('+gia+'-'+dientich+' m2) <span class="icon fa fa-plus trans"></span></a></h5> </div><div id="collapse'+stt+'-123" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'+stt+'-123"> <div class="panel-body"> <strong>Đơn giá: </strong>'+dgia+' <br> <strong>Giá bán: </strong>'+gia+' <br><strong>Diện tích: </strong>'+dientich+' m2 <hr> '+mota+'<br><strong>Nguồn: </strong><a href="'+url+'" target="_blank">'+url+'</a> </div></div></div>';
}

function html_tsth2(title,dgia,gia,dientich,mota,url,stt){
  return '<div class="panel panel-default"> <div style="background:#2098d1;" class="panel-heading" role="tab" id="heading'+stt+'-123"> <h5 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion-123" href="#collapse'+stt+'-123" aria-expanded="false" aria-controls="collapse'+stt+'-123" class="collapsed trans">'+title+' ('+gia+'-'+dientich+' m2) <span class="icon fa fa-plus trans"></span></a></h5> </div><div id="collapse'+stt+'-123" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'+stt+'-123"> <div class="panel-body"> <strong>Đơn giá: </strong>'+dgia+' <br> <strong>Giá bán: </strong>'+gia+' <br><strong>Diện tích: </strong>'+dientich+' m2 <hr> '+mota+' <br><strong>Nguồn: </strong><a href="'+url+'" target="_blank">'+url+'</a> </div></div></div>';
}

$('#street, #chieurongngo, #kcduong').change(function(){
    $street =$('#street').val();
    $chieurongngo =num($('#chieurongngo').val());
    $kcduong =num($('#kcduong').val());
    if($street !='' && checkNumber.test($chieurongngo) && $chieurongngo >=0 && checkNumber.test($kcduong) && $kcduong >=0 ){
        $.ajax({
            url:urlbasic+'home/libs_w/nhadat/select_vitri_nhadat_w.php',
            method:'post',
            //dataType:'json',
            data:{
                street:$street,
                chieurongngo:$chieurongngo,
                kcduong:$kcduong
            },
            success:function(data){ //console.log(data);
                if(data !='' && data.length >0){
                    $data =$.parseJSON(data);
                    $('#vitrinhadat_name').text($data['name']);
                    $('#vitrinhadat').val($data['type']);
                    //console.log($data);
                    
                }else{
                    $('#vitrinhadat_name').text('Vị trí không xác định');
                }
                
            }
        });
    }
});

$('#dientichxd, #sotangxd').change(function(){
    $dientichxd = num($('#dientichxd').val()) ;
    $sotangxd =num($('#sotangxd').val()) ;
    if($dientichxd !='' && $sotangxd !='' && checkNumber.test($dientichxd) && checkNumber.test($sotangxd) && $dientichxd > 0 && $sotangxd > 0){
        $dientichsan = $dientichxd * $sotangxd;
        $('#dientichsanxd').val($dientichsan);
    }else{
    	$('#dientichsanxd').val('0');
    }
});

$('#ketcaunha').change(function(){
    $ketcaunha =$('#ketcaunha').val(); //alert($ketcaunha);
   
    if($ketcaunha !='' ){
        $.ajax({
            url:urlbasic+'home/libs_w/nhadat/select_ketcauctxd_nhadat_w.php',
            method:'post',
            //dataType:'json',
            data:{
                ketcaunha:$ketcaunha
            },
            success:function(data){
                if(data !=''){
                    $('#dongiactxd').val(data);
                    $('.dongiactxd_text').text(formatMoney(data)+' đ');
                    //console.log(data);
                    
                }else{
                    $('#dongiactxd').val('');
                    $('.dongiactxd_text').text('...');
                }
                
            }
        });
    }else{
        $('#dongiactxd').val('');
        $('.dongiactxd_text').text('...');
    }
});

$('#form-thamdinhnhadat').submit(function(ev){ //alert('ok');

	 	$('#submit_thamdinh').prop('disabled', true);
        $('#submit_thamdinh').text('đang tiến hành...');
        setTimeout(function(){ $("#submit_thamdinh").removeAttr("disabled"); $("#submit_thamdinh").text("THẨM ĐỊNH GIÁ");}, 5000);

    $.ajax({
        url:urlbasic+'home/libs_w/nhadat/thamdinhgianhadat_w.php',
        method:'post',
        data:$('#form-thamdinhnhadat').serialize(),
        success:function(data){ console.log(data);
            if(data ==101){
                showError('Bạn chưa chọn Tỉnh/ Thành phố','danger');
            }else if(data ==201){
                showError('Bạn chưa chọn Quận/ Huyện','danger');
            }else if(data ==301){
                showError('Bạn chưa chọn Đường/ Phố','danger');
            }else if(data ==401){
                showError('Bạn chưa nhập Chiều rộng ngõ','danger');
            }else if(data == 402){
                showError('Chiều rộng ngõ không chính xác','danger');
            }else if(data ==501){
                showError('Bạn chưa nhập Khoảng cách từ tài sản đến ngõ có tên đường','danger');
            }else if(data == 502){
                showError('Khoảng cách từ tài sản đến đường không chính xác','danger');
            }else if(data ==601){
                showError('Thông tin không chính xác, vui lòng thực hiện lại','danger');
            }else if(data ==701){
                showError('Bạn chưa nhập Mặt tiền','danger');
            }else if(data == 702){
                showError('Mặt tiền không chính xác','danger');
            }else if(data ==801){
                showError('Bạn chưa nhập Diện tích','danger');
            }else if(data == 802){
                showError('Diện tích không chính xác','danger');
            }else if(data ==901){
                showError('Bạn chưa chọn Hình dáng','danger');
            }else if(data ==1001){
                showError('Bạn chưa chọn Số mặt tiếp giáp đường','danger');
            }else if(data ==1101){
                showError('Bạn chưa chọn tình trạng Giao thông','danger');
            }else if(data ==1201){
                showError('Bạn chưa chọn Lợi thế kinh doanh','danger');
            }else if(data ==1301){
                showError('Bạn chưa chọn mục Giải Tỏa','danger');
            }else if(data ==1401){
                showError('Bạn chưa chọn mục Đất sử dụng chung','danger');
            }else if(data ==1501){
                showError('Bạn chưa chọn mục Môi trường','danger');
            }else if(data ==1601){
                showError('Bạn chưa chọn mục Phong thủy','danger');
            }else if(data ==1701){
                showError('Bạn chưa chọn mục Hướng đất','danger');
            }else if(data ==1801){
                showError('Bạn chưa chọn mục Các tiện ích khác','danger');
            }else if(data ==2001){
                showError('Bạn chưa chọn Mục đích sử dụng đất','danger');
            }else if(data ==1901){
                showError('Bạn chưa chọn mục Các yếu tố khác','danger');
            }else if(data == 71){
                showError('Thông tin không đầy đủ, vui lòng thực hiện lại','danger');
            }else if(data == 444){
                $('#modal-1').trigger( "click" );
            }else{ console.log(data);
                $data =$.parseJSON(data);
                $('#result_dongiatdqsdd').text(formatMoney($data['dongia'],'đ'));
                $('#result_giatdqsdd').text(formatMoney($data['tonggia'],'đ'));
                if($data['gtctxd'] >= 0){
                    $('#result_gtctxd').text(formatMoney($data['gtctxd'],'đ'));
                }
                $('#total_gia').text(formatMoney($data['total'],'đ'));
                $('#tiengoc').val($data['total']);
                $('#nogoc').val(formatMoney($data['total']));
                showError('Bạn đã thẩm định thành công','info');
            }
            //$('#result_dongiatdqsdd').text(formatMoney(data,'đ'));
            
        }
    });
    ev.preventDefault();
});

$('#kcduong_select').change(function(){
    $kcs =$(this).val();
    if($kcs ==1){
        $('#result_kcduong_select').addClass('hidden');
        $('#vitrinhadat').val('vt1');
        $('#vitrinhadat_name').text('Vị Trí 1');
    }else if($kcs ==2){
        $('#result_kcduong_select').removeClass('hidden');
        $('#kcduong').val('');
        $('#vitrinhadat').val('');
        $('#vitrinhadat_name').text('');
    }
});

/*----------------Check du lieu---------------------------------------*/
/*$('#chieurongngo').change(function(){
	$crngo =$(this).val();
	if(checkNumber.exec($crngo)){
		alert('Ok');
	}else{
		alert('Error');
	}
});*/



function showError($error,$type){
      return $.notify({
            // options
            icon: 'glyphicon glyphicon-warning-sign',
            title: '',
            message: $error,
            url: '',
            target: '_blank'
          },{
          // settings
            element: 'body',
            position: null,
            type: $type,
            
            placement: {
              from: "top",
              align: "right"
            },
            mouse_over: 'pause',
            z_index: 1031,
            delay: 5000,
            timer: 3000,
            url_target: '_blank'
          });
}

function formatMoney(n,dv='') {
    return n.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")+' '+dv;
}

function num(n){ //convert number_fomat to number
  $n = '';
  if(n.length != 0){
    $n = n.replace(/\./g,'');
    $n = $n.replace(',','.');
    return parseFloat($n);
  }else{
    return 0;
  }

    
}

