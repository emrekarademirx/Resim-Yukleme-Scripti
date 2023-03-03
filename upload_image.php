<?php
  // Formdan gönderilen verileri al
  $girdi = $_POST['girdi'];
  $yüklenenDosya = $_FILES['resim'];

  // Girdi boş değilse işlem yap
  if (!empty($girdi)) {
    // Resim yüklendi mi kontrol et
    if ($yüklenenDosya['error'] == 0) {
      // Dosya uzantısını al
      $dosyaUzantısı = pathinfo($yüklenenDosya['name'], PATHINFO_EXTENSION);
      // Eğer dosya uzantısı jpg, jpeg, png veya gif değilse hata ver
      if (!in_array($dosyaUzantısı, array("jpg", "jpeg", "png", "gif"))) {
        echo "Geçersiz dosya formatı. Sadece jpg, jpeg, png ve gif dosyaları desteklenir.";
        exit;
      }
      // Eğer dosya boyutu 2 MB'ı geçiyorsa hata ver
      if ($yüklenenDosya['size'] > 2097152) {
        echo "Dosya boyutu çok büyük. 2 MB'dan daha küçük bir dosya yükleyin.";
        exit;
      }
      // benzersiz bir dosya adı oluştur
      $yeniDosyaAdı = uniqid() . "." . $dosyaUzantısı;
      // Hedef konumu belirle
      $hedef = "uploads/" . $yeniDosyaAdı;
      // Yüklenen dosyayı hedefe taşı
      if (move_uploaded_file($yüklenenDosya['tmp_name'], $hedef)) {
        echo "Dosya başarıyla yüklendi.";
      } else {
        echo "Dosya yüklenirken bir hata oluştu.";
      }
    } else {
      // Eğer resim yüklenmediyse hata mesajı ver
      echo "Resim yüklenirken bir hata oluştu.";
    }
  }
?>
