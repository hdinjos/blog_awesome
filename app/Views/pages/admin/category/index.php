<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>List Categories</h2>
<a href="/admin/categories/create">Add</a>
<table>
  <tr>
    <td>No</td>
    <td>Name</td>
    <td>Action</td>
  </tr>
  <?php
  $num = 0;
  foreach ($categories as $category) : ?>
    <tr>
      <td><?= $num += 1 ?></td>
      <td><?= esc($category->name) ?></td>
      <td>
        <a href="/admin/categories/edit/<?= esc($category->id) ?>">Edit</a>
        <a href="/admin/categories/delete/<?= esc($category->id) ?>">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?= $this->endSection() ?>