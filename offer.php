<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form verilerini al
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Verileri doğrula
    if (empty($name) || empty($email) || empty($message)) {
        $error = "Lütfen tüm alanları doldurun.";
    } else {
        // Verileri veritabanına kaydet
        $query = "INSERT INTO quotes (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
        mysqli_query($conn, $query);

        // Başarılı mesajı göster
        $success = "Teklifiniz başarıyla alındı! En kısa sürede size geri dönüş yapacağız.";
    }
}

?>

<form action="" method="post">
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>

    <input type="text" name="name" placeholder="Adınız">
    <input type="email" name="email" placeholder="E-posta">
    <input type="tel" name="phone" placeholder="Telefon">
    <textarea name="message" placeholder="Mesajınız"></textarea>
    <button type="submit">Teklif Al</button>
</form>
