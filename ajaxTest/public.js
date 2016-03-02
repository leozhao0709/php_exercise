(function() {

	// ��ȡdomԪ��
	var $ = function(id) {
		return document.getElementById(id);
	};

	// ���ض�Ӧ��Ajax����
	$.init = function() {
		try {
			return new XMLHttpRequest();
		} catch (e) {
		}
		try {
			return new ActiveXObject('Microsoft.XMLHTTP');
		} catch (e) {
		}
	};

	// Ajax��get����
	$.get = function(url, data, callback, type) {
		// url�������ַ
		// data���������
		// callback���ص�����

		// ��������
		var xhr = $.init();
		// ���ʱ��������������
		url = url + '?_=' + new Date().getTime();
		// ������ݲ����������Ӳ����ַ���
		if (data != null) {
			url = url + '&' + data;
		}
		// ��ʼ��Ajax����
		xhr.open('get', url);
		// �ص�����
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				// ������������Ϻ󣬵���ָ���ĺ���,��ajax����
				// �ķ���ֵ��Ϊ�������д���
				if (type == null) {
					type = 'text';
				}

				if (type == 'text') {
					callback(xhr.responseText);
				}

				if (type == 'xml') {
					callback(xhr.responseXML);
				}

				if (type == 'json') {
					callback(eval('(' + xhr.responseText + ')'))
				}
			}
		};
		// ����Ajax����
		xhr.send(null);
	};

	// Ajax��post����
	$.post = function(url, data, callback, type) {
		var xhr = $.init();
		xhr.open('post', url);
		xhr.setRequestHeader('Content-Type',
				'application/x-www-form-urlencoded');
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				if (type == null) {
					type = 'text';
				}

				if (type == 'text') {
					callback(xhr.responseText);
				}

				if (type == 'xml') {
					callback(xhr.responseXML);
				}

				if (type == 'json') {
					callback(eval('(' + xhr.responseText + ')'))
				}
			}
		};
		xhr.send(data);
	};

	window.$ = $;
})();