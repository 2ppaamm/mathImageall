    <script>
        //turn to inline mode
        $.fn.editable.defaults.mode = 'inline';
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var url = window.location;
            $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
            $('ul.nav a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');
        });
    </script>
    <script>
    </script>
    <script>
        $(document).ready(function() {
            $('.selection-new').change(function(){
                $(this).hide();
                $(this).prev().show();
                $(this).prev().html($('option:selected',this).text());
                $(this).prev().attr('data-value',$('option:selected',this).val());
            });
            $('.selection').click(function(){
                $(this).next().show();
                $(this).hide();
            });
            $('.selection-list').change(function() {
                $.ajax
                ({
                    beforeSend: function (request) {
                            request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    },
                    url: $(this).data('url'),
                    data: {"name": $(this).attr('name'), "value": $(this).val(), 'pk':$(this).data('pk')},
                    type: 'post',
                    success: function (result) {
                        var msg = 'Record updated successfully.';
                        $('.alert-info').html(msg).show();
                    }
                });
                $(this).hide();
                $(this).prev().show();
                $(this).prev().html($('option:selected',this).text());
            })
            $('.edit, .newRow').editable({
                ajaxOptions: {
                    beforeSend: function (request) {
                        request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    },
                    dataType: 'json' //assuming json response
                },
                source: [
                    {value: 1, text: 'Only Me'},
                    {value: 2, text: 'Restricted'},
                    {value: 3, text: 'Public'},
                ],
            });
        });

        $('#add-btn').click(function(){
            $('#newForm').show();
        });

        $('#add-first').click(function(){
            $('.table').show();
            $('#newForm').show();
        });

        // Add new row
        //make username required
        $('.required').editable('option', 'validate', function(v) {
            if(!v || v<0) return 'Required field!';
        });

        $('#save-btn').click(function() {
            $('.newRow').editable('submit', {
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
                        //show messages
                        var msg = 'New row created successfully.';
                        $('.alert-info').html(msg).show();
                        $('#reset-btn').hide();
                        //$('#copy-btn, #status_id').show();
                        $('#save-btn').hide();
                        $('#add-btn').show();
                        window.location.reload();
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
    </script>
    <script>
        $(".delete-form").submit(function() {
            var c = confirm("Once confirmed, information and links cannot be retrieved. Really want to continue?");
            return c;
        });
    </script>

    <script>
        $('.file-remove').click(function(){
            var file_input_id =$(this).data('file');
            $('#'+file_input_id).val('');
            $('#'+file_input_id+'_link').attr('src',"/js/placeholder-image.png");
        })
    </script>