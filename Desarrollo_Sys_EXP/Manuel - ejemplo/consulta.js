document.addEventListener("DOMContentLoaded", function () {
  $("#consulta").click(function () {
    LimpiarFormulario();
    $("#ModalProducto").modal();
    //se capturan los datos input del sintoma
    var id = document.getElementById("id_sintoma").value;
    let seleccionados = document.getElementById("id_sintoma").selectedOptions;
    for (let i = 0; i < seleccionados.length; i++) {
      console.log(seleccionados[i].value);
    }

    var dats_id =
      "<p id=>es la descripcion de la falla en la impresora id: " + id + "</p>";
    var result = document.createElement("p");
    result.innerHTML = dats_id;
    document.getElementById("desc_falla").appendChild(result);
  });

  function LimpiarFormulario() {
    $("#desc_falla");
  }
});
