<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


    <title>hhm_test</title>


<style>
/*  Проверялось в IE11, FF24, FF36, FF45. Т.е. должно работать везде, в более новых браузерах.
В IE6 не работает.
*/

* {  -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
     box-sizing: border-box;
    margin: 0; padding: 0; border: 0; line-height: 100%;
    font-family: Roboto, Tahoma;
    font-style: normal;
 }


html, body {padding:0; margin:0;
height: 100%; /* задаем высоту тела документа */
	min-height: 100%;
	}

* html  { /* хак для ie6 */
height: 100%; /* для ие6, т.к. не понимает min-height */
    position: absolute; left: 0;
    top: 0;
    bottom: 0;
    right: 0;
}

body {position: absolute; left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    background-color: rgb(45, 49, 54);
}

.main {position: absolute; left: 0;
    top: 0;
    right: 0; }

/*  Для наложения макета в виде изображения  */
div.hhm_test {display: block; left: 0; top: 0; bottom: 0; right: 0; position: absolute; z-index: 10;}
img.hhm_test {width: 100vw; max-width: 100vw; display: inline; }


div.top-logotip {display: block;   width: 18.3vw;  margin: 0 0 0 15vw;   position: absolute; top: 3.5vw; left: 0; right: 0}
img.top-logotip {padding-bottom: 35vw; max-width:100%; }

div.cycle-with-letter { width: 16.6vw;  position: relative; top: 12.5vw;   }
img.cycle-with-letter { margin: 0 0 0 38.6vw;  width:100%; max-width:100%;}

.form { padding: 0 0px 0px 14.3vw; font-size: 2vw; color: rgb(255, 255, 255); position: absolute; top: 31.2vw; left: 0; }

.form .form_p_asterick {color: rgb(190, 57, 59); font-weight: bold; font-size: 120%; }

.form_div_field { margin: 0 0 4.7vw 0; position: absolute; top: 0; left: 0}
.form_div_left {display: inline-block; vertical-align: top; margin-right: 8.3vw; position: absolute}

.form_div_field .input_text_style, .form_div_field .input_text_style_comm {width: 28.2vw; border-radius: 0.4vw; margin-top: 0.5vw; border: 1px solid;
    font-size: 2vw; background-color: rgb(47, 51, 56); color: rgb(255, 255, 255); font-weight: normal; font-family: Tahoma; padding-left: 1.5vw; }

.input_text_style { height: 6vw; }
.input_text_style_comm {height: 20vw;}

form.comm_form { }
p.text_form {height: 3vw}

#save {margin: 2vw 0 0 57vw; font-size: 2vw; background-color: rgb(190, 57, 59); color: rgb(255, 255, 255); position: absolute; top: 28vw;
    left: 14vw; width: 14vw; height: 5vw;}


h2 {text-align: left; margin: 9vw 0px 0px 34.6vw; font-size: 2.3vw; letter-spacing: 0.14vw; color: rgb(255, 255, 255) }
    #comments {position: absolute; top: 72vw;  left: 0; background-color: rgb(146, 148, 151)}

   #comments_area {width: auto; margin: 8.1vw 0 4.5vw 16.1vw;}

    .comm {width: 20vw; display: inline-block; height: 5vw; background-color: rgb(75, 89, 108); font-size: 2.3vw; margin: 0 3.6vw 23vw 0;}
    .comm .centr_table {display: table; height: 100%; width: 100%}
    .comm .centr_table .centr_cell {display: table-cell;  text-align: center; color: rgb(255, 255, 255); vertical-align: middle;  height: 100%; overflow: auto;}

    #comments_area .comm_message {background-color: rgb(235, 239, 244);  width: 100%; height: 19vw; font-size: 2vw; text-align: center;
    }

#comments_area .comm_message, .comm .centr_table .centr_cell {
    overflow: auto;
    -webkit-hyphens: auto;
    -moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto; /* значение auto не поддерживается Chrome (и, похоже, еще кем-то) */

    overflow-wrap: break-word;  /* не поддерживает IE, Firefox; является копией word-wrap */
    word-wrap: break-word;
    word-break: break-all;  /* не поддерживает Opera12.14, значение keep-all не поддерживается IE, Chrome */
    line-break: auto;  /* нет поддержки для русского языка */

}

.comm .centr_table .centr_cell div {max-height: 5vw; overflow: auto}

    #comments_area .comm_message .email {padding: 3vw 0 2.5vw 0; font-weight: normal; color: #C8CBCB; text-align: center;}
    #comments_area .comm_message .text_message {margin: 0.5vw 0 0 0; font-family: Tahoma; color: rgb(120, 119, 132); }
/*
  #comments_area:nth-child(2n+2)  .comm_message:nth-child(2n+2)  {background-color: green;}
*/


