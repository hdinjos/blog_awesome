<?= $this->extend('layout/layout_front') ?>
<?= $this->section('content') ?>
<h1>Wellcome to my blog</h1>

<div>Recern Post!!!</div>
<?php foreach ($articles as $article) : ?>
  <div>
    <h3><?= $article->title ?></h3>
    <img width="100" src="<?= base_url('assets/uploads/image' . '/' . $article->image) ?>" />
    <div><?= $article->content ?></div>
    <div>By <?= $article->author ?></div>
    <div>At <?= date_format(date_create($article->create_at), 'd/m/Y H:i') ?></div>
    <a href="/article/<?= $article->slug ?>">Read More</a>
  </div>
<?php endforeach ?>
<?= $this->endSection() ?>app/Views/pages/front