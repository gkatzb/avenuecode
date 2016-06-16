<?php
/**
 * Created by Gabriela Katz
 */
?>
<script>
    var editorId = $('#editor_id').val();

    function clearFields(){
        $('#editor_id').val('');
        $('#name').val('');
    }

    function populateEditorForm(editId){
        var url = '{{ route("get.editor", ":editor_id") }}';
        url = url.replace(':editor_id', editId);
        $.ajax({
            method: 'GET',
            url: url,
            dataType: "json",
            success: function(data){
                var data = data[0];
                if(typeof data != 'undefined'){
                    $('#name').val(data.name);
                    return data[0];
                } else {
                    clearFields();
                }

            },
            error: function(){
                $('.alert-danger').text('An error occurred while getting editor\'s information');
                $('.alert-danger').removeClass('hidden');
                $('#modal-editor-details').modal('hide');
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

    $("#frm-editor").validate({
        rules: {
            name: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Required field"
            }
        },
        ignore: '.ignore'
    });

    $('#modal-editor-details').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var editId = button.data('editor-id');
        var name = button.data('name');

        if(editId == ''){
            $('#editor_id').val('');
            $("#btn-update-editor").addClass('hidden');
            $("#btn-insert-editor").removeClass('hidden');
        } else {
            populateEditorForm(editId);
            $("#btn-insert-editor").addClass('hidden');
            $("#btn-update-editor").removeClass('hidden');
        }

        modal.find('#name').text(name);
        modal.find('#editor_id').val(editId);
    });

    $("#modal-editor-details").on('hide.bs.modal', function(){
        clearFields();
    });

    $("#btn-insert-editor").on('click', function(){
        if($("#frm-editor").valid()){
            $.ajax({
                method: 'POST',
                url: 'editor',
                async: false,
                data: $("#frm-editor").serialize(),
                dataType: 'JSON',
                success: function() {
                    location.reload(true);
                },
                error: function(){
                    $('.alert-error').text('An error occurred while inserting editor\'s information');
                    $('.alert-error').removeClass('hidden');
                    $('#modal-editor-details').modal('hide');
                    setTimeout(function(){
                        $('.alert-error').addClass('hidden');
                    }, 2000);
                },
                fail: function() {
                    $('.alert-error').text('An error occurred while inserting editor\'s information');
                    $('.alert-error').removeClass('hidden');
                    $('#modal-editor-details').modal('hide');
                    setTimeout(function(){
                        $('.alert-error').addClass('hidden');
                    }, 2000);
                }
            });
        }
    });

    $("#btn-update-editor").on('click', function(e){
        if($("#frm-editor").valid()){
            $.ajax({
                method: 'PUT',
                url: 'editor',
                async: false,
                data: $("#frm-editor").serialize(),
                dataType: 'JSON',
                success: function() {
                    $('.alert-success').text('Editor successfully updated!');
                    $('.alert-success').removeClass('hidden');
                    $('#modal-editor-details').modal('hide');
                    setTimeout(function(){
                        $('.alert-success').addClass('hidden');
                        location.reload(true);
                    }, 2000);
                },
                error: function(){
                    $('.alert-error').text('An error occurred while updating editor\'s information');
                    $('.alert-error').removeClass('hidden');
                    $('#modal-editor-details').modal('hide');
                    setTimeout(function(){
                        $('.alert-error').addClass('hidden');
                    }, 2000);
                },
                fail: function() {
                    $('.alert-error').text('An error occurred while updating editor\'s information');
                    $('.alert-error').removeClass('hidden');
                    $('#modal-editor-details').modal('hide');
                    setTimeout(function () {
                        $('.alert-error').addClass('hidden');
                    }, 2000);
                }
            });
            $("#modal-editor-details").modal('hide');
        }
    });

    $('.btn-delete-editor').on('click', function(){
        var editId = $(this).data('editor-id');
        var token = $(this).data('token');
        $.ajax({
            method: 'POST',
            url: 'editor',
            async: false,
            data: {
                _method: 'delete',
                _token: token,
                editor_id: editId
            },
            dataType: 'JSON',
            success: function() {
                $('.alert-success').text('Editor successfully removed!');
                $('.alert-success').removeClass('hidden');
                $('#modal-editor-details').modal('hide');
                setTimeout(function(){
                    $('.alert-success').addClass('hidden');
                    location.reload(true);
                }, 2000);
            },
            error: function(){
                $('.alert-error').text('An error occurred while removing editor\'s information');
                $('.alert-error').removeClass('hidden');
                $('#modal-editor-details').modal('hide');
                setTimeout(function () {
                    $('.alert-error').addClass('hidden');
                }, 2000);
            },
            fail: function() {
                $('.alert-error').text('An error occurred while removing editor\'s information');
                $('.alert-error').removeClass('hidden');
                $('#modal-editor-details').modal('hide');
                setTimeout(function () {
                    $('.alert-error').addClass('hidden');
                }, 2000);
            }
        });
    });
</script>