<?php

include 'header.php';

?>
<div class="c-home">
  <div class="o-layout-container">
  	<img style = "margin-top:10%;margin-left:5%;" height = "30%" width = "30%"  src = "img/arrow.png"></img>
    <div class="o-search-field">

      <form class="c-home__search" id = "search_form" action ="search.php" method="POST">
        <input class="search-box" id="carword" name="carword" placeholder="Search Carword.." type="text" autocomplete="off">
        <button class="c-btn c-btn--search" id='signup_button' type='button' id='login'>GO</button>
      </form>

    </div>
    <p class="c-home__link js-popup js-page-video">Click here to find out more about how BeMyCar works...</p>
  </div>
</div>



</body>

<?php include 'footer.php'; ?>
