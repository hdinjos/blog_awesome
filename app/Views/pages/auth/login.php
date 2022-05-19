<h3>Awesome Blog</h3>
<form method="post" action="">
  <?= csrf_field() ?>
  <div>
    <label for="email">
      Email
      <input type="email" name="email" />
    </label>
  </div>
  <div>
    <label for="password">
      Password
      <input type="password" name="password" />
    </label>
  </div>
  <div>
    <button>Login</button>
  </div>
</form>