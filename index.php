<?php

include 'header.php';

?>
<div class="c-home">
  <div class="o-layout-container">
    <div class="o-search-field">

      <form class="c-home__search" id = "search_form" action ="search.php" method="POST">
        <input class="search-box" id="carword" name="carword" placeholder="Search carword" type="text" autocomplete="off">
        <button class="c-btn c-btn--search" id='signup_button' type='button' id='login'>GO</button>
      </form>

    </div>
    <p class="c-home__link js-popup js-page-video">Click here to find out more about how BeMyCar works...</p>
  </div>
</div>


</body>

<?php include 'footer.php'; ?>
