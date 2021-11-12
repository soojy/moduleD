<?php
/*
    Plugin Name: formPlugin
    Author: soojy
    Author URI: https://github.com/soojy
 */

function FormEcho()
{
    echo '
    <style>
    .form {
        padding: 2rem;
        display: flex;
        margin: 0 auto;
        flex-direction: column;
        justify-content:center;
        align-items: center;
        font-family: sans-serif;
    }
    
    .form input, select, button {
        display: block;
        margin: 1rem 0;
        padding: 10px 15px;
        width: 300px;
    }
    </style>
    ';


    echo '
    <form class="form" action="#" method="post">
        
            
                <label for="date">Дата посещения</label>
                <input type="text" name="date" >
            
                <label for="time">Время посещения</label>
                <input type="time" name="time" >
            
                <label for="name">ФИО</label>
                <input type="text" name="name" >
            
                <label for="doctor">Выбор врача</label>
                <input type="text" name="doctor" >
            
                <button type="submit" >Отправить</button>
            
            
              
        
    </form>
    ';


}
