$(document).ready(function() {
    $("#cbCliente").change(function() {
        $("#cbCliente option:selected").each(function() {
            id_cliente = $(this).val();
            $.post("../crud/getDireccion.php", { id_cliente: id_cliente }, function(data) {
                $("#cbDireccion").html(data);
            });
        });
    })
});