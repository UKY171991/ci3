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
        <b>How to add math formulas from Word:</b><br>
        1. <b>Copy your formula from Word.</b><br>
        2. <b>Go to <a href='https://www.latex4technics.com/mathml-to-latex' target='_blank'>this free MathML-to-LaTeX converter</a>.</b><br>
        3. Paste your formula into the converter and copy the LaTeX result.<br>
        4. Click the <b>Insert Math Formula</b> button below to open the MathJax dialog.<br>
        5. Paste the LaTeX code into the dialog and click OK.<br>
        <b>Do not paste formulas as images from Word or PDF. Always use the MathJax button and LaTeX code.</b>
    </div>
    <button type="button" onclick="openMathJaxDialog('question')" style="margin-bottom:10px;padding:4px 10px;border-radius:4px;border:1px solid #007bff;background:#eaf4ff;color:#007bff;cursor:pointer;">Insert Math Formula</button>
    <form method="post">
        <label>Question:</label><br>
        <textarea name="question" id="question" required placeholder="Type your question here. Use the MathJax button (∑) for math."><?php echo isset($question) ? htmlspecialchars($question->question) : ''; ?></textarea><br>
        <label>Answer:</label><br>
        <textarea name="answer" id="answer" required placeholder="Type your answer here. Use the MathJax button (∑) for math."><?php echo isset($question) ? htmlspecialchars($question->answer) : ''; ?></textarea><br><br>
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
        function openMathJaxDialog(editorId) {
            var editor = CKEDITOR.instances[editorId];
            editor.execCommand('mathjax');
        }
    </script>
</body>
</html>
