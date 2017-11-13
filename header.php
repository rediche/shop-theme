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
  <div class="container">

    <div class="row">
      <nav class="top-header col">
        <a href="#" class="top-header__link">Top Link 1</a>
        <a href="#" class="top-header__link">Top Link 2</a>
        <a href="#" class="top-header__link">Top Link 3</a>
      </nav>
    </div>

    <div class="row">
      <div class="middle-header col">
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
    </div>

  </div>
</header>

<nav class="mega-menu">
  <div class="container">
    <div class="row">
      <div class="mega-menu__list col">
        <p>Test</p>
      </div>
    </div>
  </div>
</nav>