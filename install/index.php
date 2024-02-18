<?php require_once("lock.php");?>
<!doctype html>
<html lang="default">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Config Profile | Version V4.0.2</title>
    <link href="https://i.pinimg.com/564x/67/9d/0f/679d0f1b128efefc189f1d9994e97d94.jpg" rel="shortcut icon" type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./assets/css/icons.bundle.css" data-no-instant="" rel="stylesheet">
    <!-- Sandy.Bundles -->
    <link href="./assets/css/sandy.bundles.css" data-no-instant="" rel="stylesheet">
    <!-- tailwind -->
    <link href="./assets/css/tailwind.min.css" data-no-instant="" rel="stylesheet">
    <!-- App -->
    <link href="./assets/css/app.css" data-no-instant="" rel="stylesheet">
  </head>
  <body id="app-sandy" app-sandy="wrapper">
    <div style="margin: -50px auto;" app-sandy="container" app-sandy-namespace="">
      <div class="p-1 text-xs flex items-center justify-center bg-yellow-200 hidden">BETA</div>
      <div class="auth-row justify-center">
        <div class="auth-col hidden"></div>
        <div class="auth-col">
          <div class="landing-form items-center flex-col">
            <div class="form-box login-register-form-element p-0 lg:p-10">
              <div class="mb-16">
                <h2 class="form-box-title text-2xl mb-1"><i class="fa fa-gear fa-spin" style="font-size:24px"></i>&ensp;Trình cài đặt - profile thanhdieu.com</h2>
                <span display="inline" class="text-sm">Hoàn thành các bước để install profile ☝️</span>
              </div>
              <div class="login-include">
                <div class="social-links is-auth justify-center"></div>
                <!-- FORM -->
                <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['config_profile'])) {
        $title = $_POST['title_config'];
        $keywords = $_POST['keywords_config'];
        $description = $_POST['description_config'];
        $author = $_POST['author_config'];
        $titleReview = $_POST['title_review_config'];
        $configContent = "<?php
\$config = array(
    'head' => array(
        'description' => \"$description\",
        'keywords' => \"$keywords\",
        'author' => \"$author\",
        'shortcut_icon' => \"\",
        'title' => \"$title &mdash; Profile Home\",
        'title_small' => \"$titleReview\",
        'url' => \"\",
        'image_review' => \"\",
    )
);
?>";
$installLockFile = '../install.lock';
if (file_exists($installLockFile)) {
    $installLockContent = file_get_contents($installLockFile);
    $installLockContent .= PHP_EOL . 'step1 = true';
    file_put_contents($installLockFile, $installLockContent);
} else {
    $installLockContent = 'step1 = true';
    file_put_contents($installLockFile, $installLockContent);
}
echo '<script>Swal.fire("Success", "Thành công ! đang chuyển tới step tiếp theo.", "success");</script>';
echo '<script>setTimeout(function(){ window.location = "step2.php?install"; }, 2000);</script>';
        $configFile = '../config/config.php';
        file_put_contents($configFile, $configContent);
    }
}
?>
                <form id="save_config" class="form" method="post">
                  <div class="form-row">
                    <div class="form-item">
                      <div class="form-input">
                        <input type="text" class="form-control" name="title_config" value="" placeholder="Tên Website ( Vd: ThanhDieuProfile )" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <div class="form-input">
                        <input type="text" class="form-control" name="keywords_config" placeholder="Từ Khóa ( Vd: Thanhdieu.com, thanhdieutv,vv )" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <div class="form-input">
                        <input type="text" class="form-control" name="description_config" placeholder="Mô Tả ( Vd: Thông tin cá nhân thanhdieutv )" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <div class="form-input">
                        <input type="text" class="form-control" name="author_config" placeholder="Tác Giả ( Vd: ThanhDieuTv )" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <div class="form-input">
                        <input type="text" class="form-control" name="title_review_config" placeholder="Mô Tả Nhỏ ( Vd: Chào mừng bạn đến với... )" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-item">
                      <button type="submit" name="config_profile" class="shadow-none w-full button bg-gray-200 text-black toast-custom-close sandy-loader-flower">Cài Đặt ( Step 1 )</button>
                    </div>
                  </div>
                  <div class="flex justify-center mt-8">
                    <a class="auth-link" href="https://youtu.be/57gjfp6GK6k" target="_blank">
                      <b class="icon icon-link">
                      </b><u>Hướng dẫn cài đặt ( tutorial config )</u></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div></div>
    <div></div>
    <script>
window.onload = function() {
  const form = document.getElementById('save_config');
  const elements = form.elements;
  if (document.cookie) {
    const cookies = document.cookie.split(';');
    cookies.forEach(cookie => {
      const parts = cookie.split('=');
      const name = parts[0].trim();
      const value = parts[1];
      for (let i = 0; i < elements.length; i++) {
        if (elements[i].name === name) {
          elements[i].value = value;
          break;
        }
      }
    });
  }
  form.addEventListener('input', function(e) {
    const input = e.target;
    document.cookie = `${input.name}=${input.value}; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/`;
  });
};
</script>
  </body>
</html>