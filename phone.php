<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sendForm3"])) {
    $botToken = '6055593384:AAFokbbGuBq-jJtWA21_ZK7f_ej5hy39oYM'; // Замените на ваш токен
    $chatId = '-931170897'; // Замените на ID чата, куда вы хотите отправлять сообщения

    // Получаем данные из формы
    $name = $_POST["name"];
    $yourPhone = $_POST["number"];

    // Составляем текст сообщения
    $message = "Новая заявка от $name:\n";
    $message .= "Телефон: $yourPhone";

    // Отправляем сообщение ботом в Telegram
    $telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage";
    $data = array(
        'chat_id' => $chatId,
        'text' => $message
    );

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($telegramApiUrl, false, $context);

    if ($result === false) {
        // Обработка ошибки отправки сообщения
        // ...
    } else {
        // Сообщение успешно отправлено
        // Можете выполнить дополнительные действия после успешной отправки
        header("Location: thanks.php");
        exit;
    }
}
?>