div.footer-logotip {display: block;  padding: 0;  background-color: rgb(42, 45, 51)}

img.footer-logotip {margin: 2vw 0 0vw 14.8vw; padding-bottom: 3vw; width: 15vw; max-width:100%;}

.sots-seti { margin: 2.3vw 0px 2vw 45.7vw; vertical-align: top; width: 8.5vw;}

</style>

</head>
<body>

<!--
<div id="test_picture" style="opacity: 0.5" class="hhm_test"><img src="hhm_test.png " class="hhm_test"  /></div>
<button style="position: fixed; right: 0px; top: 0px; z-index: 100 " onclick="show()"><span style="font-size: 70%">Скрыть/Показать<br/> Макет</span></button>
<script>
    function show() {
        if(getComputedStyle(document.getElementById('test_picture')).display == 'block'){
            document.getElementById('test_picture').style.display = 'none';
        }else {
            document.getElementById('test_picture').style.display = '';
        }
    }
</script>
-->


<div class="main" style=" "><div class="top-logotip"><img src="top-logotip.png " class="top-logotip"  /></div>



    <div class="cycle-with-letter" style=""><img src="cycle-with-letter.png" class="cycle-with-letter" style="" /></div>

<div class="form" style="">

    <form name="add" class="comm_form" id="add" method="post" action="" onsubmit=" return false;">

  <div class="form_div_left">
      <div class="form_div_field" style=""><p class="text_form">Имя <span class="form_p_asterick">*</span></p>
        <input type="text"  name="user_name" class="input_text_style control" />
    </div><div class="form_div_field" style="top: 14vw"><p class="text_form">E-Mail <span class="form_p_asterick">*</span></p>
        <input type="text"  name="user_email" class="input_text_style  control" />
    </div>

  </div>


      <div class="form_div_left">
          <div class="form_div_field" style="left: 37vw"><p class="text_form">Комментарий <span class="form_p_asterick">&nbsp;*</span></p>
              <textarea type="text"  name="user_message" class="input_text_style_comm  control" ></textarea>
          </div>
  </div>

        <button id="save" type="button" >Записать</button>

    </form>

</div>



</div>


<!-- Комментарии -->
<div id="comments" style="">
    <h2>Выводим комментарии</h2>

<!--  При обновлении страницы  const_to_do='show_ALL' ; а при AJAX-запросах она будет отсутствовать  -->
<?php  define('const_to_do', 'show_ALL'); include 'saver.php';

?>


<div id="footer">
    <div class="footer-logotip"><img src="top-logotip.png " class="footer-logotip"  /><img src="sots-seti.png" class="sots-seti" /></div>
</div>

</div>



<script>

