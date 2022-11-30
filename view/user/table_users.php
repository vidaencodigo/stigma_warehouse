<table class="table">
    <thead>
        <th>#</th>
        <th>Username</th>
        <th>Action</th>
    </thead>
    <tbody>
    <?php $cc=0; foreach($usuarios as $usr): ?>
        <tr>
            <td>
                <?=$cc+=1?>
            </td>
            <td>
                <?=$usr->user?>
            </td>
            <td>
                <ul class="actions__users_table">
                    <li><a href="index.php?controller=user&action=editUser&id=<?php echo $usr->user?>">Editar</a></li>
                    <li><a href="#">Eliminar</a></li>
                </ul> 
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>