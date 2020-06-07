$(document).ready(function(){
    $('#gridCheck').on('change', function(){
        if( $('#gridCheck').prop('checked') ) {
            $('#process').attr('disabled', false);
        }else{
            $('#process').attr('disabled', true);
        }
    });
});
