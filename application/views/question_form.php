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
        1. Click the <b>Insert Option Template</b> button below to add a LaTeX math block for options.<br>
        2. Or, click the <b>MathJax (∑)</b> button in the editor toolbar to add your own formula.<br>
        3. <b>Do not paste formulas as images from Word or PDF. Always use the MathJax button and LaTeX code.</b><br>
        <pre style="background:#f4f6f8;padding:8px;border-radius:6px;">(1)\ 3\\sqrt{2} \\
(2)\ 7\\sqrt{2} \\
(3)\ \sqrt{2} \\
(4)\ 5\\sqrt{2}</pre>
        <button type="button" onclick="insertLatexTemplate()" style="margin-top:5px;padding:4px 10px;border-radius:4px;border:1px solid #007bff;background:#eaf4ff;color:#007bff;cursor:pointer;">Insert Option Template</button>
    </div>
    <form method="post" onsubmit="return validateMathJaxBlocks();">
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
        // Helper to open MathJax dialog and insert template
        function insertLatexTemplate() {
            var template = '(1)\\ 3\\sqrt{2} \\\\\
(2)\\ 7\\sqrt{2} \\\\n(3)\\ \\sqrt{2} \\\\n(4)\\ 5\\sqrt{2}';
            var editor = CKEDITOR.instances['question'];
            editor.execCommand('mathjax');
            setTimeout(function() {
                var dialog = CKEDITOR.dialog.getCurrent();
                if(dialog) {
                    dialog.setValueOf('info', 'mathInput', template);
                }
            }, 300);
        }
        // Prevent form submit if no MathJax block is present
        function validateMathJaxBlocks() {
            var qData = CKEDITOR.instances['question'].getData();
            var aData = CKEDITOR.instances['answer'].getData();
            var mathBlockRegex = /<span class="math-tex">|<script type="math\/tex/i;
            if (!mathBlockRegex.test(qData) && !mathBlockRegex.test(aData)) {
                alert('Please use the MathJax (∑) button to add at least one math formula.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
