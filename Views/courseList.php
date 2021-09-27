<div class="row">
    <div class="col">

        <h2>Lista de cursos</h2>
        <a class="btn btn-primary" href="index.php?c=course&f=add"> + Novo curso</a>

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
                        <button type="button" class="btn btn-secondary">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
