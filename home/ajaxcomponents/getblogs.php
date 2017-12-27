<script type="text/javascript">	
	function getblogs(thediv){
	
		
		//getting blog type
		var blogtype=document.getElementById('select2--container').innerHTML;
		var blogsearch=document.getElementById('blogsearch').value;
		
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
		xmlhttp.open('GET','home/ajaxcomponents/fetchblogs.php?blogtype='+blogtype+'&blogsearch='+blogsearch,true);
		
		xmlhttp.send();
		
	}
	
	function getsearchblogs(thediv){
	
		
		//getting search text
		var blogsearch=document.getElementById('blogsearch').value;
		
			if(blogsearch!=""){
			
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
			xmlhttp.open('GET','home/ajaxcomponents/searchblogs.php?blogsearch='+blogsearch,true);
			
			xmlhttp.send();
		}
		
	}
</script>