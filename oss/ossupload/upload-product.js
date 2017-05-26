
accessid = ''
accesskey = ''
host = ''
policyBase64 = ''
signature = ''
callbackbody = ''
filename = ''
key = ''
expire = 0
g_object_name = ''
g_object_name_type = ''
now = timestamp = Date.parse(new Date()) / 1000; 

function send_request()
{
    var xmlhttp = null;
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  
    if (xmlhttp!=null)
    {
        serverUrl = '/zjk/ossupload/php/get.php'
        xmlhttp.open( "GET", serverUrl, false );
        xmlhttp.send( null );
        return xmlhttp.responseText
    }
    else
    {
        alert("Your browser does not support XMLHTTP.");
    }
};

function check_object_radio() {
	g_object_name_type = 'random_name';
}

function get_signature()
{
    //可以判断当前expire是否超过了当前时间,如果超过了当前时间,就重新取一下.3s 做为缓冲
    now = timestamp = Date.parse(new Date()) / 1000; 
    if (expire < now + 3)
    {
        body = send_request()
        var obj = eval ("(" + body + ")");
        host = obj['host']
        policyBase64 = obj['policy']
        accessid = obj['accessid']
        signature = obj['signature']
        expire = parseInt(obj['expire'])
        callbackbody = obj['callback'] 
        key = obj['dir']
        return true;
    }
    return false;
}

function random_string(len) {
　　len = len || 32;
　　var chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';   
　　var maxPos = chars.length;
　　var pwd = '';
　　for (i = 0; i < len; i++) {
    　　pwd += chars.charAt(Math.floor(Math.random() * maxPos));
    }
    return pwd;
}

function get_suffix(filename) {
    pos = filename.lastIndexOf('.')
    suffix = ''
    if (pos != -1) {
        suffix = filename.substring(pos)
    }
    return suffix;
}

function calculate_object_name(filename)
{
    if (g_object_name_type == 'local_name')
    {
        g_object_name += "${filename}"
    }
    else if (g_object_name_type == 'random_name')
    {
        suffix = get_suffix(filename)
        g_object_name = key + random_string(10) + suffix
    }
    return ''
}

function get_uploaded_object_name(filename)
{
    if (g_object_name_type == 'local_name')
    {
        tmp_name = g_object_name
        tmp_name = tmp_name.replace("${filename}", filename);
        return tmp_name
    }
    else if(g_object_name_type == 'random_name')
    {
        return g_object_name
    }
}

