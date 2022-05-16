<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>Create Articles</h2>
<a href="/admin/articles">Back</a>
<form method="post" action="/admin/articles/create" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <div>
    <label for="title">
      Title
      <input type="text" name="title" />
    </label>
  </div>
  <div>
    <label for="image">
      Image
      <input type="file" name="image" accept=".jpg, .png" />
    </label>
  </div>
  <div>
    <label for="content">
      Content
      <textarea name="content"></textarea>
    </label>
  </div>
  <div>
    <label for="author">
      Author
      <select name="author">
        <?php foreach ($authors as $author) : ?>
          <option value="<?= $author->id ?>"><?= $author->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <label for="status">
      Status
      <select name="status">
        <option value="draft">Draft</option>
        <option value="pending">Pending</option>
        <option value="publish">Publish</option>
      </select>
    </label>
  </div>
  <div>
    <label for="category">
      Category
      <select name="category">
        <?php foreach ($categories as $category) : ?>
          <option value="<?= $category->id ?>"><?= $category->name ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <input type="submit" name="add" value="Create Articles" />
  </div>
</form>
<?= $this->endSection() ?>