<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>Edit Category</h2>
<a href="/admin/categories">Back</a>
<form method="post">
  <?= csrf_field() ?>
  <div>
    <label>
      Name
      <input type="text" name="name" />
    </label>
  </div>
  <button>Update Category</button>
</form>
<?= $this->endSection('content') ?>