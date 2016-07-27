<?php

  //抜粋処理

  function text_excerpt($str){
    $excerpted_text = mb_substr($str, 0, 130, "UTF-8");
    echo $excerpted_text. "....";
  }

  //改行処理（改行文字を<br />に変換）

  function change_to_br($str){
    $changed_str = rtrim($str);
    echo nl2br($changed_str);
  }
