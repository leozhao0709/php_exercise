(function(){

	var $ = function(id){
		return document.getElementById(id);
	};

	$.init = function(){
		try{
			return new XMLHttpRequest();
		}catch(e){}
		try{
			return new ActiveXObject('Microsoft.XMLHTTP');
		} catch(e){}
	}

	$.get=function(url, data, callback, type){
		var xhr=$.init();
		url = url+'?_='+new Date().getTime();
		if (data !=null) {
			url = url + '&' +data;
		};
		xhr.open('get', url);

		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				if (type == null) {
					type = 'text';
				};

				switch(type){
					case 'text':
						callback(xhr.responseText);
						break;
					case 'xml':
						callback(xhr.responseXML);
						break;
					case 'json':
						callback(eval('('+xhr.responseText+')'));
						break;
				}

			};
		}

		xhr.send(null);
	}

	$.post=function(url, data, callback, type){
		var xhr=$.init();
		xhr.open('post', url);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onreadystatechange=function(){
			if (xhr.readyState==4&&xhr.status==200) {
				if (type == null) {
					type = 'text';
				};
				switch(type){
					case 'text':
						callback(xhr.responseText);
						break;
					case 'xml':
						callback(xhr.responseXML);
						break;
					case 'json':
						callback(eval('('+xhr.responseText+')'));
						break;
				}
			};

		}
		xhr.send(data);
	}

	//闭包
	window.$ = $;
})();