<style>
    .user_row:hover {
        background-color:#F6C08A;
        cursor:pointer;
    }
</style>
<div>
    <div>
        <a href="/lesson/status">Back</a>
    </div>
    <div>
        <a href="/lesson/admin/slides">Edit Slides</a>
    </div>
    <div>
        <a href="/lesson/test/admin">Edit Quiz Questions</a>
    </div>
    <div>
        <a href="/lesson">Logout</a>
    </div>
    <div>
        <table style="text-align:center">
            <tr>
                <th>ID</th>
                <th>Administrator</th>
                <th>Email</th>
                <th>Password</th>
                <th>Progress (%)</th>
                <th>DateTime last action</th>
                <th>Quiz Progress (69 = final)</th>
                <th>Date passed Final</th>
                <th>Paid?</th>
                <th>Expedite?</th>
                <th>Reviewed?</th>
                <th>Shipped?</th>
            </tr>
            <?php foreach ($users as $user):?>
                    <tr class="user_row">
                    <td><?php echo $user->id?></td>
                    <?php if ($user->is_admin):?>
                        <td style="background-color:#7BD195">yes</td>
                    <?php else:?>
                        <td>no</td>
                    <?php endif;?>
                    <td><?php echo $user->email?></td>
                    <td><?php echo $user->password?></td>
                    <td><?php echo number_format($user->progress/2036.00*100,2,'.',',').'%';?></td>
                    <td><?php echo $user->last_action?></td>
                    <td><?php echo $user->quiz_entry?></td>
                    <td><?php echo $user->date_passed?></td>
                    <td><?php echo ($user->paid)?'yes':'no';?></td>
                    <td><?php echo ($user->expedite)?'yes':'no';?></td>
                    <td><?php echo ($user->reviewed)?'yes':'no';?></td>
                    <td><?php echo ($user->shipped)?'yes':'no';?></td>
                </tr>
            <?php endforeach;?>

        </table>
    </div>
</div>
