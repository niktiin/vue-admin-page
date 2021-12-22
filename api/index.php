<?php

//Работа с примитивной базой данных с использованием 'serialize'
class Storage
{
    public function write($database, $data)
    {
      $handle = fopen ("storage/$database.txt","w") or $error = array(
        "code" => 500,
        "message" => "Internal Server Error"
      );
      $s_data = serialize($data);
      fwrite($handle, $s_data);
      fclose ($handle);
      return $error ?  $error : true;
    }
    public function read($database)
    {
      $handle = file_get_contents("storage/$database.txt");
      if (!$handle) {
        $error = array(
          "code" => 500,
          "message" => "Internal Server Error"
        );
      }
      $data = unserialize($handle);
      return $error ?  $error : $data;
    }

}


try {
  $storage = new Storage();
  $print = $storage->read("item");

  print_r($print);
} catch (Exception $e) {

};
