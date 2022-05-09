document.onmousedown=click;

function click() {
  if (event.button==2||event.button==3) {
    oncontextmenu='return false'; alert ('Boton esta bloqueado');
  }
}

// función para validar que se escriba números en un campo de texto
function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\d/;

  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

Webcam.set({
    width: 250,
    height: 250,
    image_format: 'png',
    png_quality: 90
});

Webcam.attach( '#my_camera' );

function take_snapshot() {
    Webcam.snap( function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'" width="250px" height="250px" />';
        document.getElementById('registrar').style.display="inline-block";
    } );
}

function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the button
  var reset = document.getElementById('reset');
  // Get the output text
  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    //reset.style.display = "block";
  } else {
    text.style.display = "none";
    //reset.style.display = "none";
  }
} 

// función que ejecuta un AJAX para obtener la data, y traer el resultado en forma de formulario
function buscarDato(text) {
  if (text.length<6) {
      //document.getElementById("txtHint").innerHTML = "Necesita agregar una cedula valida a registrar";
      //return;
      alert("Necesita agregar una cedula valida a registrar");
      location.href="index.php";
    } else {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    
    //document.getElementById('loading').innerHTML = '<span style="font-weight:bold;">Cargando data...</span>;';
    xhttp.open("GET", "database.php?cedula="+text, true);
    xhttp.send();
  }
}

function eligeMotivo(evt) {
  // comprobar el valor recibido en el select "motivo"
  var motivo = document.getElementById("cmb_motivo").value;
  // realizar una condición: si el selector de motivo dice "empresa", mostrar el input vacío para agregar datos
  if (motivo == 'Empresa'){ 
    document.getElementById("inp_motivo").innerHTML = '<input type="text" name="inpmoti" value="" maxlength="99" placeholder="Empresa" required>';
  }
  // o si el selector de motivo dice "personal", mostrar el input con el valor "personal", pero sin modificarse
  if (motivo == 'Personal'){
    document.getElementById("inp_motivo").innerHTML = '<input type="text" name="inpmoti" value="personal" readonly>';
  }
}