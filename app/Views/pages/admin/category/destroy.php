<h2>Delete Category</h2>
<a href="/admin/categories">Back</a>
<p>Are you sure to delete it?</p>
<form method="post">
  <?= csrf_field() ?>
  <button>Delete</button>
</form>