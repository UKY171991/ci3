<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <a href="<?php echo site_url('admin/add_question'); ?>">Add Question</a> |
    <a href="<?php echo site_url('admin/logout'); ?>">Logout</a>
    <h3>Questions List</h3>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Question</th><th>Answer</th><th>Actions</th></tr>
        <?php if (!empty($questions)) foreach ($questions as $q): ?>
        <tr>
            <td><?php echo $q->id; ?></td>
            <td><?php echo $q->question; ?></td>
            <td><?php echo $q->answer; ?></td>
            <td>
                <a href="<?php echo site_url('admin/edit_question/'.$q->id); ?>">Edit</a> |
                <a href="<?php echo site_url('admin/delete_question/'.$q->id); ?>" onclick="return confirm('Delete this question?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
