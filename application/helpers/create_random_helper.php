<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function helper_createUserCode(){
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $string = '';
  for($i = 0; $i < 8; $i++) {
      $pos = rand(0, strlen($data)-1);
      $string .= $data{$pos};
  }
  return 'U_'.$string;
}
  function helper_createCodeGuru(){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < 8; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return 'G_'.$string;
  }

  function helper_createCodeMurid(){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < 8; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return 'M_'.$string;
  }

  function helper_createPwdGuru(){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < 6; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
  }

  function helper_createCodeMapel(){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < 7; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return 'Ma_'.$string;
  }

  function helper_createCodeKelas(){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < 7; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return 'Kl'.$string;
  }

  function helper_createCodeTugas(){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < 7; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return 'Tg'.$string;
  }

  function helper_createCodeQuiz(){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < 7; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return 'Qz'.$string;
  }

  function helper_createCodeSoal(){
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i = 0; $i < 7; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return 'Sl'.$string;
  }
