
var cont = 0;
var total = 0;
var detalleventa = [];
var subtotal = [];
var controlproducto = [];
$(document).ready(function () {
    $('#cliente_id').change(function () {
        mostrarCliente();
        });
        $('#platos').change(function () {
        mostrarProducto();
        });
        $('#btnadddet').click(function () {
        agregarDetalle();
        });
        
});

function mostrarMensajeError(mensaje) {
    $(".alert").css('display', 'block');
    $(".alert").removeClass("hidden");
    $(".alert").addClass("alert-danger");
    $(".alert").html("<button type='button' class='close' dataclose='alert'></button>" +"<span><b>Error!</b> " + mensaje + ".</span>");
    $('.alert').delay(5000).hide(400);
}

function agregarDetalle() {
    datos= document.getElementById('platos').value.split('_');
    x=datos[0];
    nombreplato = $('#platos option:selected').text();
    if (nombreplato == 'Seleccione Plato') {
        mostrarMensajeError("Por favor seleccione un plato");
        return false;
    }
    precio = $("#precio").val();
    especificacion = $("#especificacion").val();
    idplato = x;
    cantidad = $("#unidad").val();
    if (cantidad == '' || cantidad == 0 || cantidad == null) {
        mostrarMensajeError("Por favor ingrese cantidad del producto");
        return false;
    }
    else if (cantidad <= 0) {
        mostrarMensajeError("Por favor debe escribir cantidad del producto mayor a 0 ");
        return false;
    }   
    var i = 0;
    var band = false;
    while (i < cont) {
        if (controlproducto[i] == idplato) {
            band = true;
        }
        i = i + 1;
    }
    if (band == true) {
        
        mostrarMensajeError("No puede volver a vender el mismo producto.");
        return false;
    } else { 
        subtotal[cont] = cantidad*precio;
        controlproducto[cont] = idplato;
        total = total + subtotal[cont];
        var fila = '<tr class="selected" id="fila' + cont + '">'
            +'<td style="text-align:center;"><button type="button" class="btn btn-danger btn-xs" onclick="eliminardetalle(' + idplato + ',' + cont + ');"><i class="fa fa-times" ></i></button></td>'
            + '<td style="text-align:center;"><input type="text" name="idplato[]" value="' + idplato + '"readonly style="width:50px; text-align:right; border: 0px; background-color: transparent"></td>'
            + '<td>' + nombreplato + '</td>'
            + '<td style="text-align:center;"><input type="number" name="cantidad[]" value="' + cantidad + '"style="width:80px; text-align:right; border: 0px;background-color: transparent" readonly="readonly"></td>'
            + '<td style="text-align:center;"><input type="number" name="precio[]" value="' + precio + '" style="width:80px; text-align:right; border: 0px;background-color: transparent" readonly></td>'
            + '<td style="text-align:center;"><input type="text" name="especificacion[]" value="' + especificacion + '" style="width:80px; text-align:right; border: 0px;background-color: transparent" readonly></td>'
            + '<td style="text-align:center;"><input type="text" name="subtotal[]" value="' + cantidad*precio + '" style="width:80px; text-align:right; border: 0px;background-color: transparent" readonly></td>'
        + '</tr>';
        $('#detalles').append(fila);
        detalleventa.push({
            idplato: idplato,
            precio: precio,
            cantidad: cantidad,
            especificacion: especificacion,
            subtotal: subtotal,
        });
        cont++;
    }
    $('#total').val(number_format(total, 2));
    limpiar();
}

function eliminardetalle(codigo, index) {
    total = total - subtotal[index];
    tam = detalleventa.length;
    var i = 0;
    var pos;
    while (i < tam) {
        if (detalleventa[i].codigo == codigo) {
            pos = i;
            break;
        }
        i = i + 1;
    }
    detalleventa.splice(pos, 1);
    $('#fila' + index).remove();
    controlproducto[index] = "";
    $('#total').val(number_format(total, 2));
}

function mostrarProducto() {
    datos= document.getElementById('platos').value.split('_');
    $('#precio').val(datos[2]);
}
   
function limpiar() { 
    $("#platos").val("0").change();
    $("#unidad").val('');
    $("#precio").val('');
    $("#especificacion").val('');
}

function number_format(amount, decimals) {
    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.] /g, '')); // elimino cualquier cosa que no sea numero o punto
    decimals = decimals || 0; // por si la variable no fue fue pasada
    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
    return parseFloat(0).toFixed(decimals);
    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);
    var amount_parts = amount.split('.'),
    regexp = /(\d+)(\d{3})/;
    while (regexp.test(amount_parts[0]))
    amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
    return amount_parts.join('.');
}
