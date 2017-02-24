
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
         <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
                 <title>phpFirstCRUD</title>
      </head>
      <body>
        <section class="wrapper">
          <header><h1>Please chenge form</h1></header>
          <form method="post" action="pdo.php">
            <label for="name">name:</label>
               <input type="text" name="name" placeholder="name">
            <label for="description">description</label>
               <input type="text" name="description" placeholder="desciption">
            <label for="created_at">created_at</label>
               <input type="text" name="created_at" placeholder="created_at">
            <div >
              <input type="submit" class="btn btn-info" >
            </div>
          </form>
        </section>
      </body>
    </html>

<!-- <?php
// if ( !empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["created_at"]) ) {
//         $sql = "INSERT INTO article (name, description, created_at) VALUES ( :name, :description, :created_at)";
//         $pdo_statement = $pdo_conn->prepare($sql);
//         $pdo_statement->blindValue(":name", $_POST['name']);
//         $pdo_statement->blindValue(":description", $_POST['description']);
//         $pdo_statement->blindValue(":created_at", $_POST['created_at']);
//         $result = $pdo_statement->execute();
// }


?> -->
