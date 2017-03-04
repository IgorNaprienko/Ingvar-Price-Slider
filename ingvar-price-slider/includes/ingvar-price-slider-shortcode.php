<?php 
function isp_func( $atts ) {
	 return 
	'
	<div class="ips-container">
		<div class="ips-col-7">
			<div class="" style="margin-bottom:30px;">
				<input type="" class="single-slider" value="34" style="">
			</div>
			<div class="ips-form-group">
				<div class="ips-col-4">Площадь:</div>
				<div class="ips-col-8">
				  <span class="ips-ploshchad"></span> м2
				</div>
			</div>
			<div class="ips-form-group">
				<div class="ips-col-4">Сроки:</div>
				<div class="ips-col-8">
				  от <span class="ips-min-days"></span> до <span class="ips-max-days"></span> дней
				</div>
			</div>
			<div class="ips-form-group">
				<div class="ips-col-4">Стоимость:</div>
				<div class="ips-col-8">
				  от <span class="ips-min-price"></span> до <span class="ips-max-price"></span> руб.
				</div>
			</div>
		</div>
		<div class="ips-col-5">
			<form class="ips-form" novalidate>
				<input type="text" name="name" class="ips-name valid" placeholder="Ваше имя">
				<input type="text" name="phone" class="ips-mask valid" placeholder="Ваш телефон">
				<button type="submit" class="ips-button">получить расчет</button>
			</form>
		</div>
	</div>
<script>
    function containerInit(){
		var container=jQuery(".ips-container");
		if(container.outerWidth() > 700){
			container.addClass("ips-responsive");
		}else{
			container.removeClass("ips-responsive");
		}
		console.log(container.outerWidth());
	}
	var priceminIsp,pricemaxIsp,ips,minIsp,maxIsp,minDateIsp,maxDateIsp,locationSuccessIps,locationErrorIps;
		locationSuccessIps="'.$atts[success].'";
		locationErrorIps="'.$atts[error].'";
		ips= "'.$atts[val].'";//start value
		priceminIsp = '.$atts[pricemin].';
		pricemaxIsp = '.$atts[pricemax].';
	function returnDate(val){
		var a = val / 5000;
		return a.toFixed(0);
	}
	function returnWithPercent(val){
		var discount = 0;
		var summ = 0;
		if (val <= '.$atts[mid].' && val >= '.$atts[min].') {
			discount = 100-'.$atts[discount].';
		} else if (val >= '.$atts[max].'){
			discount = 100-'.$atts[discount2].';
		} else {
			discount = 100;
		}
		summ = val/100*discount;
		
	   return new Intl.NumberFormat("ru-Ru").format(summ.toFixed(0));//okругляем и форматируем сумму
	}
	function renderData(val){
		minIsp = returnWithPercent(val*priceminIsp);
		maxIsp = returnWithPercent(val*pricemaxIsp);
		minDateIsp=returnDate(val*priceminIsp);
		maxDateIsp=returnDate(val*pricemaxIsp);
		jQuery(".ips-min-price").text(minIsp);
		jQuery(".ips-max-price").text(maxIsp);
		jQuery(".ips-ploshchad").text(val);
		jQuery(".ips-min-days").text(minDateIsp);
		jQuery(".ips-max-days").text(maxDateIsp);
	}
	jQuery(document).ready(function( $ ) {
		containerInit();
		$(window).on("resize",function () {containerInit();});
		jQuery(".ips-mask").mask("+7(999) 999-9999");
        
		var form=jQuery(".ips-form");
		var slider=jQuery(".single-slider");
		slider.jRange({
			from: '.$atts["from"].',
			to: '.$atts[to].',
			step: 1,
			scale: ['.$atts["steps"].'],
			format: "%s",
			width: '.$atts[width].',
			showLabels: true,
			snap: true
		});
		
		slider.jRange("setValue", ips);
		renderData('.$atts[val].');
		
		slider.on("change", function() {
			ips=this.value;
			renderData(ips);		
		});
		form.on("submit",function(e){
			e.preventDefault();
			var valid=true;
			var name=jQuery(this).find(".ips-name");
			var phone=jQuery(this).find(".ips-mask");
			form.find("input").each(function( index ) {
				if(jQuery( this ).val()===""){
				   valid=false;
				   jQuery( this ).removeClass("success");
				   jQuery( this ).addClass("error");
				}else{
					jQuery( this ).removeClass("error");
					jQuery( this ).addClass("success");
				}
			});
			
			if(valid){
				var data ={
					name:name.val(),
					ips:ips,
					phone:phone.val(),
					min:minIsp,
					max:maxIsp,
					minDate:minDateIsp,
					maxDate:maxDateIsp,
					mail:"'.$atts[mail].'",
					from:"'.$atts[mailfrom].'"
				}
				jQuery.ajax({
					url: "/wp-content/plugins/ingvar-price-slider/ips-send.php",
					method: "POST",
					data: data,
					success:function(responce){
					   console.log(responce);
					   location=locationSuccessIps;
					},
					error:function(){
						location=locationErrorIps;
					}
				});
				
			}
		});
		
	});      
</script>';
}
add_shortcode("isp", "isp_func");	

?>