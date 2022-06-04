const host = 'http://localhost/prueba/'
const src_load = 'http://localhost/prueba/public/common/img/ajax-loader.gif'
const html_load = '<center><img src="' + src_load + '"/></center>'
$(document).ready(function () {
    $(document).on('click', '#btnGetInfoData', function () {
        $.ajax({
            type: 'POST',
            url: host + 'api/getToken',
            data: '',
            dataType: 'json',
            success: function (json) {
                if (json.response === 'Success') {
                    LoginApi(json.data)
                } else {
                    $('.putRowsJson').empty()
                    alert('Error al generar token')
                }
            },
            beforeSend: function () {
                $('.putRowsJson').html(html_load)
            }
        });
    });
    function LoginApi(result) {
        let data = {
            'txtToken': result.token
        };
        $.ajax({
            type: 'POST',
            url: host + 'api/loginApi',
            data: data,
            dataType: 'json',
            success: function (result) {
                if (result.response === 'Success') {
                    getDatos(result.data)
                } else {
                    $('.putRowsJson').empty()
                    alert('Error en login')
                }
            }
        });
    }

    function getDatos(result) {
        let data = {
            'txtSessionName': result.sessionName
        };
        $.ajax({
            type: 'POST',
            url: host + 'api/getDatos',
            data: data,
            dataType: 'json',
            success: function (info) {
                if (info.response === 'Success') {
                    let html = ''
                    let item = info.data
                    for (var i = 0; i < item.length; i++) {
                        html += '<tr>';
                        html += '<td>' + item[i].id + '</td>'
                        html += '<td>' + item[i].contact_no + '</td>'
                        html += '<td>' + item[i].lastname + '</td>'
                        html += '<td>' + item[i].createdtime + '</td>'
                        html += '</tr>'
                    }
                    $('.putRowsJson').html(html)
                } else {
                    $('.putRowsJson').empty()
                    alert('Error al obtener datos')
                }
            }
        });
    }
});

