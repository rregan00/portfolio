const Http = new XMLHttpRequest();
const url='http://quotes.rest/qod.json';
Http.open("GET", url);
Http.send();

Http.onreadystatechange=(e)=>{
	//console.log(Http.responseText)
	//document.getElementById("output").innerHTML = Http.responseText
	var obj = JSON.parse('{"quote":"Things are not bad in themselves, but our cowardice makes them so.", "author": "Michel de Montaigne"}')

	document.getElementById("output").innerHTML = obj.quote + " - " + obj.author;

}