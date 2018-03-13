<?php
require_once './autoload.php';

$categorias = CategoriaRepository::listar();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <?php require_once './includes/resources.php';?>
        <script>
            $(function(){
                $('.colorbox').colorbox({
                    photo: true
                });
                
                $('.colorbox-mostrar').colorbox();
            });
            
            function eliminar(id){
                bootbox.confirm({
                    message: '¿Esta seguro que desea eliminar el producto?',
                    buttons: {
                        confirm: {
                            label: 'Eliminar',
                            className: 'btn-danger'
                        },
                        cancel: {
                            label: 'Cancelar',
                            className: 'btn-default'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            window.location.href = 'categoria-eliminar.php?id=' + id
                        }
                    }
                })
            }
        </script>   
    </head>
    <body>
        
        <?php require_once './includes/header.php';?>

        <div class="container-fluid main">
            
            <div class="page-header">
                <h1>Mantenimiento de Productos</h1>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Listado de Productos</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>ORDEN</th>
                            <th width="50"></th>
                            <th width="50"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categorias as $categoria){?>
                        <tr>
                            <td><?=$categoria->id?></td>
                            <td><?=$categoria->nombre?></td>
                            <td><?=$categoria->orden?></td>
                            <td><a href="categoria-editar.php?id=<?=$categoria->id?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Editar</a></td>
                            <td><a href="javascript:void(0)" onclick="eliminar(<?=$categoria->id?>)" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="panel-footer">
                    <a href="categoria-nuevo.php" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
                </div>
            </div>
            
        </div>
        
        <?php require_once './includes/footer.php';?>
        
    </body>
</html>