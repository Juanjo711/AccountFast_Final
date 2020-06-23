<?php

/**
 * redirecciona la pagina deseada
 * @param  string $pagina
 * @return void
 */
function redireccionar($pagina){
    echo "<script>window.location.href='". RUTA_URL . $pagina . "'</script>";
}
