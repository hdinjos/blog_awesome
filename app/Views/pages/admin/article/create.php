<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>Create Articles</h2>
<form action="post">
  <label for="title">
    Title
    <input type="text" name="title" />
  </label>
</form>
<?= $this->endSection() ?>