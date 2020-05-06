<div class="title">
    <img src="assests\logo\book-open.svg" alt="">
    <h2>Historique</h2>
</div>


<table id="historique" style="margin-top:2em;">

    <tr>
        <td>

            <form class="onglet" >
                <input type="radio" name="onglet" id="gen" value="" <?php if($_GET['filter']== NULL){ echo 'checked';}?>>
                <label for="gen"><span class="btm">Général</span></label>

                <input type="radio" name="onglet" id="util" value="2" <?php if($_GET['filter']== 2){ echo 'checked';}?>>
                <label for="util"><span class="btm">Utilisateurs</span></label>

                <input type="radio" name="onglet" id="arti" value="3" <?php if($_GET['filter']== 3){ echo 'checked';}?>>
                <label for="arti"><span class="btm">Articles</span></label>
            </form>

            <form id="search-form">
                <div class="search-bar">
                    <input type="text" placeholder="Rechercher un article">
                </div>
            </form>

        </td>
    </tr>

    <tr><td class="tdhidden"></td></tr>

    <tr>
        <td>
            <img class="avatar" src="assests/logo/avatar.png" alt="">
            <span>12/03/2019</span> 
            <img class="icon" src="assests/logo/newspaper.svg" alt="">
            <span>Machain a modifié l'article : "Les français en vacances"</span>
        </td>
    </tr>
    <tr>
        <td>
            <img class="avatar" src="assests/logo/avatar.png" alt="">
            <span>12/03/2019</span> 
            <img class="icon" src="assests/logo/newspaper.svg" alt="">
            <span>Machain a modifié l'article : "Les français en vacances"</span>
        </td>
    </tr>
    <tr>
        <td>
            <img class="avatar" src="assests/logo/avatar.png" alt="">
            <span>12/03/2019</span> 
            <img class="icon" src="assests/logo/newspaper.svg" alt="">
            <span>Machain a modifié l'article : "Les français en vacances"</span>
        </td>
    </tr>

</table>

<script>
    $('input').on('change', function() {
        document.location.href = "?p=historique&filter="+this.value;
    })
</script>