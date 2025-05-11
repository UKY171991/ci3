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
    <div style="color:#007bff;font-size:14px;margin-bottom:10px;">
        <b>How to add math formulas:</b><br>
        1. Click the <b>MathJax (∑)</b> button in the editor toolbar.<br>
        2. Enter your formula in LaTeX, e.g. <code>\sqrt{2}</code> for √2.<br>
        3. For multiple options, use:<br>
        <pre style="background:#f4f6f8;padding:8px;border-radius:6px;">(1)\ 3\\sqrt{2} \\
(2)\ 7\\sqrt{2} \\
(3)\ \sqrt{2} \\
(4)\ 5\\sqrt{2}</pre>
        <button type="button" onclick="insertLatexTemplate()" style="margin-top:5px;padding:4px 10px;border-radius:4px;border:1px solid #007bff;background:#eaf4ff;color:#007bff;cursor:pointer;">Insert Option Template</button>
        <br><b>Do not paste formulas as images from Word or PDF. Always use the MathJax button and LaTeX code.</b>
    </div>
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
        function insertLatexTemplate() {
            var template = '(1)\\ 3\\sqrt{2} \\\\\
(2)\\ 7\\sqrt{2} \\\\\
(3)\\ \\sqrt{2} \\\\\
(4)\\ 5\\sqrt{2}';
            if (CKEDITOR.instances['question'].focusManager.hasFocus) {
                CKEDITOR.instances['question'].insertText(template);
            } else if (CKEDITOR.instances['answer'].focusManager.hasFocus) {
                CKEDITOR.instances['answer'].insertText(template);
            } else {
                CKEDITOR.instances['question'].insertText(template);
            }
        }
    </script>
</body>
</html>
