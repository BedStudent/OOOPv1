<?php require "views/_partials/head.view.php";?>

<div class="container">
    <div class="card">
        <div class="card-header">
            TODO app
        </div>
        <div class="card-header">
           <a href="/add-task" class="btn btn-primary">prideti nauja uzduoti</a> 
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <th>Uzduoties Pavadinimas</th>
        <th>Busena</th>
        <th>Prioritetas</th>
        <th>Atlikimo data</th>
        <th>Redaguoti</th>
        <th>Salinti</th>
        <?php foreach($task->allTasks() as $data):?>
            <tr>
                <td><?=$data['subject'];?></td>
                <td><?=$data['status'];?></td>
                <td><?=$data['priority'];?></td>
                <td><?=$data['dueDate'];?></td>
                <td><a href="/update-task/id/<?=$data['id'];?>">Atnaujinti</a></td>
                <td><a href="/delete-task/id/<?=$data['id'];?>">Salinti</a></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>

<?php require "views/_partials/end.view.php";?>