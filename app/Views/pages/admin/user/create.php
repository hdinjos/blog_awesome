<?= $this->extend('layout/layout_admin') ?>
<?= $this->section('content') ?>
<h2>Create Users</h2>
<form method="post">
  <?= csrf_field() ?>
  <div>
    <label>
      Name
      <input type="text" name="name" />
    </label>
  </div>
  <div>
    <label>
      Email
      <input type="text" name="email" />
    </label>
  </div>
  <div>
    <label>
      Password
      <input id="pass" type="password" name="password" />
    </label>
  </div>
  <div>
    <label>
      Confirm Password
      <input id="passConf" type="password" />
    </label>
  </div>
  <div>
    <label>
      Bio
      <textarea name="bio"></textarea>
    </label>
  </div>
  <div>
    <label>
      Role
      <select name="role">
        <?php foreach ($roles as $role) : ?>
          <option value="<?= esc($role->id) ?>"><?= esc($role->name) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <input disabled id="submit" type="submit" name="submit" value="Create User" />
  </div>
</form>
<script>
  const pass = document.querySelector('#pass');
  const passConf = document.querySelector('#passConf');
  const submit = document.querySelector('#submit');
  passConf.addEventListener('input', function(e) {
    if (e.target.value === pass.value) {
      submit.disabled = false;
    } else {
      submit.disabled = true;
    }
  });

  pass.addEventListener('input', function(e) {
    if (e.target.value === passConf.value) {
      submit.disabled = false;
    } else {
      submit.disabled = true;
    }
  });
</script>
<?= $this->endSection() ?>