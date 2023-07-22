<?php
class user {
        
    function checkLogin(){
        if(isset($_SESSION['zalogowany']) || !empty($_SESSION['zalogowany'])){
            return;
        }else{
            die ('Nie jesteś zalogowany');
        }
        
    }
}