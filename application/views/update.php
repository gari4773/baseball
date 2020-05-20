<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>スコア入力・選手情報変更</title>
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
      $("#update").on('click', function(event) {
        event.preventDefault();
        $.ajax({
          type: "POST",
          url: "/bms/update_bms",
          data: {
            'id': $('[name="id"]').val(),
            'name': $('[name="name"]').val(),
            'tel': $('[name="tel"]').val(),
            'mail': $('[name="mail"]').val(),
            'year': $('[name="year"]').val(),
            'arm': $('[name="arm"]').val(),
            'position': $('[name="position"]').val()
          },
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8'
        }).done(function(data) {
          alert("編集OK!");
          window.location.href = "/main/players";
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
          alert("編集NG!");
          window.location.href = "/bms/update";
        });
        return false;
      });
    });
  </script>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <h1>選手情報変更</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">入力してください</p>
        <div class="input-group mb-3">
          <input type="hidden" class="form-control" name="id" value="<?= $row_array['team_id'] ?>">
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" value="<?= $row_array['name'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="tel" value="<?= $row_array['tel'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="mail" value="<?= $row_array['mail'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="year">生年</label>
              <select name="year" class="form-control" style="width: 100%;">
                <option><?= $row_array['year'] ?></option>
                <?php for ($i = 1950; $i < 2010; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="arm">投/打</label>
              <select name="arm" class="form-control" style="width: 100%;">
                <option><?= $row_array['arm'] ?></option>
                <option>右投/右打</option>
                <option>右投/左打</option>
                <option>右投/両打</option>
                <option>左投/右打</option>
                <option>左投/左打</option>
                <option>左投/両打</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="position">守備</label>
              <select name="position" class="form-control" style="width: 100%;">
                <option>投手</option>
                <option>捕手</option>
                <option>内野手</option>
                <option>外野手</option>
                <option>指名打者</option>
              </select>
            </div><!-- /.form-group -->
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="order">打順</label>
              <select name="order" class="form-control" style="width: 100%;">
                <option>H</option>
                <option>P</option>
                <?php for ($i = 1; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div>
        </div>
        <div class="container">
          <div class="row">
            <button id="update" type="submit" class="btn btn-primary btn-block">変更</button>
          </div>
          <br>
          <p><?= anchor('main/players', '一覧に戻る　>>'); ?></p>
        </div>
      </div><!-- /.form-box -->
    </div><!-- /.card -->
  </div><!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
</body>

</html>