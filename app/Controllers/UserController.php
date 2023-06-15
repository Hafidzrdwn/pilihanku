<?php


class UserController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->middleware->auth();
  }

  public function index($code)
  {
    $data['user'] = $this->model('User')->getBy(['code' => $code]);
    $data['judul'] = $data['user']['name'];
    $params = UrlParser::find_query_params($_SERVER['REQUEST_URI']);
    $data['page'] = ($params && array_key_exists('page', $params)) ? $params['page'] : "";

    $this->render('user/dashboard', $data);
  }

  public function change_pass($code)
  {
    $this->middleware->protect_post_url();

    $dt = FormValidation::make($_POST, [
      'password_lama' => 'required|min:5',
      'password_baru' => 'required|min:5',
      'konfirmasi_password_baru' => 'required|matches:password_baru'
    ]);

    if ($dt['fails']) {
      // save errors
      echo json_encode([
        'status' => false,
        'errors' => $dt['errors']
      ]);
      return;
    }

    $dt = $dt['data'];
    $user = $this->model('User')->getBy(['code' => $code]);

    if (!password_verify($dt['password_lama'], $user['password'])) {
      echo json_encode([
        'status' => false,
        'message' => 'Password lama anda salah!',
        'data' => 'password_lama'
      ]);
      return;
    } else if (password_verify($dt['password_baru'], $user['password'])) {
      echo json_encode([
        'status' => false,
        'message' => 'Password baru tidak boleh sama dengan password lama!',
        'data' => 'password_baru'
      ]);
      return;
    }

    $dt['password'] = password_hash($dt['password_baru'], PASSWORD_DEFAULT);
    unset($dt['password_lama']);
    unset($dt['password_baru']);
    unset($dt['konfirmasi_password_baru']);

    $this->model('User')->edit(['code' => $code], $dt);
    $_SESSION['alert'] = [
      'type' => 'success',
      'message' => 'Password anda berhasil diubah!'
    ];
    echo json_encode([
      'status' => true,
      'data' => $user['code']
    ]);
    exit();
  }

  public function edit_profile($code)
  {
    $this->middleware->protect_post_url();

    $dt = FormValidation::make($_POST, [
      'nama' => 'required|min:3|max:50'
    ]);

    if ($dt['fails']) {
      // save errors
      echo json_encode([
        'status' => false,
        'errors' => $dt['errors']
      ]);
      return;
    }

    $dt = $dt['data'];
    $dt['name'] = $dt['nama'];
    unset($dt['nama']);

    $file = $_FILES;
    $user = $this->model('User')->getBy(['code' => $code]);

    // check if file is uploaded
    if (strlen($file['profile']['name']) > 0) {
      $file_name = $file['profile']['name'];
      $tmp_name = $file['profile']['tmp_name'];
      $format = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
      $new_name = uniqid() . '.' . $format;

      $profile = $user['name'] . '/' . $new_name;
      $file_error = null;

      // check if file is image
      if (!getimagesize($tmp_name)) $file_error = 'File yang anda upload bukan gambar!';
      // check if file extension is allowed
      if (!in_array($format, ['jpg', 'jpeg', 'png', 'svg', 'webp'])) $file_error = 'Format file yang anda upload tidak diizinkan!';
      // check if file size is allowed
      if ($file['profile']['size'] > 1000000) $file_error = 'Ukuran file yang anda upload terlalu besar!';

      // return error if any
      if ($file_error) {
        echo json_encode([
          'status' => false,
          'errors' => [
            'profile' => $file_error
          ],
          'data' => $user['profile']
        ]);
        return;
      }

      // if no error, upload file
      $item_dirname = 'assets/images/profile-images/';

      // make directory if not exists
      if (!file_exists($item_dirname . $user['name'])) mkdir($item_dirname . $user['name'], 0777, true);

      // delete old file
      if ($user['profile'] != 'default.jpg' && file_exists($item_dirname . $user['profile'])) unlink($item_dirname . $user['profile']);
      // delete old directory if empty
      if (strtolower($dt['name']) != strtolower($user['name']) && is_dir($item_dirname . $user['name'])) {
        rmdir($item_dirname . $user['name']);
        if (!file_exists($item_dirname . $dt['name'])) mkdir($item_dirname . $dt['name'], 0777, true);
        $profile = $dt['name'] . '/' . $new_name;
      }

      // upload file
      move_uploaded_file($tmp_name, $item_dirname . $profile);
    }

    $dt['profile'] = (strlen($file['profile']['name']) > 0) ? $profile : $user['profile'];

    $this->model('User')->edit(['code' => $code], $dt);
    $_SESSION['alert'] = [
      'type' => 'success',
      'message' => 'Profil anda berhasil diedit!'
    ];
    echo json_encode([
      'status' => true,
      'data' => $user['code']
    ]);
    exit();
  }

  public function delete_profile_img()
  {
    $user = $this->model('User')->getBy(['code' => $_SESSION['user_auth']['code']]);
    if ($user['profile'] == 'default.jpg') {
      $_SESSION['alert'] = [
        'type' => 'danger',
        'message' => 'Foto profil anda tidak dapat dihapus!'
      ];
      header('Location: ' . BASEURL . '/user/' . $user['code']);
      exit();
    }
    $item_dirname = 'assets/images/profile-images/';

    // delete old file
    if ($user['profile'] != 'default.jpg' && file_exists($item_dirname . $user['profile'])) unlink($item_dirname . $user['profile']);
    // delete old directory if empty
    if (is_dir($item_dirname . $user['name'])) rmdir($item_dirname . $user['name']);

    $this->model('User')->edit(['code' => $user['code']], ['profile' => 'default.jpg']);
    $_SESSION['alert'] = [
      'type' => 'success',
      'message' => 'Foto profil anda berhasil dihapus!'
    ];

    header('Location: ' . BASEURL . '/user/' . $user['code']);
    exit();
  }
}
