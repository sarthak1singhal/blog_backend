
<?php 

require_once "db.php";


  // session_start();

  // // If session variable is not set it will redirect to login page

  // if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
  //     header('Location:../login.php');
  //   exit;

  // }

  // $email = $_SESSION['email'];
  $author = $_POST['author'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  
  

  if (isset($_POST["submit"])) {


    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
     
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "../../uploads/".basename( $_FILES["fileToUpload"]["name"]);

        $fname = "../../uploads/".basename( $_FILES["fileToUpload"]["name"]);

        $sql = "INSERT INTO posts(author, title, content, filePath)
    VALUES (?,?,?,?)";

    $stmt = $db->prepare($sql);

    try {
      $stmt->execute([$author, $title, $content, $fname]);
      header('Location:../posts.php?posted');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }



      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    
    // Add task to DB
   /* $sql = "INSERT INTO posts(author, title, content)
    VALUES (?,?,?)";

    $stmt = $db->prepare($sql);

    try {
      $stmt->execute([$author, $title, $content]);
      header('Location:../posts.php?posted');

      }

     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }*/
 
  }













?>