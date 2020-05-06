<form class="form-add-article" action="">

  <div class="flex-form">
    <div class="middle-form"><!--partie texte-->
      <input class="form-title-article" name="" type="text" placeholder="Titre de l'article"><br>
      <input class="form-title-article" name="" type="text"><br>
      <textarea class="textarea-add-article" name="" id="" cols="30" rows="10" ></textarea>
    </div>

    <div class="side-form"> <!--partie droite-->
      <p class="form-right-title">+ Ajouter des catégories</p>

      <div class="form-right">

        <label class="container-checkbox-form">Catégorie
          <input class="hide-browser-checkbox" type="checkbox">
          <span class="checkmark"></span>
        </label><br>

        <label class="container-checkbox-form">Catégorie
          <input class="hide-browser-checkbox" type="checkbox">
          <span class="checkmark"></span>
        </label><br>

        <label class="container-checkbox-form">Catégorie
          <input class="hide-browser-checkbox" type="checkbox">
          <span class="checkmark"></span>
        </label><br>

      </div>

      <p class="form-right-title">+ Ajouter une miniature</p>
      <div class="form-right">
        <input class="choose-thumbnail" type="file">
      </div>
    </div>
  </div>


  <div class="buttons-form-article"> <!--buttons-->
    <button class="form-valid" type="submit"> VALIDER </button>
    <button class="form-save" type="submit">SAUVEGARDER</button>
    <button class="form-delete" type="submit">SUPPRIMER</button>
  </div>

</form>