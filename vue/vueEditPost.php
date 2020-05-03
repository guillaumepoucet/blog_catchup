<style>
    body {
        margin: 0;
        padding: 0;
    }

    .content {
        box-sizing: border-box;
        margin: 0 auto;
        max-width: 600px;
        padding: 20px;
    }

    #html-output {
        white-space: pre-wrap;
    }
</style>

</head>

<body>

    <div class="content">
        <h1>pell</h1>
        <div id="editor" class="pell"></div>
        <div style="margin-top:20px;">
            <h3>Text output:</h3>
            <div id="text-output"></div>
        </div>
        <div style="margin-top:20px;">
            <h3>HTML output:</h3>
            <pre id="html-output"></pre>
        </div>
    </div>

    <script src="..\contenu\pell-master\dist\pell.js"></script>
    <script>
        var editor = window.pell.init({
            element: document.getElementById('editor'),
            defaultParagraphSeparator: 'p',
            onChange: function(html) {
                document.getElementById('text-output').innerHTML = html
                document.getElementById('html-output').textContent = html
            }
        })
    </script>