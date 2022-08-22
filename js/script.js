$(function(){
    $(".btn").on("click", function(){
        $.ajax({
            url:"json_mysql.php",
            success: function(result){
                alert("Dados enviados com sucesso")
            }
        })
    });
});


$(document).ready(function () {
    $("#displaybtn").on("click", function(event){
        event.preventDefault();
        $.ajax({
            method: "post",
            url: "mysql_json.php",
            data: $('#resultados').serialize(),
            dataType: "html",
            success: function (response){
                $('#messagedisplay').html(response);
            }
        })
    });
});
