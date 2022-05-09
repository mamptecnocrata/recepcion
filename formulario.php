<!-- línea 1: la cedula -->
<div class="label">
    <label for="cedula">Cédula:</label>
</div>
<div class="input">
    <input type="text" name="cedula" id="cedula" placeholder="Cedula" maxlength="8" value="<?php echo $cedper;?>" <?php echo $params;?> required>
    <input type="hidden" name="id_visita" value="<?php echo $idvisi; ?>" readonly>
</div>
<hr>
<!-- línea 2: nombre -->
<div class="label">
    <label for="nombre">Nombre:</label>
</div>
<div class="input">    
    <input type="text" name="nombre" id="nombre" <?php echo "value='$nomper' "; if($nomper!=='') echo $params; ?> required maxlength="60">
</div>
<hr>
<!-- línea 3: apellido -->
<div class="label">
    <label for="apellido">Apellido:</label>
</div>
<div class="input">    
    <input type="text" name="apellido" id="apellido" <?php echo "value='$apeper'"; if($nomper!=='') echo $params; ?> required maxlength="60">
</div>
<hr>
<!-- línea 4: piso -->
<div class="label">
    <label for="piso">Piso:</label>
</div>
<div class="input">
    <select name="piso" id="piso">
    <?php
        for ($i=0; $i < 6; $i++) {
            echo "<option value=$i";
            if($i == $piso) {
                echo ' selected';
            }
            if($i == 0){
                echo ">PB</option>";
            } else if($i == 5) {
                echo ">Presidencia</option>";
            } else {
                echo ">Piso $i</option>";
            }
        }
    ?>
    </select>
</div>
<hr>
<!-- línea 5:solicita -->
<div class="label">
    <label for="solicita">Solicita:</label>
</div>
<div class="input">
    <input type="text" name="solicita" id="solicita" <?php echo "value='$solicita'"; if($solicita!=='') echo $params; ?> maxlength="99" required>
</div>
<hr>
<!-- línea 6: Motivo -->
<div class="label" id="motivo">
    <label for="cmb_motivo">Motivo:</label>
</div>
<div class="input">
    <select name="cmb_motivo" id="cmb_motivo" onchange="eligeMotivo()">
        <option value="Seleccione">Seleccione</option>
        <option value="Personal" <?php if(($motivo !== '') && ($motivo == 'personal')) echo 'selected'; ?>>Personal</option>
        <option value="Empresa" <?php if(($motivo !== '') && ($motivo != 'personal')) echo 'selected'; ?>>Empresa</option>
    </select>
</div>
<div class="input" id="inp_motivo">
    <?php if($motivo != ""){
        if($motivo != 'personal'){              
            echo '<input type="text" name="inp_motivo" id="inp_motivo" value="'.$motivo.'" readonly>';
        } else {
            echo '<input type="text" name="inp_motivo" id="inp_motivo" value="personal" readonly>';
        }
    }
    ?>
</div>
<hr>
<!-- línea 7: llegada -->
<div class="label">
    <label for="ingreso">Fecha ingreso:</label>
</div>
<div class="input">
    <input type="text" name="ingreso" id="ingreso" value="<?php echo $fecha_sql; ?>" readonly>
    <!--<input type="text" name="fecha_ingreso" id="fecha_ingreso" value="<?php //echo $hora_entrada; ?>" readonly> -->
    </div>
</div>
<hr>
<?php if(!empty($nomper) && !empty($apeper)) { ?>
<!-- línea 8:salida-->
<div class="label">
    <label for="salida">Fecha salida:</label>
    <input type="checkbox" name="chksalida" id="myCheck" onclick="myFunction()">
</div>
<div class="input" id="text" style="display: none;">
    <input type="text" name="salida" id="salida" value="<?php echo $hora_actual; ?>" readonly>
</div>
<hr>
<div class="col-md-12 text-center">
    <img src="<?php echo $foto; ?>" alt="<?php echo $cedper; ?>.png" width="200" height="200">
</div>
<div class="col-md-12 text-center">
    <br/>
    <input type="submit" name="<?php echo strtolower($button); ?>" id="<?php echo strtolower($button); ?>" class="btn btn-success" value="<?php echo $button; ?>">
</div>
<?php } ?>
