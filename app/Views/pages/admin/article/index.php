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
    <th>Action</th>
  </tr>
  <?php $num = 0; ?>
  <?php foreach ($articles as $article) : ?>
    <tr>
      <td><?= $num += 1 ?></td>
      <td><?= esc($article->title) ?></td>
      <td>
        <img width="100" src="<?= base_url('assets/uploads/image') . '/' . esc($article->image) ?>" alt="article_img" ?>
      </td>
      <td><?= esc($article->content) ?></td>
      <td><?= esc($article->author) ?></td>
      <td><?= esc($article->status) ?></td>
      <td><?= esc($article->category) ?></td>
      <td>
        <a href="/admin/articles/delete/<?= esc($article->id) ?>">Delete</a>
        <a href="/admin/articles/edit/<?= esc($article->id) ?>">Edit</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?= $this->endSection() ?>