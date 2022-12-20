
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>FASTVIEW</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
  <body>
    
    <script src="js/sweetalert.js"></script>
      
    <?php
      function alerta($icon,$title){
        echo "<script type='text/javascript'>
        Swal.fire({
          icon: '$icon',
          title: '$title',
          }).then(function (){
            document.location.href='index.php';
          });        
        </script>";
      }
      
      
      
    ?>

    <div class="container">
      
    </div>
