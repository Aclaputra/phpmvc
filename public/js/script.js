$(function() {
    $('.buttonAddData').on('click', function() {
        $('#formModalLabel').html('Add Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Add Data');
    });

    $('.showModalChange').on('click', function() {
        $('#formModalLabel').html('Update Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/update');

        const id = $(this).data('id');  
        
        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getdata',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
    });
});