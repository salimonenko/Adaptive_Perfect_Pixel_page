<?php
/**
 * Created by PhpStorm.
 * User: Sea
 * Date: 22.01.2022
 * Time: 19:18
 */

/* Установка внутренней кодировки этого скрипта в UTF-8 */
mb_internal_encoding("utf-8");
$internal_enc = mb_internal_encoding();
mb_regex_encoding("utf-8");


 $fio = ''; $email = ''; $comm_message = ''; // Задаем начальные значения для безопасности

// Самые простейшие проверки полученных данных от клиента
if(isset($_REQUEST['to_do']) && (($_REQUEST['to_do']) !== '') && (mb_strlen($_REQUEST['to_do']) < 10)){
    $to_do = htmlspecialchars($_REQUEST['to_do']); // Простейшее преобразование, чтобы заменить опасные символы. На самом деле, ерунда; надо делать более тщательные преобразования, в т.ч. при помощи str_replace и т.д.
}else{ // Если в запросе нет переменной to_do или если она слишком длинная, то принудительно устанавливаем ее значение, используемое при обновлении страницы
    $to_do='show_ALL';
}

$servername = "localhost";
$database = "hhm_test1";
$username = "root";
$password = ""; // В учебных целях пароль не задан

$database_table = "comments1";

// ********  Актуально при первом запуске, когда еще нет базы данных  **********************
// Создание соединения
$conn = new mysqli($servername, $username, $password);
// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Создание базы данных, если ее еще нет
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) !== TRUE) {
    die("Ошибка создания базы данных: " . $conn->error);
}
$conn->close();

// Создание нового соединения - для созданной базы данных
$conn_t = new mysqli($servername, $username, $password, $database);

// Создание таблицы в базе данных
$sql = "CREATE TABLE IF NOT EXISTS $database_table (ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, FIO VARCHAR(50) NOT NULL, EMAIL VARCHAR(50) NOT NULL, coment VARCHAR(500) NOT NULL ) ";

if(!mysqli_query($conn_t, $sql)){
    echo "ERROR: Не удалось выполнить $sql. " . mysqli_error($conn_t);
}

// Закрыть подключение
$conn_t->close();
// ********************************************************************************

// Создаем соединение
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);


// Создаём новое соединение с базой данных MySQL с использованием PDO, $my_Db_Connection - это объект
try {
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
//  echo "Connected successfully";
} catch (PDOException $error) {
// Если еще нет такой базы данных, то создаем ее


   die('dBase Connection error: ' . $error->getMessage());
}

// Начало обработки AJAX-запроса
if(!defined('const_to_do')){
    header('Content-Type: text/html; charset=utf-8');

    if($to_do === 'insert'){
        if(isset($_REQUEST['fio']) && (($_REQUEST['fio']) !== '') && (mb_strlen($_REQUEST['fio']) < 50)){
            $fio = htmlspecialchars($_REQUEST['fio']);
        }
        if(isset($_REQUEST['email']) && (($_REQUEST['email']) !== '') && (mb_strlen($_REQUEST['email']) < 50)){
            if(filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){ // Только в учебных целях и для скорости работы. А так (в своих проектах, где это важно) я применяю регулярные выражения
                $email = htmlspecialchars($_REQUEST['email']);
            }
        }
        if(isset($_REQUEST['comm_message']) && (($_REQUEST['comm_message']) !== '') && (mb_strlen($_REQUEST['comm_message']) < 500)){
            $comm_message = htmlspecialchars($_REQUEST['comm_message']);
        }

        if (!$fio || !$email || !$comm_message){
            die('Похоже, Вы передали неправильные данные или произошла ошибка сервера. Ваше сообщение не сохранено.');
        }

// ********  Записываем сообщение в базу данных  ******************* (Начало)

// создаём переменную, которая вызывает метод prepare() объекта базы данных
// SQL-запрос, который хотим запустить, вводится как параметр, а плейсхолдеры записываются следующим образом - :placeholder_name
     $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO $database_table (FIO, EMAIL, coment) VALUES (:fio, :email, :comm_message)");

// Теперь мы сообщаем скрипту, на какую переменную фактически ссылается каждый плейсхолдер, используя метод bindParam()
// Первый параметр - это плейсхолдер в приведённом выше выражении, второй параметр - это переменная, на которую он должен ссылаться
    $my_Insert_Statement->bindParam('fio', $fio);
    $my_Insert_Statement->bindParam('email', $email);
    $my_Insert_Statement->bindParam('comm_message', $comm_message);

// Выполним запрос, используя данные, которые мы только-что определили
// Метод execute() возвращает TRUE, если запрос был выполнен успешно и FALSE в противном случае, позволяя создавать собственные сообщения
    if ($my_Insert_Statement->execute()) {
//  echo "New record created successfully";
    } else {
      die("Невозможно сохранить сообщение в базе данных: ошибка сервера");
    }

// ********  /Записываем сообщение в базу данных  ******************* (Конец)
        die('1'); // Корректный ответ клиенту, когда все сделано успешно

     }else{
        die('Сообщение не сохранено, так как в результате ошибки браузера был передан неверный параметр to_do');
    }
 }else{ // При обновлении страницы, без AJAX, т.к. AJAX не может задать значение константы
     if($to_do === 'show_ALL'){ // При обновлении страницы вывести все комментарии из базы данных
        echo '<div id="comments_area" style="">';

$row = array(   'ID'    =>  'ID',
                'FIO'   =>  'FIO',
                'EMAIL' =>  'EMAIL',
                'coment'=>  'coment'
            );
$display_none = 'style="display:none"';
echo comm_HTML($row, $display_none); // Первым выводим незаметный div - он будет служить в качестве шаблона для показа на странице комментария, созданного пользователем

$display_none = '';

         $my_Insert_Statement = "SELECT ID, FIO, EMAIL, coment FROM comments1 ";

try {
    foreach ($my_Db_Connection->query($my_Insert_Statement) as $row) {
        echo comm_HTML($row, $display_none);
    }
//  echo " successfully";
} catch (PDOException $error) { // На всякий случай
    die('dBase Connection error1: ' . $error->getMessage());
}

        echo  '</div>';
    }
 }


// По идее, строку из функции лучше бы оформить в виде шаблона и хранить где-то отдельно (где шаблоны)
function comm_HTML($row, $display_none){
   return '<div id="comm'. $row['ID'] .'" class="comm" '. $display_none .'><div class="centr_table"><div class="centr_cell"><div>'. $row['FIO'] .'</div></div></div>
            <div class="comm_message">
                <div class="email">'. $row['EMAIL'] .'</div>
                <div class="text_message">'.$row['coment']. '</div>
            </div>
        </div>';
 }











