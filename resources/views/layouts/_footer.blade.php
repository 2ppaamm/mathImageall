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
        $(document).ready(function() {
            $('.edit').editable({
                ajaxOptions: {
                    beforeSend: function (request)
                    {
                        request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    },
                }
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
                success: function(data, config) {
                }
            });
        });
    </script>