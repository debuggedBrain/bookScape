function bookse(){
	var search = document.getElementById("books").value
	document.getElementById("result").innerHTML = ""
	console.log(search)
	$.ajax({
		url: "https://www.googleapis.com/books/v1/volumes?q=" + search,
		dataType: "json",
		
		success: function(data){
			console.log(data)
			for (i=0; i < data.items.length; i++){
				result.innerHTML += "<h3>"  + data.items[i].volumeInfo.industryIdentifiers[1].type+"<br></h3>"
				result.innerHTML += "<h3>"  + data.items[i].volumeInfo.industryIdentifiers[1].identifier+"<br></h3>"
				result.innerHTML += "<h3>" + data.items[i].volumeInfo.title + "<h3>" + "<br>"
				result.innerHTML += "<h3>" + data.items[i].volumeInfo.authors+ "</h3><br>"
				result.innerHTML += "<h3>"  + data.items[i].volumeInfo.description+ "<br>"
				result.innerHTML += "<a href = " + data.items[i].volumeInfo.infoLink + '><button id = "imagebutton" class ="red btn"></button></a>'
			}
		},
		type: 'GET'
	});
}
document.getElementById('b').addEventListener('click',bookse, false)