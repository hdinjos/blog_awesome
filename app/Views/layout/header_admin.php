<div>
  <div><a href="/admin">Home</a></div>
  <div><a href="/admin/articles?page=1&limit=10">Article</a></div>
  <div><a href="/admin/categories">Category</a></div>
  <?= $_SESSION['role'] === '1' ? '<div><a href="/admin/users">User</a></div>' : '' ?>
  <div>Wellcome, <?= $_SESSION['name'] ?> | <a href="/logout">Logout</a></div>
</div>