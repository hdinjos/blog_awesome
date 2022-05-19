<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>Edit Articles</h2>
<a href="/admin/articles">Back</a>
<form method="post" action="" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <div>
    <label for="title">
      Title
      <input value="<?= esc($article->title) ?>" type="text" name="title" />
    </label>
  </div>
  <div>
    <label for="image">
      Image
      <img id="img_preview" src="<?= base_url('assets/uploads/image/') . '/' . esc($article->image) ?>" alt="image_article" width="100" />
      <input id="img_input" type="file" name="image" accept=".jpg, .png" />
    </label>
  </div>
  <div>
    <label for="content">
      Content
      <textarea name="content"><?= esc($article->content) ?></textarea>
    </label>
  </div>
  <div>
    <label for="author">
      Author
      <select name="author" selected="<?= esc($article->author_id) ?>">
        <?php foreach ($authors as $author) : ?>
          <option <?= esc($article->author_id) === esc($author->id) ? 'selected=selected' : '' ?> value="<?= esc($author->id) ?>"><?= esc($author->name) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <label for="status">
      Status
      <select name="status" selected="">
        <option <?= esc($article->status) === 'draft' ? 'selected=selected' : '' ?> value="draft">Draft</option>
        <option <?= esc($article->status) === 'pending' ? 'selected=selected' : '' ?> value="pending">Pending</option>
        <option <?= esc($article->status) === 'publish' ? 'selected=selected' : '' ?> value="publish">Publish</option>
      </select>
    </label>
  </div>
  <div>
    <label for="category">
      Category
      <select name="category">
        <?php foreach ($categories as $category) : ?>
          <option <?= esc($category->id) === esc($article->category_id) ? 'selected=selected' : '' ?> value="<?= esc($category->id) ?>"><?= esc($category->name) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <input type="submit" name="add" value="Update Articles" />
  </div>
</form>

<script>
  const input = document.querySelector("#img_input");
  const preview = document.querySelector("#img_preview");
  input.addEventListener('change', function(e) {
    const reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function() {
      preview.src = reader.result;
    }
  });
</script>
<?= $this->endSection() ?>