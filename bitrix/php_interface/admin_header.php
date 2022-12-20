<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        if($('#edit1 .adm-input-file-exist-cont').length>0){
            var cnt=1;
            $('#edit1 .adm-input-file-exist-cont').each(function(){
                $(this).children(':first').before('<div style="float:left;font-size: 200%;">'+cnt+'.</div>');
                cnt++;
            });
        }
    });
</script>