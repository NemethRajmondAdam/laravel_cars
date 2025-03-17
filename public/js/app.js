$(document).ready(function() {

    // Manufacturer Change
    $('#select-maker').change(function () {
        // Manufacturer id
        var id = $(this).val();

        // Empty the models dropdown
        $('#select-model').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
			// meghívjuk a végpontot
            url: '/makers/' + id + '/fetch-models',
            type: 'get',
            dataType: 'json',
            success: function (response) {
				// Feldolgozzuk a végponttól kapott választ
                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }
				
                if (len > 0) {
                    // Read data and create <option >
                    for (var i = 0; i < len; i++) {
                        var id = response['data'][i].id;
                        var name = response['data'][i].name;
                        var option = "<option value='" + id + "'>" + name + "</option>";

                        $("#select-model").append(option);
                    }
                }
            }
        });
    }); 
})