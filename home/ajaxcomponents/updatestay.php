<script type="text/javascript">	
	function stay(thediv,id){
	
		//getting stay details
		var foo="foo";
		foo+=id;
		var stay;
		if(document.getElementsByName(foo)[0].checked == true) {
			 stay=2;
		}
		
		if(document.getElementsByName(foo)[1].checked == true) {
			 stay=3;
			
		}
		if(document.getElementsByName(foo)[2].checked == true) {
			  stay=4;
			
		}
		if(document.getElementsByName(foo)[3].checked == true) {
			  stay=5;
			
		}
		
		
		//getting month details
		
		//var month=document.getElementById('stay').value;
		
		
		//getting location
		
		var loc=document.getElementById("destinations"+id).value;
		
		//getting travellers
		var travellers=document.getElementById("traveller-no").value;
		
		//getting itenary stays
		var stays=document.getElementById("stays"+id).value;
		
		
		//getting cab prices
		var cabprices=document.getElementById("cp"+id).value;
		
		
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
		xmlhttp.open('GET','home/ajaxcomponents/updatepackagepricedestination.php?stay='+stay+'&loc='+loc+'&travellers='+travellers+'&stays='+stays+'&cabprices='+cabprices,true);

		xmlhttp.send();
		
	}
</script>