(function (){
// Обработчики клика на поле ввода e-mail, имени и текста сообщения

var el_class_control = document.getElementsByClassName('control');
    for(var i=0; i<el_class_control.length; i++) { {
        el_class_control[i].onclick = function () { // Если цвет фона поля был изменен скриптом, то отменяем изменения, восстанавливая прежний цвет фона
            if(this.getAttribute('data-backgroundColor_flag')){
                this.style.backgroundColor = ''; // Если установлен этот и он равен true, то сбрасываем цвет
                this.removeAttribute('data-backgroundColor_flag');
            }
        };
    }

     }



 /* Это удобно, но не кроссбраузерно
var el_class_control = Array.from(document.getElementsByClassName('control'));
    el_class_control.forEach(function(entry) {
        entry.onclick = function () { // Если цвет фона поля был изменен скриптом, то отменяем изменения, восстанавливая прежний цвет фона
            if(this.getAttribute('data-backgroundColor_flag')){
                this.style.backgroundColor = ''; // Если установлен этот и он равен true, то сбрасываем цвет
                this.removeAttribute('data-backgroundColor_flag');
            }
        };
     });
*/
    document.getElementById('save').onclick = function () { // Обработчик кнопки "Записать"

var text_mes = '';
        var fio = document.getElementsByName('user_name')[0].value;
            if((fio.length > 50) || (fio.length < 1)){
                document.getElementsByName('user_name')[0].value = '';
                text_mes += '\nНеверное имя: допускается не менее 1 и не более 50 символов';
            }

        var email = document.getElementsByName('user_email')[0].value;
            if((email.length > 50) || (email.length < 5)){
                document.getElementsByName('user_email')[0].value = '';
                text_mes += '\nНеверный e-mail: допускается не менее 5 и не более 50 символов';
            }
            if(!validate(email)){
                document.getElementsByName('user_email')[0].value = '';
                text_mes += '\nНеверный e-mail: ошибка';
            }

        var comm_message = document.getElementsByName('user_message')[0].value;
            if((comm_message.length > 500) || (comm_message.length < 5)){
                document.getElementsByName('user_message')[0].value = '';
                text_mes += '\nНеверное сообщение: допускается не менее 5 и не более 500 символов';
            }

        if(text_mes){ // Если нечто введено некорректно
            alert(text_mes);

/*  Не кроссбраузерно
            el_class_control = Array.from(document.getElementsByClassName('control'));
            el_class_control.forEach(function(entry) {
                if(entry.value == ''){
                    entry.style.backgroundColor = '#E36060';
                    entry.setAttribute('data-backgroundColor_flag', true); // Добавляем контрольный флаг изменения цвета, чтобы потом при его проверке было понятно, что цвет был изменен. Ибо вместо #E36060 потом могут быть, в принципе, и другие цвета, по желанию разработчиков
                }
            });
*/
            el_class_control = document.getElementsByClassName('control');

            for(var i=0; i< el_class_control.length; i++){
                if(el_class_control[i].value == ''){
                    el_class_control[i].style.backgroundColor = '#E36060';
                    el_class_control[i].setAttribute('data-backgroundColor_flag', true); // Добавляем контрольный флаг изменения цвета, чтобы потом при его проверке было понятно, что цвет был изменен. Ибо вместо #E36060 потом могут быть, в принципе, и другие цвета, по желанию разработчиков
                }
            }


            return;
        }


if(confirm('Вы ввели:\n\n Имя: '+ fio + '\n E-mail: '+ email + '\n Сообщение:'+ comm_message +'\n\nЕсли все верно, нажмите кнопку ОК')){
            // Переходим к отправке сообщения

        sender(fio, email, comm_message, 'insert'); // Отправляем сообщение для вставки комментария
 }
        return false;

// Для простоты, проверку валидности e-mail производим только на клиенте.
function validate(email) { // Простая проверка валидности e-mail
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
       if(reg.test(email) == false) {
          return false;
       }else {
           return true;
       }
}

    };

function sender(fio, email, comm_message, to_do) { // Функция отправляет сообщение на сервер  и ждет того или иного ответа, выводя потом его в alert
    var xhr = new XMLHttpRequest();
    // Готовим тело сообщения для отправки     // в encodeURIComponent преобразует в формат, который может принять сервер
    var body = 'fio='+encodeURIComponent(fio)+'&email='+encodeURIComponent(email)+'&comm_message='+encodeURIComponent(comm_message)+'&to_do='+to_do;
    xhr.open("POST", 'saver.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function xhr_state() { // (3)
        if (xhr.readyState != 4) return;
        if (xhr.status == 200) {
            if(xhr.responseText != 1){ // Сервер должен вернуть в ответ 1, как залог успешности приема и записи сообщения. Или он возвращает сообщение об ошибке или ином событии, понятное для простого пользователя
                alert(' '+xhr.responseText);
            }else{
                insert_comment(fio, email, comm_message); // После подтверждения получения сообщения вставляем его на странице средствами JS
                change_style_even_comments();
                alert('Сообщение успешно отправлено и сохранено на сервере.');
                // location.reload();
            }
        } else {
            alert('xhr error '+xhr.statusText); // Сообщение об ошибке на транспортном (IP/ТСР) уровне. Обычно вызвано проблемами  с доступом к сети или неправильной работой РНР на сервере, т.п.
        }
    };
    xhr.send(body);
    return false;
}

// Формируем отправляемое сообщение на странице
function insert_comment(fio, email, comm_message){  var comms = document.getElementById('comments_area');
        var comm_display_none = document.getElementById('commID');
        var comm_new = comm_display_none.cloneNode(true);
            comm_new.removeAttribute('style');

        var last_comm = comms.lastChild;
        var new_comm_id = last_comm.getAttribute('id')+'1';

        var FIO_div = comm_new.getElementsByClassName('centr_cell')[0];
            FIO_div.textContent = fio;

        var email_div = comm_new.getElementsByClassName('email')[0];
            email_div.textContent = email;

        var text_message = comm_new.getElementsByClassName('text_message')[0];
            text_message.textContent = comm_message;

            comm_new.setAttribute('id', new_comm_id);
        comms.appendChild(comm_new);

return;
}

    change_style_even_comments();




 })();

function change_style_even_comments() {
    var comms = document.getElementById('comments_area').getElementsByClassName('comm_message');
    var comms_names = document.getElementById('comments_area').getElementsByClassName('centr_table');

    for(var i=2; i < comms.length; i=i+2) { // У четных комментарией меняется стиль
        comms[i].style.backgroundColor = 'rgb(222, 235, 222)';


        comms[i].getElementsByClassName('email')[0].style.color = 'rgb(88, 173, 82)';
        comms_names[i].style.backgroundColor = 'rgb(88, 173, 82)';
    }
}




</script>






</body>
</html>