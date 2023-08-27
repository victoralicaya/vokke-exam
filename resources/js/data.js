$(document).ready(function () {
    $('#notif').hide();
    $('#submit').click(function (e) {
        e.preventDefault();

        const id = $('#kangaroo-id').val();

        console.log('ID: ' + id);

        const name = $('#name').val();
        const nickname = $('#nickname').val();
        const weight = $('#weight').val();
        const height = $('#height').val();
        const gender = $('#gender').val();
        const color = $('#color').val();
        const friendliness = $('#friendliness').val();
        const birthday = $('#birthday').val();

        const data = {
            name: name,
            nickname: nickname,
            weight: weight,
            height: height,
            gender: gender,
            color: color,
            friendliness: friendliness,
            birthday: birthday
        };

        var api = '';
        var type = '';

        if (id == undefined) {
            api = apiUrl;
            type = 'POST';
        } else {
            api = '/api/edit-kangaroo/' + id;
            type = 'PUT';
        }

        $.ajax({
            url: api,
            type: type,
            data: data,
            success: function (response) {
                $('#notif').fadeIn().removeClass('failed').addClass('success');
                $('#notif-text').text(response.message + '. You can now go back to the homepage.');
                clearErrorMessages();
                if (id == undefined) {
                    $('#name').val('');
                    $('#nickname').val('');
                    $('#weight').val('');
                    $('#height').val('');
                    $('#gender').val('');
                    $('#color').val('');
                    $('#friendliness').val('');
                    $('#birthday').val('');
                }
                $.each(errors.responseJSON.errors, function (field, errorMessages) {
                    var errorMessage = errorMessages[0];
                    $('#' + field + '-error').text(errorMessage);
                });
            },
            error: function (errors) {
                console.error(errors.responseJSON.message);
                console.error(errors.responseJSON.errors);

                $('#notif').fadeIn().addClass('failed');
                $('#notif-text').text(errors.responseJSON.message);

                $.each(errors.responseJSON.errors, function (field, errorMessages) {
                    var errorMessage = errorMessages[0];
                    $('#' + field + '-error').text(errorMessage);
                });
            }
        });
    });

    $.ajax({
        url: getApiUrl,
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#datacontainer').dxDataGrid({
                dataSource: response.data,
                columns: [
                    { dataField: 'name', caption: 'Name' },
                    { dataField: 'weight', caption: 'Weight' },
                    { dataField: 'height', caption: 'Height' },
                    { dataField: 'gender', caption: 'Gender' },
                    { dataField: 'friendliness', caption: 'Friendliness' },
                    { dataField: 'birthday', caption: 'Birthday'},
                ],
                showBorders: true,
                searchPanel: {
                    visible: true,
                    width: 300,
                    placeholder: 'Search...',
                    highlightCaseSensitive: false
                },
                onRowClick: function (e) {
                    var rowData = e.data;
                    window.location.href = '/update-kangaroo/' + rowData.id;
                },
                paging: {
                    pageSize: 20,
                },
                pager: {
                    visible: true,
                    allowedPageSizes: false,
                    showPageSizeSelector: true,
                    showInfo: true,
                    showNavigationButtons: true,
                },
            })
        },
        error: function (error) {
            console.error(error);
        }
    });

    function clearErrorMessages() {
        $("[id$='-error']").text('');
    }
});
