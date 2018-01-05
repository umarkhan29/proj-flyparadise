<script type="text/javascript">	
	function stay(thediv){
	
		//getting stay details
		var stay;
		if(document.getElementsByName('selector')[0].checked == true) {
			 stay=2;
		}
		
		if(document.getElementsByName('selector')[1].checked == true) {
			 stay=3;
			
		}
		if(document.getElementsByName('selector')[2].checked == true) {
			  stay=4;
			
		}
		if(document.getElementsByName('selector')[3].checked == true) {
			  stay=5;
			
		}
		
		
		
		//getting month details
		
		var month=document.getElementById('stay').value;
		
		//getting basic price
		var pprice=document.getElementById('sessid').value;
		
		//getting location
		var loc="<?php echo $package[0]['DESTINATION']; ?>";
		
		
		
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
		xmlhttp.open('GET','home/ajaxcomponents/updatepackageprice.php?month='+month+'&stay='+stay+'&sessid='+pprice+'&loc='+loc,true);

		xmlhttp.send();
		
	}
</script>