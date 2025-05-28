<div class="posicion-relativa centrar-vertical">
    <main class="contenedor caja">
            <h1>Ver Registros</h1>

        <div class="filters">
            <label>Desde: <input type="date" id="fechaDesde"></label>
            <label>Hasta: <input type="date" id="fechaHasta"></label>
            <input type="text" id="busqueda" placeholder="Buscar persona/proveedor...">
            <button class="filters__boton"onclick="cargarRegistros()">Buscar</button>
            <button class="filters__boton"onclick="exportarPDF()">Exportar PDF</button>
        </div>

        <div class="registros" id="registrosContainer">
            <table class="registros__tabla" id="registrosTabla">
                <thead>
                    <tr>
                        <th class="registros__th">Tipo</th>
                        <th class="registros__th">Nombre</th>
                        <th class="registros__th">Fecha</th>
                        <th class="registros__th">Descripción</th>
                        <th class="registros__th">Monto</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="pagination" id="paginacion"></div>
    </main>
</div>