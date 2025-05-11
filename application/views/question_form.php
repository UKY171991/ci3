<!DOCTYPE html>
<html>
<head>
    <title>Question Form</title>
    <script src="https://cdn.ckeditor.com/4.21.0/full-all/ckeditor.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@2/MathJax.js?config=TeX-AMS_HTML"></script>
</head>
<body>
    <h2><?php echo isset($question) ? 'Edit' : 'Add'; ?> Question</h2>
    <div style="color:#007bff;font-size:14px;margin-bottom:10px;">
        <b>How to add math formulas from Word:</b><br>
        1. <b>Copy your formula from Word.</b><br>
        <!-- 2. <b>Go to <a href='https://www.latex4technics.com/mathml-to-latex' target='_blank'>this free MathML-to-LaTeX converter</a>.</b><br>
        3. Paste your formula into the converter and copy the LaTeX result.<br>
        4. Click the <b>Insert Math Formula</b> button below the field you want to add math to.<br>
        5. Paste the LaTeX code into the dialog and click OK.<br> -->
        <b>Do not paste formulas as images from Word or PDF. Always use the MathJax button and LaTeX code.</b>
    </div>
    <form method="post">
        <label>Question:</label>
        <button type="button" onclick="openMathJaxDialog('question')" style="margin-left:10px;margin-bottom:5px;padding:4px 10px;border-radius:4px;border:1px solid #007bff;background:#eaf4ff;color:#007bff;cursor:pointer;">Insert Math Formula</button><br>
        <textarea name="question" id="question" required placeholder="Type your question here. Use the MathJax button (∑) for math."><?php echo isset($question) ? htmlspecialchars($question->question) : ''; ?></textarea><br>
        <label>Answer:</label>
        <button type="button" onclick="openMathJaxDialog('answer')" style="margin-left:10px;margin-bottom:5px;padding:4px 10px;border-radius:4px;border:1px solid #007bff;background:#eaf4ff;color:#007bff;cursor:pointer;">Insert Math Formula</button><br>
        <textarea name="answer" id="answer" required placeholder="Type your answer here. Use the MathJax button (∑) for math."><?php echo isset($question) ? htmlspecialchars($question->answer) : ''; ?></textarea><br><br>
        <button type="submit">Save</button>
        <a href="<?php echo site_url('admin/dashboard'); ?>">Cancel</a>
    </form>
    <script>
        CKEDITOR.replace('question', {
            extraPlugins: 'mathjax,image2,clipboard',
            mathJaxLib: 'https://cdn.jsdelivr.net/npm/mathjax@2/MathJax.js?config=TeX-AMS_HTML',
            height: 150,
            toolbar: [
                ['Bold', 'Italic', 'Underline', '-', 'Mathjax', 'Image', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'RemoveFormat', 'Source']
            ],
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('answer', {
            extraPlugins: 'mathjax,image2,clipboard',
            mathJaxLib: 'https://cdn.jsdelivr.net/npm/mathjax@2/MathJax.js?config=TeX-AMS_HTML',
            height: 150,
            toolbar: [
                ['Bold', 'Italic', 'Underline', '-', 'Mathjax', 'Image', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'RemoveFormat', 'Source']
            ],
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserUploadMethod: 'form'
        });
        function openMathJaxDialog(editorId) {
            var editor = CKEDITOR.instances[editorId];
            editor.execCommand('mathjax');
        }
    </script>
</body>
</html>
