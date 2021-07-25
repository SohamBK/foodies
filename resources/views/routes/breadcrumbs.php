<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('my', function ($trail) {
  $trail->parent('home');
  $trail->push('My', route('my'));
});
?>