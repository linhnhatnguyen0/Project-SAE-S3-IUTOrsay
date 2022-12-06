<section class="loan">
  <div class="loan-title">
    <h1>Emprunts</h1>
  </div>
  <div class="loan-search">
    <input type="text" name="search" id="search" placeholder="Recherche" />
    <button>
      <ion-icon name="search-outline"></ion-icon>
    </button>
  </div>
  <div class="loan-filter">
    <input type="date" name="filter" id="filter" />
  </div>
  <div class="loan-list">
    <?php
    include("./View/loan-item.php")
      ?>
  </div>
</section>