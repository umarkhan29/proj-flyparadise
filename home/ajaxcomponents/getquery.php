<script type="text/javascript">	
	function getquery(thediv){
		
		var from_place=document.getElementById('from_place').value;
		var to_loc=document.getElementById('to_loc').value;

		var phone=document.getElementById('phone').value;
		var email=document.getElementById('email').value;
		var date=document.getElementById('datepicker').value;
		var nights=document.getElementById('counter-no').value;
		
		var category;
		var i;
		for(i=0;i<document.getElementsByName('selector').length;i++){
			if(document.getElementsByName('selector')[i].checked==true){
				category=document.getElementsByName('selector')[i].value;
				break;
			}
		}
			
		
		
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
		
		xmlhttp.open('GET','home/components/__GetQuery.php?from_place='+from_place+'&to_loc='+to_loc+'&phone='+phone+'&email='+email+'&date='+date+'&nights='+nights+'&category='+category,true);
		
		xmlhttp.send();
		
	}
	
	
</script>