<?php $this->title = 'Rédiger un article - Catchup Blog' ?>

<div class="pell">
    <h2>Rédiger un article</h2>
    <form id="addPost" action="traitement.php" method="POST">
        <div class="pell-grid">
            <div class="grid-col-0">
                <div>
                    <label for="post_title">Titre de l'article :</label>
                    <input type="text" name="post-header" id="post-header">
                </div>
                <div id="editor" class="pell"></div>
                <h3>HTML output:</h3>
                <pre id="html-output"></pre>
            </div>
            <div class="output">
                <center><button type="submit" class="archive-btn">Ajouter le nouvel article</button></center>
                <div style="margin-top:1em;">
                    <h3>Text output:</h3>
                    <div id="text-output"></div>
                </div>
            </div>
        </div>
    </form>
</div>