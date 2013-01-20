(function () {
	var input = document.getElementById("upload_file"), 
	formdata = false;
	
	
	var queue_token = false;
	var queue_server = false;

	if (window.FormData) {
		formdata = new FormData();
		document.getElementById("btn").style.display = "none";
	} 
	
	input.addEventListener("change", function (evt) {
		
		// Request token.	
		$.ajax({
			url: "request_token.php",
			type: "POST",
			processData: false,
			contentType: false,
			async:false,
			success: function (res) {
				xmlDoc = $.parseXML( res ),
				$xml = $( xmlDoc ),
				$token = $xml.find( "token" );
				$server = $xml.find( "server" );
				if ($token.text() != '') {
					//$( "#response" ).append( $token.text()); 
					queue_token = $token.text(); 
					queue_server = $server.text(); 
				} else {
					document.getElementById("response").innerHTML = res; 
				}
			}
		});
		
		if (!queue_token) {
			return;
		}

		// Upload file.
		document.getElementById("response").innerHTML = "Uploading . . ."
		var i = 0, len = this.files.length, img, reader, file;
		
		file = this.files[0];
		if ( window.FileReader ) {
			reader = new FileReader();
			reader.onloadend = function (e) { 
			};
			reader.readAsDataURL(file);
		}
		if (formdata) {
			formdata.append("file", file);
		}
		
		var queue_data = '';
		queue_data += "<queue>";
		queue_data += "		<token>"+queue_token+"</token>";
		queue_data += "		<targetType>images</targetType>";
		queue_data += "		<targetMethod>convert-to-png</targetMethod>";
		queue_data += "		<testMode>true</testMode>";
		queue_data += "</queue>";

		formdata.append("queue", queue_data);

		if (formdata) {
			$.ajax({
				url: queue_server+"/queue-insert",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				async:false,
				success: function (res) {
					xmlDoc = $.parseXML( res ),
					$xml = $( xmlDoc ),
					$downloadurl = $xml.find( "downloadUrl" );
					if ($downloadurl.text() != '') {
						$.ajax({
							url:"./control.php",
							type:"POST",
							data: {url:$downloadurl.text()},
							success:function(data){
							$( "#response" ).html( "Success! Download URL: <a href="+data+">click</a>");
								console.log(data);},
							error:function(data){console.log(data)}
						});
						$( "#response" ).html( "Success! Download URL: <a href='"+$downloadurl.text()+"'>click</a>");

					} else {
						document.getElementById("response").innerHTML = res; 
					}
				}
			});
		}
	}, false);
}());
