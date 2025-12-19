<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $abone_email = isset($_POST['email_adresi']) ? htmlspecialchars($_POST['email_adresi']) : 'Bilgi Yok';

    $to_email = "salamowshatlyk0@gmail.com"; // KENDİ E-POSTA ADRESİNİZİ BURAYA YAZIN
    $subject = "Web Sitesinden Yeni Abone Talebi!";
    $message = "Merhaba,\n\n";
    $message .= "Yeni bir kullanıcı e-posta aboneliği için talepte bulundu:\n";
    $message .= "E-posta Adresi: " . $abone_email . "\n\n";
    $message .= "Saygılarımızla,\nWeb Siteniz";

    $headers = "From: YoungScientist.xyz\r\n"; // Web sitenize ait bir adres
    $headers .= "Reply-To: " . $abone_email . "\r\n"; // Abone olanın e-postasına cevap verme imkanı
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    if (mail($to_email, $subject, $message, $headers)) {
        // Başarılı olursa kullanıcıyı bilgilendir
        header("Location: index.html?status=success"); // Ana sayfanıza yönlendirin
        exit;
    } else {
        // Hata olursa kullanıcıyı bilgilendir
        header("Location: index.html?status=error"); // Ana sayfanıza yönlendirin
        exit;
    }
} else {
    // Form doğrudan erişilirse ana sayfaya yönlendir
    header("Location: index.html");
    exit;
}
?>