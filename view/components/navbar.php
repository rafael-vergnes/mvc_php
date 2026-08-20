<nav class="container-fluid">
  <ul>
    <li><strong>Books Library</strong></li>
  </ul>
  <ul>
    <li><a href="/" class="secondary">Accueil</a></li>
    <?php if (isset($_SESSION["status"])) : ?>
    <li>
      <details class="dropdown">
        <summary>
          Categorie
        </summary>
        <ul dir="rtl">
          <li><a href="/category/new">Ajouter</a></li>
        </ul>
      </details>
    </li>
    <li>
      <details class="dropdown">
        <summary>
          Livre
        </summary>
        <ul dir="rtl">
          <li><a href="/book/new">Ajouter</a></li>
          <li><a href="/book/all">Liste</a></li>
        </ul>
      </details>
    </li>
    <li><a href="/logout" class="secondary">Déconnexion</a></li>
    <?php else :?>
    <li>
      <details class="dropdown">
        <summary>
          Utilisateur
        </summary>
        <ul dir="rtl">
          <li><a href="/login">Connexion</a></li>
          <li><a href="/register">Inscription</a></li>
        </ul>
      </details>
    </li> 
    <?php endif ?>
  </ul>
</nav>