function set_upload_param(up, filename, ret)
{
    if (ret == false)
    {
        ret = get_signature()
    }
    g_object_name = key;
    if (filename != '') {
        suffix = get_suffix(filename)
        calculate_object_name(filename)
    }
    new_multipart_params = {
        'key' : g_object_name,
        'policy': policyBase64,
        'OSSAccessKeyId': accessid, 
        'success_action_status' : '200', //让服务端返回200,不然，默认会返回204
        'callback' : callbackbody,
        'signature': signature,
    };

    up.setOption({
        'url': host,
        'multipart_params': new_multipart_params
    });

    up.start();
}
$(function () {
	var ossuploader1 = new plupload.Uploader({
			runtimes           : 'html5,flash,silverlight,html4',
			browse_button      : 'selectfiles',
			//multi_selection: false,
			flash_swf_url      : 'lib/plupload-2.1.2/js/Moxie.swf',
			silverlight_xap_url: 'lib/plupload-2.1.2/js/Moxie.xap',
			url                : 'http://oss.aliyuncs.com',
			filters            : {
				mime_types        : [ //只允许上传图片和zip,rar文件
					{title: "Image files", extensions: "jpg,gif,png,bmp"}
				],
				max_file_size     : '2mb', //最大只能上传2mb的文件
				prevent_duplicates: false //不允许选取重复文件
			},
			imageStr:'',
			init: {
				PostInit: function () {
					// 3 .选择文件的按钮 -------------------------------------------------------------------------------------
					$('#container1').find('#postfiles').click(function () {
						// 4.此处uploader要改------------------------------------------------
						set_upload_param(ossuploader1, '', false);
						return false;
					});
				},
				FilesAdded: function (up, files) {
					plupload.each(files, function (file) {
						//5-------------------------------------------------------------------------------------------------
						$('#container1').find('#ossfile').html('<div id="' + file.id + '"><div class="file"><span class="filename">' + file.name + ' (' + plupload.formatSize(file.size) + ')</span><b></b>'
							+ '<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
							+ '</div>');
					});
				},
				BeforeUpload: function (up, file) {
					check_object_radio();
					set_upload_param(up, file.name, true);
				},
				UploadProgress: function (up, file) {

					//6------------------------------------------------------------------------------------------------------
					var d                  = $('#container1').find('#' + file.id);
					d.find('b').eq(0).html = '<span>' + file.percent + "%</span>";
					var prog               = d.find('.progress').eq(0);
					var progBar            = prog.find('.progress-bar')[0];
					progBar.style.width    = 2 * file.percent + 'px';
					progBar.setAttribute('aria-valuenow', file.percent);
				},

				FileUploaded: function (up, file, info) {
					if (typeof isSingle == 'undefined') {
						isSingle = true;
					}
					if (info.status == 200) {
						$('#container1').find('#' + file.id).find('b')[0].innerHTML = '上传成功';
						console.log(host + '/' + get_uploaded_object_name(file.name));
						if (isSingle) {
							ossuploader1.imageStr = host + '/' + get_uploaded_object_name(file.name);
						} else {
							ossuploader1.imageStr += host + '/' + get_uploaded_object_name(file.name) + '::::::';
						}
						//8-----------------------------------------------------------------------------------
						$('#imageUrl').val(ossuploader1.imageStr);
						$('#container1').find('.imageShow').attr('src', ossuploader1.imageStr);
						$('#container1').find('.imageWarp').show();

					}
					else {
						alert(info.response);
						// contain.find('#'+file.id).find('b')[0].innerHTML = info.response;
					}
				}
			}
		}
	);

	ossuploader1.init();

	var ossuploader2 = new plupload.Uploader({
			runtimes           : 'html5,flash,silverlight,html4',
			browse_button      : 'selectfiles2',
			//multi_selection: false,
			flash_swf_url      : 'lib/plupload-2.1.2/js/Moxie.swf',
			silverlight_xap_url: 'lib/plupload-2.1.2/js/Moxie.xap',
			url                : 'http://oss.aliyuncs.com',
			filters            : {
				mime_types        : [ //只允许上传图片和zip,rar文件
					{title: "Image files", extensions: "jpg,gif,png,bmp"}
				],
				max_file_size     : '2mb', //最大只能上传2mb的文件
				prevent_duplicates: false //不允许选取重复文件
			},
			imageStr:'',
			init: {
				PostInit: function () {
					// 3 .选择文件的按钮 -------------------------------------------------------------------------------------
					$('#container2').find('#postfiles2').click(function () {
						// 4.此处uploader要改------------------------------------------------
						set_upload_param(ossuploader2, '', false);
						return false;
					});
				},
				FilesAdded: function (up, files) {
					plupload.each(files, function (file) {
						//5-------------------------------------------------------------------------------------------------
						$('#container2').find('#ossfile').html('<div id="' + file.id + '"><div class="file"><span class="filename">' + file.name + ' (' + plupload.formatSize(file.size) + ')</span><b></b>'
							+ '<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
							+ '</div>');
					});
				},
				BeforeUpload: function (up, file) {
					check_object_radio();
					set_upload_param(up, file.name, true);
				},
				UploadProgress: function (up, file) {

					//6------------------------------------------------------------------------------------------------------
					var d                  = $('#container2').find('#' + file.id);
					d.find('b').eq(0).html = '<span>' + file.percent + "%</span>";
					var prog               = d.find('.progress').eq(0);
					var progBar            = prog.find('.progress-bar')[0];
					progBar.style.width    = 2 * file.percent + 'px';
					progBar.setAttribute('aria-valuenow', file.percent);
				},

				FileUploaded: function (up, file, info) {
					if (typeof isSingle == 'undefined') {
						isSingle = true;
					}
					if (info.status == 200) {
						$('#container2').find('#' + file.id).find('b')[0].innerHTML = '上传成功';
						console.log(host + '/' + get_uploaded_object_name(file.name));
						if (isSingle) {
							ossuploader2.imageStr = host + '/' + get_uploaded_object_name(file.name);
						} else {
							ossuploader2.imageStr += host + '/' + get_uploaded_object_name(file.name) + '::::::';
						}
						//8-----------------------------------------------------------------------------------
						$('#imageUrl2').val(ossuploader2.imageStr);
						$('#container2').find('.imageShow').attr('src', ossuploader2.imageStr);
						$('#container2').find('.imageWarp').show();

					}
					else {
						alert(info.response);
						// contain.find('#'+file.id).find('b')[0].innerHTML = info.response;
					}
				}
			}
		}
	);

	ossuploader2.init();


    var ossuploader3 = new plupload.Uploader({
            runtimes           : 'html5,flash,silverlight,html4',
			//1.-----------------------------------------------------------------------------------------------------
            browse_button      : 'selectfiles3',
            //multi_selection: false,
            flash_swf_url      : 'lib/plupload-2.1.2/js/Moxie.swf',
            silverlight_xap_url: 'lib/plupload-2.1.2/js/Moxie.xap',
            url                : 'http://oss.aliyuncs.com',
            filters            : {
                mime_types        : [ //只允许上传图片和zip,rar文件
                    {title: "Image files", extensions: "jpg,gif,png,bmp"}
                ],
                max_file_size     : '2mb', //最大只能上传2mb的文件
                prevent_duplicates: false //不允许选取重复文件
            },
            imageStr:'',
            init: {
                PostInit: function () {
                    // 3 .选择文件的按钮 -------------------------------------------------------------------------------------
                    $('#container3').find('#postfiles3').click(function () {
                        // 4.此处uploader要改------------------------------------------------
                        set_upload_param(ossuploader3, '', false);
                        return false;
                    });
                },
                FilesAdded: function (up, files) {
                    plupload.each(files, function (file) {
                        //5-------------------------------------------------------------------------------------------------
                        $('#container3').find('#ossfile').html('<div id="' + file.id + '"><div class="file"><span class="filename">' + file.name + ' (' + plupload.formatSize(file.size) + ')</span><b></b>'
                            + '<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
                            + '</div>');
                    });
                },
                BeforeUpload: function (up, file) {
                    check_object_radio();
                    set_upload_param(up, file.name, true);
                },
                UploadProgress: function (up, file) {

                    //6------------------------------------------------------------------------------------------------------
                    var d                  = $('#container3').find('#' + file.id);
                    d.find('b').eq(0).html = '<span>' + file.percent + "%</span>";
                    var prog               = d.find('.progress').eq(0);
                    var progBar            = prog.find('.progress-bar')[0];
                    progBar.style.width    = 2 * file.percent + 'px';
                    progBar.setAttribute('aria-valuenow', file.percent);
                },

                FileUploaded: function (up, file, info) {
                    if (typeof isSingle == 'undefined') {
                        isSingle = true;
                    }
                    if (info.status == 200) {
                        $('#container3').find('#' + file.id).find('b')[0].innerHTML = '上传成功';
                        console.log(host + '/' + get_uploaded_object_name(file.name));
                        if (isSingle) {
                            ossuploader3.imageStr = host + '/' + get_uploaded_object_name(file.name);
                        } else {
                            ossuploader3.imageStr += host + '/' + get_uploaded_object_name(file.name) + '::::::';
                        }
                        //8-----------------------------------------------------------------------------------
                        $('#imageUrl3').val(ossuploader3.imageStr);
                        $('#container3').find('.imageShow').attr('src', ossuploader3.imageStr);
                        $('#container3').find('.imageWarp').show();

                    }
                    else {
                        alert(info.response);
                        // contain.find('#'+file.id).find('b')[0].innerHTML = info.response;
                    }
                }
            }
        }
    );

    ossuploader3.init();
	var imageShow = $('.imageShow');
	if (imageShow.attr('src') != ''){
		$('.imageWarp').show();
	}

    var ossuploader4 = new plupload.Uploader({
            runtimes           : 'html5,flash,silverlight,html4',
            //1.-----------------------------------------------------------------------------------------------------
            browse_button      : 'selectfiles4',
            //multi_selection: false,
            flash_swf_url      : 'lib/plupload-2.1.2/js/Moxie.swf',
            silverlight_xap_url: 'lib/plupload-2.1.2/js/Moxie.xap',
            url                : 'http://oss.aliyuncs.com',
            filters            : {
                mime_types        : [ //只允许上传图片和zip,rar文件
                    {title: "Image files", extensions: "jpg,gif,png,bmp"}
                ],
                max_file_size     : '2mb', //最大只能上传2mb的文件
                prevent_duplicates: false //不允许选取重复文件
            },
            imageStr:'',
            init: {
                PostInit: function () {
                    // 3 .选择文件的按钮 -------------------------------------------------------------------------------------
                    $('#container4').find('#postfiles4').click(function () {
                        // 4.此处uploader要改------------------------------------------------
                        set_upload_param(ossuploader4, '', false);
                        return false;
                    });
                },
                FilesAdded: function (up, files) {
                    plupload.each(files, function (file) {
                        //5-------------------------------------------------------------------------------------------------
                        $('#container4').find('#ossfile').html('<div id="' + file.id + '"><div class="file"><span class="filename">' + file.name + ' (' + plupload.formatSize(file.size) + ')</span><b></b>'
                            + '<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
                            + '</div>');
                    });
                },
                BeforeUpload: function (up, file) {
                    check_object_radio();
                    set_upload_param(up, file.name, true);
                },
                UploadProgress: function (up, file) {

                    //6------------------------------------------------------------------------------------------------------
                    var d                  = $('#container4').find('#' + file.id);
                    d.find('b').eq(0).html = '<span>' + file.percent + "%</span>";
                    var prog               = d.find('.progress').eq(0);
                    var progBar            = prog.find('.progress-bar')[0];
                    progBar.style.width    = 2 * file.percent + 'px';
                    progBar.setAttribute('aria-valuenow', file.percent);
                },

                FileUploaded: function (up, file, info) {
                    if (typeof isSingle == 'undefined') {
                        isSingle = true;
                    }
                    if (info.status == 200) {
                        $('#container4').find('#' + file.id).find('b')[0].innerHTML = '上传成功';
                        console.log(host + '/' + get_uploaded_object_name(file.name));
                        if (isSingle) {
                            ossuploader4.imageStr = host + '/' + get_uploaded_object_name(file.name);
                        } else {
                            ossuploader4.imageStr += host + '/' + get_uploaded_object_name(file.name) + '::::::';
                        }
                        //8-----------------------------------------------------------------------------------
                        $('#imageUrl4').val(ossuploader4.imageStr);
                        $('#container4').find('.imageShow').attr('src', ossuploader4.imageStr);
                        $('#container4').find('.imageWarp').show();

                    }
                    else {
                        alert(info.response);
                        // contain.find('#'+file.id).find('b')[0].innerHTML = info.response;
                    }
                }
            }
        }
    );

    ossuploader4.init();
    var imageShow = $('.imageShow');
    if (imageShow.attr('src') != ''){
        $('.imageWarp').show();
    }

})



