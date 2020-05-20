<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MBCログイン</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $(function() {
      $("#login").on('click', function(event) {
        event.preventDefault();
        $.ajax({
          type: "POST",
          url: "/main/login_validation",
          data: {
            'mail': $('[name="mail"]').val(),
            'pass': $('[name="pass"]').val()
          },
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8'
        }).done(function(data) {
          Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'ログイン認証OK!',
            showConfirmButton: false,
            timer: 1500
          })
          window.location.href = "/bms/scores";
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'ログイン認証NG!',
            text: '入力内容をご確認下さい。',
            timer: 1500
          })
          window.location.href = "/main/login";
        });
        return false;
      });
    });
  </script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <h1>ログインフォーム</h1>
    </div><!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">ログインしてください。</p>
        <div class="input-group mb-3">
          <div class="error">
            <?= form_error("mail"); ?>
          </div>
          <input type="mail" name="mail" class="form-control" placeholder="メールアドレス">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <div class="error">
            <?= form_error("pass"); ?>
          </div>
          <input type="pass" name="pass" class="form-control" placeholder="パスワード">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <button id="login" type="submit" class="btn btn-primary btn-block">ログイン
            </button>
          </div>
          <br>
          <p><?= anchor('bms/signup/', '新規チーム登録へ　>>'); ?></p>
        </div>
      </div><!-- /.login-card-body -->
    </div><!-- /.card -->
  </div><!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>

</body>

</html>