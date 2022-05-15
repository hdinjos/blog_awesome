<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>List All Articles</h2>
<a href="/admin/articles/create">Add</a>
<table>
  <tr>
    <th>No</th>
    <th>Title</th>
    <th>Image</th>
    <th>Content</th>
    <th>Author</th>
    <th>Status</th>
    <th>Category</th>
  </tr>
  <?php $num = 0; ?>
  <?php foreach ($articles as $article) : ?>
    <tr>
      <td><?= $num += 1 ?></td>
      <td><?= $article->title ?></td>
      <td><?= $article->image ?></td>
      <td><?= $article->content ?></td>
      <td><?= $article->author ?></td>
      <td><?= $article->status ?></td>
      <td><?= $article->category ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?= $this->endSection() ?>