<?php foreach($goods as $good): ?>
<div class="card">
  <div class="card-image">
    <img src="#" class="img-responsive">
  </div>
  <div class="card-header">
    <div class="card-title h5"><?=$good->name ?></div>
    <div class="card-subtitle text-gray"><?=$good->user->name ?></div>
  </div>
  <div class="card-body">
    价格：<?=$good->price ?>
    <?=$good->description ?>
  </div>
  <div class="card-footer">
    <button class="btn btn-primary">Buy</button>
  </div>
</div>
<?php endforeach; ?>