<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);

require_once(__DIR__ . "/../vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$DB_HOST = $_ENV['DB_HOST'];
$DB_USER = $_ENV['DB_USER'];
$DB_PASS = $_ENV['DB_PASS'];
$DB_NAME = $_ENV['DB_NAME'];


class Operations
{

  protected $db;

  function __construct()
  {
    global $db;
    global $DB_HOST;
    global $DB_USER;
    global $DB_NAME;
    global $DB_PASS;

    try {
      $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      //echo "Connected to $dbname at $host successfully.";
    } catch (PDOException $pe) {
      die("Could not connect to the database $DB_NAME :" . $pe->getMessage());
    }
  }


  public function getAll($table)
  {

    global $db;

    $sel  =  $db->query("select * from " . $table . "");
    return $sel->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAlldistinct($table, $where)
  {

    global $db;

    $sel  =  $db->query("select distinct * from " . $table . "  " . $where);
    return $sel->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getList($table, $where)
  {

    global $db;

    $sel  =  $db->query("select * from " . $table . "  " . $where);

    //echo "select * from ".$table . "  " .$where;

    return $sel->fetchAll(PDO::FETCH_ASSOC);
  }

  public function delete($table, $id)
  {

    global $db;

    $sql = "delete from " . $table . " where id =:id";

    $stmt = $db->prepare($sql);

    return $stmt->execute(array(':id' => $id));
  }
  public function deleteAll($table)
  {

    global $db;

    $sql = "delete from " . $table . " ";

    $stmt = $db->prepare($sql);

    $stmt->execute();
  }

  public function delete_records($table, $id)
  {


    global $db;

    echo $sql = "delete from " . $table . " where pid =:id";

    $stmt = $db->prepare($sql);

    $stmt->execute(array(':id' => $id));
  }

  public function insert($table, $data)
  {

    global $db;

    $fields = array_keys($data);

    //echo "<pre/>";
    // print_r($fields);



    $sql = "INSERT INTO " . $table . "(" . implode(',', $fields) . ")";

    // insert into register (fname,lname)

    $sets = array();

    foreach ($data as $column => $value) {
      $sets[] =  ":" . $column;
    }


    //echo "<pre/>";
    // print_r($sets);




    $sql .= "values(" . implode(', ', $sets) . ")";  // values($fname,$lname)

    $stmt = $db->prepare($sql);

    //$data['f_name'];

    $final_bind = array();



    foreach ($data as $column => $value) {

      $final_bind[] =  $value;
    }

    $stmt->execute($final_bind);

    $id = $db->lastInsertId();
    return $id;
  }



  /*public function getSingle($table,$where){

      global $db;

      $sel  =  $db->query("select * from ".$table."  ". $where);
      return $sel->fetch(PDO::FETCH_ASSOC);
 }*/


  public function getSingle($table, $where)
  {

    global $db;

    $sel  =  $db->query("select * from " . $table . "  " . $where);

    return $sel->fetch(PDO::FETCH_ASSOC);
  }

  public function getJoinedSingle($table, $where)
  {

    global $db;

    $sel  =  $db->query("select * from " . $table . " INNER JOIN product_tbl ON product_tbl.id=order_details.prod_id INNER JOIN orders ON orders.id=order_details.order_id " . $where);

    return $sel->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getJoinedVendor($table)
  {

    global $db;

    $sel  =  $db->query("select DISTINCT " . $table . ".id," . $table . ".f_name," . $table . ".l_name from " . $table . " INNER JOIN brand_tbl ON brand_tbl.vendor_id=admin_tbl.id WHERE " . $table . ".permission_id='2'");

    return $sel->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllnew($table, $where)
  {

    global $db;
    $sel  =  $db->query("select * from " . $table . "  " . $where);
    return $sel->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getLimit($table)
  {

    global $db;

    $select = $db->query("select * from " . $table . " where parent_id=0 order by id asc LIMIT 0,12");

    return $select->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getlastid($table, $userid)
  {

    global $db;

    //SELECT * FROM `classified` WHERE user_id=3 order by id desc limit 1

    $select = $db->query("SELECT * FROM " . $table . " where user_id=" . $userid . " order by id desc limit 1");

    return $select->fetch(PDO::FETCH_ASSOC);
  }

  public function get_last_id($table, $userid)
  {

    global $db;

    //SELECT * FROM `classified` WHERE user_id=3 order by id desc limit 1

    $select = $db->query("SELECT * FROM " . $table . " where userid=" . $userid . " order by id desc limit 1");

    return $select->fetch(PDO::FETCH_ASSOC);
  }


  public function join_records()
  {


    global $db;

    $select = $db->query("SELECT * FROM classified LEFT JOIN classified_img_tbl ON classified.id = classified_img_tbl.classified_id ORDER BY classified.id");

    return $select->fetchAll(PDO::FETCH_ASSOC);
  }


  public function join_records_album()
  {


    global $db;

    $select = $db->query("SELECT * FROM album_tbl LEFT JOIN album_img_tbl ON album_tbl.id = album_img_tbl.albumid ORDER BY album_tbl.id");

    return $select->fetchAll(PDO::FETCH_ASSOC);
  }



  public function sort_audio_records($tags)

  {

    global $db;

    $query = 'SELECT * from `audio` where FIND_IN_SET("' . $tags . '",post_tags)';
    $select = $db->query($query);
    return $select->fetchAll(PDO::FETCH_ASSOC);
  }


  public function join_subcategory_records()
  {


    global $db;

    $select = $db->query("SELECT  FROM category_tbl, subcategory_tbl WHERE category_tbl.id = subcategory_tbl.catid");
    return $select->fetchAll(PDO::FETCH_ASSOC);
  }


  public function join_records_video_tag($tag_name)
  {

    global $db;

    $query = 'SELECT * from `video` where FIND_IN_SET("' . $tag_name . '",post_tags)';
    $select = $db->query($query);
    return $select->fetchAll(PDO::FETCH_ASSOC);
  }



  public function getLogin($table, $where)
  {

    global $db;

    $sel  =  $db->query("select * from " . $table . "  where " . $where);

    return $sel->fetchColumn();
  }


  public function getCounts($table, $where)
  {

    global $db;

    $sel  =  $db->query("select count(*) from " . $table . " " . $where);

    return $number_of_rows = $sel->fetchColumn();
  }


  public function getproductCounts($table, $where)
  {

    global $db;

    $sel  =  $db->query("select count(qty1) from " . $table . " " . $where);

    return $number_of_rows = $sel->fetchColumn();
  }

  public function getAllCounts($table)
  {

    global $db;

    $sel  =  $db->query("select count(*) from " . $table);

    return $number_of_rows = $sel->fetchColumn();
  }
  /*public function update($table,$data,$id){

   global $db;

  //$fields = array_keys($data);
  
    $sql = "UPDATE ".$table." SET ";
 
    // loop and build the column /
    $sets = array();

    foreach($data as $column => $value)
    {
         $sets[] = $column." = :".$column;
    }

    $sql .= implode(', ', $sets);
     
   $sql .= '  where id = :id';

    $stmt = $db->prepare($sql); 
     $final_bind = array();   
   
    foreach($data as $column => $value){

       $final_bind[] =  $value;


    }


//echo "<pre/>";
//print_r($final_bind);

$ids =  array('id'=>$id);

$final_bind = array_merge($final_bind, $ids);


//echo "<pre/>";
//print_r($final_bind); 



    /* 

$stmt->execute(array(':f_name' => $data['f_name'],':l_name' => $data['l_name'],':email' => $data['email'],':password' => $data['password'], ':id' => $id));
*/


  //$stmt->execute($final_bind);

  /*}*/


  public function update($table, $data, $id)
  {

    global $db;

    //$fields = array_keys($data);

    $sql = "UPDATE " . $table . " SET ";

    // loop and build the column /
    $sets = array();

    foreach ($data as $column => $value) {
      $sets[] = $column . " = :" . $column;
    }

    $sql .= implode(', ', $sets);

    $sql .= '  where id = :id';

    $stmt = $db->prepare($sql);
    $final_bind = array();

    foreach ($data as $column => $value) {

      $final_bind[] =  $value;
    }


    //echo "<pre/>";
    //print_r($final_bind);

    $ids =  array('id' => $id);

    $final_bind = array_merge($final_bind, $ids);


    //echo "<pre/>";
    //print_r($final_bind); 



    /* 

$stmt->execute(array(':f_name' => $data['f_name'],':l_name' => $data['l_name'],':email' => $data['email'],':password' => $data['password'], ':id' => $id));
*/


    return $stmt->execute($final_bind);
  }

  public function sizeqtyupdate($table, $data, $id, $id1)
  {

    global $db;

    $sql = "UPDATE " . $table . " SET ";

    // loop and build the column /
    $sets = array();

    foreach ($data as $column => $value) {
      $sets[] = $column . " = :" . $column;
    }

    $sql .= implode(', ', $sets);

    $sql .= '  where product_id = :product_id and size = :size';

    $stmt = $db->prepare($sql);
    $final_bind = array();

    foreach ($data as $column => $value) {

      $final_bind[] =  $value;
    }

    $ids =  array('product_id' => $id, 'size' => $id1);

    $final_bind = array_merge($final_bind, $ids);

    $stmt->execute($final_bind);
  }

  function callAPI($method, $url, $data)
  {
    $curl = curl_init();
    switch ($method) {
      case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
      case "PUT":
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
      default:
        if ($data)
          $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Authorization: Token 973eb913d93dafc5d2dc688cf88eb94bced37609',
      'Content-Type: application/x-www-form-urlencoded\r\n'
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if (!$result) {
      die("Connection Failure");
    }
    curl_close($curl);
    return $result;
  }
}


class SessionClass
{
  // add a local session var
  // and unset all var set by this class
  public function has($name)
  {
    $value = $_SESSION[$name] ?? "";
    $value = trim($value);

    if ($value == "") {
      return false;
    }

    return true;
  }

  public function get($name)
  {
    $value = trim($_SESSION[$name]);
    unset($_SESSION[$name]);

    return $value;
  }

  public function with($key, $value)
  {

    $array = ['info', 'success', 'warnning', 'danger'];

    // clean all
    foreach ($array as $val) {
      unset($_SESSION[$val]);
    }

    $_SESSION[$key] = $value;

    // exit();
  }
}


class Utils
{
  public static function cleaner($input)
  {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
  }
  public static function htmlRedirect($url, $message = "")
  {
    if ($message != "")
      echo '<script type="text/javascript"> alert("' . $message . '") </script>';

    echo '<script type="text/javascript"> location.href="' . $url . '"; </script>';
    exit;
  }
  public static function phpRedirect($url)
  {
    header('Location: ' . $url);
    exit();
  }
  public static function randomNumber($length)
  {
    $result = '';

    for ($i = 0; $i < $length; $i++) {
      $result .= mt_rand(0, 9);
    }

    return $result;
  }
}
