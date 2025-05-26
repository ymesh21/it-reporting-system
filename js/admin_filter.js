$("#f_year").on('change', function(){
    var year = $(this).val();
    // alert(year);
    $.ajax({
        url: "./inc/admin_filter.php",
        type: "POST",
        data: "request=" + year,
        beforeSend: function(){
            $(".table-responsive").html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div></div>');
        },
        success: function(data){
            $(".table-responsive").html(data);
        }
    })
});