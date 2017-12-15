
<script type="text/javascript">

	function cp(thediv){

		var duration=document.getElementById('duration').value;

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
		xmlhttp.open('GET','home/ajaxcomponents/packagecustomization.php?duration='+duration,true);
		
		xmlhttp.send();
		
	}

</script>


<input type="text" id="duration" placeholder="Duration (in days)" /><br />

<input type="submit" value="Go" onClick="cp('custom');">


<div id="custom" >

</div>

