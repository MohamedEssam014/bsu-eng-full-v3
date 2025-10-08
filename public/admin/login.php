<?php
require_once __DIR__ . '/../templates/helpers.php';
$lang = set_lang();
require_once __DIR__ . '/../templates/db.php';
session_start();
$error = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username=?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if($user && password_verify($password, $user['password_hash'])){
        $_SESSION['user'] = ['id'=>$user['id'],'username'=>$user['username'],'role'=>$user['role']];
        header('Location: /admin/dashboard.php?lang='.$lang);
        exit;
    } else {
        $error = $lang==='ar' ? 'بيانات الدخول غير صحيحة' : 'Invalid credentials';
    }
}
include __DIR__ . '/../templates/header.php';
?>
<div class="container">
  <h3><?= htmlspecialchars(t('login',$lang)) ?></h3>
  <?php if($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
  <form method="post">
    <div class="mb-3"><label>Username</label><input name="username" class="form-control"></div>
    <div class="mb-3"><label>Password</label><input name="password" type="password" class="form-control"></div>
    <button class="btn btn-primary"><?= htmlspecialchars(t('login',$lang)) ?></button>
  </form>
</div>
<?php include __DIR__ . '/../templates/footer.php'; ?>
