
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="cachet.js"></script>
<script>
var components= 
[{
	"Cid":1,
	"Mid":1,
	"location": "https://start.parnassys.net/bao/status/",
	"name": "ParnasSys"
},
{
	"Cid":3,
	"Mid":2,
	"location": "http://thijsbeltman.nl/",
	"name": "Het ParnasSys kennisportaal"
},
{
	"Cid":4,
	"Mid":3,
	"location": "https://ouders.parnassys.net/ouderportaal/status/",
	"name": "Het ParnasSys ouderportaal"
}]
for (var i = 0; i < components.length; i++) {
	var d = new Date();
	var start = d.getTime();
	console.log(start);
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	xhttp.open("GET", components[i]['location'], true);
	xhttp.send();
	var end = d.getTime();
	console.log(end);
	console.log('milliseconds passed', end - start);

	
}
}	/*
var cachetjs = new cachetjs;
cachetjs.setBaseURL('http://localhost/statuspage/public/api/v1/');
cachetjs.setApiToken('nXR7aUZfHrOpysKZRlpx');
*/
</script>
