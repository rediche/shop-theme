<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Page title</title>
  <?php wp_head(); ?>
</head>
<body>

<header class="header">
  <nav class="top-header">
    <a href="#" class="top-header__link">Top Link 1</a>
    <a href="#" class="top-header__link">Top Link 2</a>
    <a href="#" class="top-header__link">Top Link 3</a>
  </nav>

  <div class="middle-header">
    <div class="middle-header__logo">
      <img src="https://placehold.it/100x50" alt="Logo">
    </div>
    <div class="middle-header__search">
      <input class="input input--raised" placeholder="Søg">
    </div>
    <div class="middle-header__shopping-cart">
      <img src="https://placehold.it/24x24" alt="Shopping cart">
      <span>Indkøbskurv</span>
    </div>
  </div>

  <!-- <p>Page <span>title</span></p>
  <br>
  <nav class="menu main">
    <a class="menu__item" href="#">Test</a>
    <a class="menu__item" href="#">Test</a>
  </nav>
  <br> -->
</header>

<button class="button">Test button</button><br>
<button class="button button--raised">Test button</button><br>

<input class="input" placeholder="Placeholder"><br>
<input class="input input--raised" placeholder="Placeholder"><br>