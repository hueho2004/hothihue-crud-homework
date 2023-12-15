<?php 
require_once('partial/header.php');
require_once('database/database.php');
 ?>
    <div class="container p-4">
        <div class="d-flex justify-content-end p-2">
            <a href="create_html.php" class="btn btn-primary">Add +</a>
        </div>
        <? foreach (selectAllStudents() as $st): ?>
        <div class="card">
            <div class="card-body">
               <div class="d-flex">
                    <div class="card-image mr-3">
                        <img class="img-fluid" width="200" src="<?php echo $st['profile']?>" alt="">
                    </div>
                    <div class="info">
                        <h1 class="display-4"><?php echo $st['name']?></h1>
                        <strong><?php echo $st['age']?></strong> 
                        <p><?php echo $st['email']?></p>
                    </div>
               </div>
                <div class="action d-flex justify-content-end">
                    <a href="update_html.php?id=<?php echo $st['id']?>" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                    <a href="delete_model.php?id=<?php echo $st['id']?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <? endforeach; ?>
    </div>
<?php require_once('partial/footer.php'); ?>