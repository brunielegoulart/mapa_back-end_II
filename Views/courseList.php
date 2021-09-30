<script src="Views/js/deleteFunction.js"></script>

<script>
    deleteUrl = "index.php?c=course&f=delete";
</script>

<?php include('_deleteModal.php');?>

<div class="row">
    <div class="col">

        <?php  include('Views/_message.php'); ?>

        <h2>Lista de cursos</h2>
        <a class="btn btn-primary" href="index.php?c=course&f=add"> + Novo curso</a>

        <form action="index.php?c=course&f=search" method="POST">
            <div class="row mt-3">
                <div class="col">
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        placeholder="Buscar por nome"
                        value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>">
                </div>
                <div class="col-3">
                    <select name="status" class="form-control">
                        <option value="1" <?php if(isset($_POST['status'])){ if($_POST['status'] == 1){echo 'selected';}} ?>>Ativo</option>
                        <option value="0" <?php if(isset($_POST['status'])){ if($_POST['status'] == 0){echo 'selected';}} ?>>Inativo</option>
                    </select>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="index.php?c=course" class="btn btn-info">Limpar</a>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>I
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Data início</th>
                    <th>Data fim</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $course):?>
                    <?php 
                     $dateSatrt = new dateTime($course['dateStart']);
                     $dateFinish = new DateTime($course['dateFinish']);   
                    ?>
                <tr>
                    <td><?php echo $course['id']?></td>
                    <td><?php echo $course['nameCourse']?></td>
                    <td><?php echo $dateSatrt->format('d/m/Y')?></td>
                    <td><?php echo $dateFinish->format('d/m/Y')?></td>
                    <td>
                        <a href="index.php?c=course&f=edit&id=<?php echo $course['id']?>" class="btn btn-secondary">Editar</a>
                        <button type="button" class="btn btn-danger"onclick="deleteItem(<?php echo $course['id']?>)">Excluir</button>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
