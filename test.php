<?php
  $girdi = $_POST['girdi'];
  $yüklenenDosya = $_FILES['resim'];

  // Girdi boş değilse kontrol et
  if (!empty($girdi)) {
    // Resim yüklendi mi kontrol et
    if ($yüklenenDosya['error'] == 0) {
      // Dosya uzantısını al
      $dosyaUzantısı = pathinfo($yüklenenDosya['name'], PATHINFO_EXTENSION);
      // benzersiz bir dosya adı oluştur
      $yeniDosyaAdı = uniqid() . "." . $dosyaUzantısı;
      // Hedef konumu belirle
      $hedef = "uploads/" . $yeniDosyaAdı;
      // Yüklenen dosyayı hedefe taşı
      move_uploaded_file($yüklenenDosya['tmp_name'], $hedef);
    }
  }
?>
