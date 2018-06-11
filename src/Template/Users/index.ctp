
<h3 class="title2 text-center"> Usuarios </h3>

<div class="board col-xs-12 col-sm-12 col-md-12 col-lg-12">

	
<table class="table table-responsive table-bordered display">
	<thead >
		<tr class="text-center">
			<th>Nombre de Usuario</th>
			<th>Rol</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $key => $user) { ?>
		<tr>
			<td><?php echo $user->username;?></td>
			<td><?php echo $user->role;?></td>
			<td class="text-center"><b><?php echo $this->Html->link('Editar datos', ['controller'=>'Users', 'action'=>'edit', $user->id]); ?></b></td>
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td></td><td></td><td></td>
		</tr>
	</tfoot>
</table>
</div>



<script type="text/javascript" language="javascript">
$(document).ready(function() {

    $('table.display').DataTable( {
    	initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
    	"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
       "language": {
            "lengthMenu": "Mostrar _MENU_ lineas por página",
            "zeroRecords": "No se encontraron resultados",
            "infoFiltered": "<br> Resultados filtrados: <b>_TOTAL_</b>",
            "info": "Total de registros:  _MAX_ ",
            "infoEmpty": "No se encontraron resultados",
            "search":  "Buscar:",
            "paginate": {
		        "first":      "Primero",
		        "last":       "Último",
		        "next":       "Siguiente >",
		        "previous":   "< Previo"
		    },
		}

    });

} );
</script>