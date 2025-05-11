<!DOCTYPE html>
<html>
<head>
    <title>Question Form</title>
    <script src="https://cdn.ckeditor.com/4.21.0/full-all/ckeditor.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body>
    <h2><?php echo isset($question) ? 'Edit' : 'Add'; ?> Question</h2>
    <p style="color:#007bff;font-size:14px;margin-bottom:10px;">
        To add math formulas, use the MathJax (∑) button in the editor and enter LaTeX code, e.g., <code>E = mc^2</code>. <br>
        <b>Do not paste formulas as images from Word or other sources.</b>
    </p>
    <form method="post">
        <label>Question:</label><br>
        <textarea name="question" id="question" required><?php echo isset($question) ? htmlspecialchars($question->question) : ''; ?></textarea><br>
        <label>Answer:</label><br>
        <textarea name="answer" id="answer" required><?php echo isset($question) ? htmlspecialchars($question->answer) : ''; ?></textarea><br><br>
        <button type="submit">Save</button>
        <a href="<?php echo site_url('admin/dashboard'); ?>">Cancel</a>
    </form>
    <script>
        CKEDITOR.replace('question', {
            extraPlugins: 'mathjax',
            mathJaxLib: 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js',
            height: 150,
            toolbar: [
                ['Bold', 'Italic', 'Underline', '-', 'Mathjax', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'RemoveFormat', 'Source']
            ]
        });
        CKEDITOR.replace('answer', {
            extraPlugins: 'mathjax',
            mathJaxLib: 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js',
            height: 150,
            toolbar: [
                ['Bold', 'Italic', 'Underline', '-', 'Mathjax', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'RemoveFormat', 'Source']
            ]
        });
    </script>
</body>
</html>
