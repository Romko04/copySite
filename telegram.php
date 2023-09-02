<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $botToken = '6055593384:AAFokbbGuBq-jJtWA21_ZK7f_ej5hy39oYM'; // Замените на ваш токен
    $chatId = '-931170897'; // Замените на ID чата, куда вы хотите отправлять сообщения
    // Получаем данные из формы
    $formname = $_POST["formname"];
    $roofType = $_POST["roofType"];
    $sendResultPolzunok = $_POST["send-result-polzunok"];
    $orderRoof22 = $_POST["orderRoof22"];
    $orderRoof33 = $_POST["orderRoof33"];
    $yourName = $_POST["yourName"];
    $yourPhone = $_POST["number"];

    // Составляем текст сообщения
    $message = "Новая заявка из формы:\n";
    $message .= "Форма: $formname\n";
    $message .= "Тип объекта: $roofType\n";
    $message .= "Площадь помещения: $sendResultPolzunok\n";
    $message .= "Дизайн проект: $orderRoof22\n";
    $message .= "Начало ремонта: $orderRoof33\n";
    $message .= "Имя: $yourName\n";
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
        header("Location: thanks.html");
        exit;
    }
}
?>
