    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/bootstrap3-editable/js/bootstrap-editable.js"></script>
    <script src="/js/math.js"></script>
    <script>
        //turn to inline mode
        $.fn.editable.defaults.mode = 'popup';
    </script>
    <script>
        // make parent table editable
//        $('#edit-table').editable();
        // handle create or add button
        $('#add-btn').on('click', function(){
            $.ajax({
                url: $(this).data('url'),
                method:"GET",
                success:function(data, config) {
                    $('#add-btn').hide();
                    $("#edit-table").find('tbody').append(data);
                    $('.alert-info').html('got through create').show();
                    $('.newRow').editable();
                }
            })
        });
        $('.status').editable({
            ajaxOptions: {
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                }
            },
            source: [
                {value: 1, text: 'Only Me'},
                {value: 2, text: 'Restricted'},
                {value: 3, text: 'Public'},
            ],
            success: function (data, config) {
            }
        });

        //make name required
        $('.required').editable('option', 'validate', function (v) {
            if (!v) return 'Required field!';
        });

        //automatically show next editable (not working)
        $('.edit').on('save.tracks', function () {
            var that = this;
            setTimeout(function () {
                $(that).closest('tr').next().find('.myeditable').editable('show');
            }, 200);
        });

        $('.newRow').editable({
            ajaxOptions: {
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                },
                dataType: 'json' //assuming json response
            },
            url: '/tracks' //this url will not be used for creating new user, it is only for update
        });

            $('.edit').editable({
                ajaxOptions: {
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    },
                }
            });


        $('#save-btn').on('click', function () {
            alert('abc');
            $('.edit').editable('submit', {
                url: $(this).data('url'),
                ajaxOptions: {
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    },
                    dataType: 'json' //assuming json response
                },
                success: function (data, config) {
                    if (data && data.id) {  //record created, response like {"id": 2}
                        //set pk
                        $(this).editable('option', 'pk', data.id);
                        $(this).editable('option', 'url', $(this).data('route') + data.id)
                        //remove unsaved class
                        $(this).removeClass('editable-unsaved');
                        $(this).removeClass('newRow');
                        //show messages
                        var msg = 'New row created successfully.';
                        $('.alert-info').html(msg).show();
                        $('#reset-btn').hide();
                        $('#copy-btn, #status_id').show();
                        $('#save-btn').hide();
                        $('#add-btn').show();
                        //$(this).off('save.tracks');
                    } else if (data && data.errors) {
                        //server-side validation error, response like {"errors": {"username": "username already exist"} }
                        config.error.call(this, data.errors);
                    }
                },
                error: function (errors) {
                    var msg = '';
                    if (errors && errors.responseText) { //ajax error, errors = xhr object
                        msg = errors.responseText;
                    } else { //validation error (client-side or server-side)
                        $.each(errors, function (k, v) {
                            msg += k + ": " + v + "<br>";
                        });
                    }
                    $('.alert-info').html(msg).show();
                }
            });
        });
        $('#reset-btn').on('click', function () {
                $('.myeditable').editable('setValue', null)  //clear values
                        .editable('option', 'pk', null)          //clear pk
                        .removeClass('editable-unsaved');        //remove bold css

                $('#save-btn').show();
                $('#msg').hide();
            });
    </script>