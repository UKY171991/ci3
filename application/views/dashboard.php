<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <style>
        body {
            background: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .dashboard-container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 2.5rem 2rem;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .dashboard-header h2 {
            margin: 0;
            color: #333;
        }
        .dashboard-header .actions a {
            text-decoration: none;
            color: #fff;
            background: #007bff;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin-left: 10px;
            font-weight: 500;
            transition: background 0.2s;
        }
        .dashboard-header .actions a.logout {
            background: #dc3545;
        }
        .dashboard-header .actions a:hover {
            opacity: 0.85;
        }
        h3 {
            color: #444;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fafbfc;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 0.9rem 0.7rem;
            text-align: left;
        }
        th {
            background: #007bff;
            color: #fff;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background: #f4f6f8;
        }
        tr:hover {
            background: #e9ecef;
        }
        td .action-link {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
            font-weight: 500;
        }
        td .action-link.delete {
            color: #dc3545;
        }
        td .action-link:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .dashboard-container {
                padding: 1rem 0.5rem;
            }
            th, td {
                padding: 0.5rem 0.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h2>Admin Dashboard</h2>
            <div class="actions">
                <a href="<?php echo site_url('admin/add_question'); ?>">Add Question</a>
                <a href="<?php echo site_url('admin/logout'); ?>" class="logout">Logout</a>
            </div>
        </div>
        <h3>Questions List</h3>
        <table>
            <tr><th>ID</th><th>Question</th><th>Answer</th><th>Actions</th></tr>
            <?php if (!empty($questions)) foreach ($questions as $q): ?>
            <tr>
                <td><?php echo $q->id; ?></td>
                <td><?php echo $q->question; ?></td>
                <td><?php echo $q->answer; ?></td>
                <td>
                    <a href="<?php echo site_url('admin/edit_question/'.$q->id); ?>" class="action-link">Edit</a>
                    <a href="<?php echo site_url('admin/delete_question/'.$q->id); ?>" class="action-link delete" onclick="return confirm('Delete this question?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script>
        // Re-render MathJax after page load (for dynamic content)
        if (window.MathJax) {
            MathJax.typesetPromise();
        }
    </script>
</body>
</html>
