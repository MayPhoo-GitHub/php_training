<button onclick="fetchServer()">Fetch</button>
<p id="text"></p>
<script>
function fetchServer(){
var request=new XMLHttpRequest();
request.onreadystatechange=function(){

var pT=document.getElementById("text");
if(request.readyState==4){
    pT.innerHTML=request.responseText;
}
else
{
    pT.innerHTML="error";
}
}
request.open("GET","http://localhost:81/course/php/note.txt");
request.send();
} 
</script>