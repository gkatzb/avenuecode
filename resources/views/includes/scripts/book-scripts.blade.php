<?php
/**
 * Created by Gabriela Katz
 */
?>
<script>
    var bookId = $('#book_id').val();

    function clearFields(){
        $('#book_id').val('');
        $('#editor_id').val('');
        $('#title').val('');
        $('#year').val('');
        $('#edition').val('');
    }

    function populateBookForm(bookId){
        var url = '{{ route("get.book", ":book_id") }}';
        url = url.replace(':book_id', bookId);
        $.ajax({
            method: 'GET',
            url: url,
            dataType: "json",
            success: function(data){
                var data = data[0];
                if(typeof data != 'undefined'){
                    $('#editor_id').val(data.editor_id);
                    $('#title').val(data.title);
                    $('#year').val(data.year);
                    $('#edition').val(data.edition);
                    return data[0];
                } else {
                    clearFields();
                }

            },
            error: function(){
                $('.alert-danger').text('An error occurred while getting book\'s information');
                $('.alert-danger').removeClass('hidden');
                $('#modal-book-details').modal('hide');
                setTimeout(function(){
                    $('.alert-danger').addClass('hidden');
                }, 2000);
            },
            fail: function(){
                clearFields();
            }
        });
    }

    $(window).load(function(){
        clearFields();
    });

    $("#frm-book").validate({
        rules: {
            editor_id: {
                required: true
            },
            name: {
                required: true
            }
        },
        messages: {
            editor_id: {
                required: "Required field"
            },
            title: {
                required: "Required field"
            },
            year: {
                required: "Required field"
            },
            edition: {
                required: "Required field"
            }
        },
        ignore: '.ignore'
    });

    $('#modal-book-details').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var bookId = button.data('book-id');
        var title = button.data('title');
        var year = button.data('year');
        var edition = button.data('edition');
        var editId = button.data('editor-id');

        if(bookId == ''){
            $('#editor_id').val('');
            $("#btn-update-book").addClass('hidden');
            $("#btn-insert-book").removeClass('hidden');
        } else {
            populateBookForm(bookId);
            $("#btn-insert-book").addClass('hidden');
            $("#btn-update-book").removeClass('hidden');
        }

        modal.find('#title').text(title);
        modal.find('#edition').text(edition);
        modal.find('#year').text(year);
        modal.find('#book_id').val(bookId);
        modal.find('#editor_id').val(editId);
    });

    $("#modal-book-details").on('hide.bs.modal', function(){
        clearFields();
    });

    $("#btn-insert-book").on('click', function(){
        if($("#frm-book").valid()){
            $.ajax({
                method: 'POST',
                url: 'book',
                async: false,
                data: $("#frm-book").serialize(),
                dataType: 'JSON',
                success: function() {
                    location.reload(true);
                },
                error: function(){
                    $('.alert-error').text('An error occurred while inserting book\'s information');
                    $('.alert-error').removeClass('hidden');
                    $('#modal-book-details').modal('hide');
                    setTimeout(function(){
                        $('.alert-error').addClass('hidden');
                    }, 2000);
                },
                fail: function() {
                    $('.alert-error').text('An error occurred while inserting book\'s information');
                    $('.alert-error').removeClass('hidden');
                    $('#modal-book-details').modal('hide');
                    setTimeout(function(){
                        $('.alert-error').addClass('hidden');
                    }, 2000);
                }
            });
        }
    });

    $("#btn-update-book").on('click', function(e){
        if($("#frm-book").valid()){
            $.ajax({
                method: 'PUT',
                url: 'book',
                async: false,
                data: $("#frm-book").serialize(),
                dataType: 'JSON',
                success: function() {
                    $('.alert-success').text('Book successfully updated!');
                    $('.alert-success').removeClass('hidden');
                    $('#modal-book-details').modal('hide');
                    setTimeout(function(){
                        $('.alert-success').addClass('hidden');
                        location.reload(true);
                    }, 2000);
                },
                error: function(){
                    $('.alert-error').text('An error occurred while updating book\'s information');
                    $('.alert-error').removeClass('hidden');
                    $('#modal-book-details').modal('hide');
                    setTimeout(function(){
                        $('.alert-error').addClass('hidden');
                    }, 2000);
                },
                fail: function() {
                    $('.alert-error').text('An error occurred while updating book\'s information');
                    $('.alert-error').removeClass('hidden');
                    $('#modal-book-details').modal('hide');
                    setTimeout(function () {
                        $('.alert-error').addClass('hidden');
                    }, 2000);
                }
            });
            $("#modal-book-details").modal('hide');
        }
    });

    $('.btn-delete-book').on('click', function(){
        var bookId = $(this).data('book-id');
        var token = $(this).data('token');
        $.ajax({
            method: 'POST',
            url: 'book',
            async: false,
            data: {
                _method: 'delete',
                _token: token,
                book_id: bookId
            },
            dataType: 'JSON',
            success: function() {
                $('.alert-success').text('Book successfully removed!');
                $('.alert-success').removeClass('hidden');
                $('#modal-book-details').modal('hide');
                setTimeout(function(){
                    $('ico_delete').css('margin-top','0px')
                    $('.alert-success').addClass('hidden');
                    location.reload(true);
                }, 2000);
            },
            error: function(){
                $('.alert-error').text('An error occurred while removing book\'s information');
                $('.alert-error').removeClass('hidden');
                $('#modal-book-details').modal('hide');
                setTimeout(function () {
                    $('.alert-error').addClass('hidden');
                }, 2000);
            },
            fail: function() {
                $('.alert-error').text('An error occurred while removing book\'s information');
                $('.alert-error').removeClass('hidden');
                $('#modal-book-details').modal('hide');
                setTimeout(function () {
                    $('.alert-error').addClass('hidden');
                }, 2000);
            }
        });
    });
</script>