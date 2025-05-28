<?php
$pdo = conexion();

// Construir condiciones de filtrado
$whereParts = [];
$params = [];

if ($fechaDesde) {
    $whereParts[] = "d.fecha >= :fechaDesde";
    $params[':fechaDesde'] = $fechaDesde;
}
if ($fechaHasta) {
    $whereParts[] = "d.fecha <= :fechaHasta";
    $params[':fechaHasta'] = $fechaHasta;
}
if ($busqueda) {
    $whereParts[] = "(p.nombre LIKE :busqueda OR p.apellido LIKE :busqueda OR p.razonSocial LIKE :busqueda)";
    $params[':busqueda'] = '%' . $busqueda . '%';
}

$whereSql = '';
if (count($whereParts) > 0) {
    $whereSql = 'WHERE ' . implode(' AND ', $whereParts);
}

// Consulta para 'deudas' con join a 'personas'
$deudasSql = "
SELECT 
  'Deuda' AS tipo, 
  CONCAT(p.nombre, ' ', p.apellido) AS nombre, 
  d.fecha, 
  d.descripcion, 
  d.monto
FROM 
  deudas d
JOIN 
  personas p ON d.persona_id = p.id
$whereSql";

// Consulta para 'facturas' con join a 'proveedores'
$facturasSql = "
SELECT 
  'Factura' AS tipo, 
  p.razonSocial AS nombre, 
  f.fecha, 
  f.descripcion, 
  f.monto
FROM 
  facturas f
JOIN 
  proveedores p ON f.proveedor_id = p.id
$whereSql";

// Preparar y ejecutar la consulta de deudas
$stmtDeudas = $pdo->prepare($deudasSql);
$stmtDeudas->execute($params);
$deudas = $stmtDeudas->fetchAll(PDO::FETCH_ASSOC);

// Preparar y ejecutar la consulta de facturas
$stmtFacturas = $pdo->prepare($facturasSql);
$stmtFacturas->execute($params);
$facturas = $stmtFacturas->fetchAll(PDO::FETCH_ASSOC);

// Combinar resultados en un solo array
$resultados = array_merge($deudas, $facturas);

// Opcional: ordenar resultados por fecha
usort($resultados, function($a, $b) {
    return strtotime($a['fecha']) - strtotime($b['fecha']);
});

// Mostrar resultados
echo "<table border='1'>";
echo "<tr><th>Tipo</th><th>Nombre</th><th>Fecha</th><th>Descripción</th><th>Monto</th></tr>";
foreach ($resultados as $row) {
    echo "<tr>";
    echo "<td>{$row['tipo']}</td>";
    echo "<td>{$row['nombre']}</td>";
    echo "<td>{$row['fecha']}</td>";
    echo "<td>{$row['descripcion']}</td>";
    echo "<td>{$row['monto']}</td>";
    echo "</tr>";
}
echo "</table>";