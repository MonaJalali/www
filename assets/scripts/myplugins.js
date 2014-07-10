function getXmlHttpRequestObject() {
if (window.XMLHttpRequest) {
	return new XMLHttpRequest();
} else if(window.ActiveXObject) {
	return new ActiveXObject("Microsoft.XMLHTTP");
} else {
	alert("Your Browser Sucks!\nIt's about time to upgrade don't you think?");
}
}
var xmlobj;
function notifer()
{
	xmlobj= getXmlHttpRequestObject();
	xmlobj.open("GET", 'notif.php', true);
	xmlobj.onreadystatechange = handleNotif;
	document.getElementById('notifList').innerHTML = "WW";
	xmlobj.send(null);
	
	
}
function handleNotif()
{
	if (xmlobj.readyState == 4) 
	{
		var res=xmlobj.responseText.split('@');
		document.getElementById('notifNum').innerHTML =res[0] ;
		document.getElementById('notifList').innerHTML =res[1] ;
	}
}