
<form method="post" action="edit.php">
        <input type="text" name="name" placeholder="name" value="<?php echo $result['name']; ?>" required/>

        <input type="text" name="description" placeholder="description" value="<?php echo $result['description']?>" required/>
        <input type="text" name="created_at" placeholder="created_at"  value="<?php echo $result['created_at']?>" required/>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
        <input type="submit">
    </form>