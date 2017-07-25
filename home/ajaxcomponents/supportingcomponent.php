<?php
include_once('home/catalog/connect.khan');

?>
<script type="text/javascript">

	function search(thediv){

		var keywords=document.getElementById('searchtxtbox').value;
		

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
		xmlhttp.open('GET','home/ajaxcomponents/__PackageSearch.php?searchtxtbox='+keywords,true);
		
		xmlhttp.send();
		
	}

</script>


<input type="text" id="searchtxtbox" placeholder="Search for Products" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH" onClick="search('search_div');">


<div id="search_div" >

</div>

</div>