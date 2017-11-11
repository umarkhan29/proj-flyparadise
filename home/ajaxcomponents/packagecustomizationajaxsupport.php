
<script type="text/javascript">

	function cp(thediv){

		var duration=document.getElementById('duration').value;
		var inclusion=document.getElementById('inclusion').value;
		var exclusion=document.getElementById('exclusion').value;

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
		xmlhttp.open('GET','home/ajaxcomponents/packagecustomization.php?duration='+duration+'&inclusion='+inclusion+'&exclusion='+exclusion,true);
		
		xmlhttp.send();
		
	}

</script>


<input type="text" id="duration" placeholder="Duration (in days)" /><br />
<input type="text" id="inclusion" placeholder="Number of Inclusions" /> <br />
<input type="text" id="exclusion" placeholder="Number of Exclusions" /><br />
<input type="submit" value="Go" onClick="cp('custom');">


<div id="custom" >

</div>

