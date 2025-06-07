<?php
require_once "main.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proveedor_id'])) {
    $pdo = conexion();

    $proveedor_id = limpiar_cadena($_POST['proveedor_id']);

    try {
        // Inicia una transacción para asegurar integridad
        $pdo->beginTransaction();

        // Elimina las facturas del proveedor
        $stmt = $pdo->prepare("DELETE FROM facturas WHERE proveedor_id = :id");
        $stmt->execute([':id' => $proveedor_id]);

        // Elimina el proveedor
        $stmt = $pdo->prepare("DELETE FROM proveedores WHERE id = :id");
        $stmt->execute([':id' => $proveedor_id]);

        // Confirma la transacción
        $pdo->commit();

        // Redirecciona o muestra mensaje
        header("Location: ../index.php?vistas=home");
        exit(); // Es importante detener la ejecución después de redireccionar
    } catch (Exception $e) {
        // Si hay error, hacer rollback
        $pdo->rollBack();
        echo "<div class='mensaje_exito'>
                <p class='mensaje_exito__p'>Error al eliminar: " . htmlspecialchars($e->getMessage()) . "</p>
              </div>";
    }
}
/**require_once "main.php";
    $pdo = conexion();

    $proveedor_id = limpiar_cadena($_POST['proveedor_id']);

    $stmt = $pdo->prepare("DELETE FROM facturas WHERE proveedor_id = :id");
    $stmt->execute([
    ':id' => $proveedor_id
    ]);

    if(isset($proveedor_id)){
        echo "<div class='mensaje_exito'>
            <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
        </div>";

        header("Location: ../index.php?vistas=home");
    }else{
        echo "<div class='mensaje_exito'>
            <p class='mensaje_exito__p'>El Registro se ha modificado correctamente.</p>
        </div>";
    }

    $stmt = $pdo->prepare("DELETE FROM proveedor_id WHERE id = :id");
    $stmt->execute([
    ':id' => $proveedor_id
    ]);

    $pdo = null;
**/
?>