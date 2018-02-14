<script type="text/javascript">	
	function showpackages(thediv){
	
		//Getting destination
		var destination="<?php echo $destinations[0]['DESTINATION']; ?>";
		
		//Getting star filter
		var stars;
		for (i = 0; i < document.getElementsByName('rating').length; i++) {
					if(document.getElementsByName('rating')[i].checked == true) {
						var stars = document.getElementsByName('rating')[i].value;
						break;
					}
		 }
		 
		//Getting category
		//getting Honeymoon checkbox
		var honeymoon;
		if(document.getElementsByName('Honeymoon')[0].checked == true) {
			 honeymoon="Yes";
			
		}else{
			honeymoon="No";
		}
		//getting Solo checkbox
		var solo;
		if(document.getElementsByName('Solo')[0].checked == true) {
			 solo="Yes";
			
		}else{
			solo="No";
		}
		//getting Family and Friends checkbox
		var ff;
		if(document.getElementsByName('Family and Friends')[0].checked == true) {
			 ff="Yes";
			
		}else{
			ff="No";
		}
		
		//getting Adventure checkbox
		var adventure;
		if(document.getElementsByName('Adventure')[0].checked == true) {
			 adventure="Yes";
			
		}else{
			adventure="No";
		}
		
		//getting Weekend checkbox
		var weekend;
		var isweekendset=document.getElementsByName('Weekend')[0];
		if(typeof isweekendset != 'undefined'){
			if(document.getElementsByName('Weekend')[0].checked == true) {
				 weekend="Yes";
				
			}else{
				weekend="No";
			}
		}else{
			weekend="No";
		}	
		
		
		//getting package duration
		var duration=document.getElementById('counter-no').value;
		
		
		//getting noof travellers
		var traveller=document.getElementById('traveller-no').value;
		
		//getting filter price
		var price=document.getElementById('amount').value;
		
		
		//processing filter
		if(window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
		}
		
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById(thediv).innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open('GET','home/ajaxcomponents/getpackages.php?stars='+stars+'&destination='+destination+'&honeymoon='+honeymoon+'&solo='+solo+'&ff='+ff+'&adventure='+adventure+'&weekend='+weekend+'&duration='+duration+'&price='+price+'&traveller='+traveller,true);

		xmlhttp.send();
		
	}
</script>