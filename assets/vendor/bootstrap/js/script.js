$(function () {
   
    $('.tombolTambahData').on('click', function () {
        $('#newJdwlModalLabel').html('Tambah Jadwal Shift');
        $('.modal-footer button[type=submit]').html('Add');
    });

    
    $('.tampilModalUbah').on('click', function () {
        
        $('#newJdwlModalLabel').html('Edit Jadwal Shift');
        $('.modal-footer button[type=submit]').html('Edit');


        const id = $(this).data('i d');
        

        $.ajax({
            url:  'http://localhost/pgt/user/jadwal/user/getubah',
            data: { id: id },
            method: 'post',

            succes: function (data) {
                console.log(data);
            }
        }) ;
    });
});