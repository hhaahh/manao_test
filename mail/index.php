<?php

if(mail("6olinet@gmail.com", "Загаловок", "Текст письма \n 1-ая строчка \n 2-ая строчка \n 3-ая строчка")){
    echo "Передано в очередь";
}else{
    echo 'Не передано';
}
?>