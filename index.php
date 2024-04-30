<?php 
session_start();

if( isset($_SESSION['userId'])) {
    require('./config/db.php');

    $userId = $_SESSION['userId']; 

    $stmt = $pdo -> prepare('SELECT * FROM users WHERE id = ?');
    $stmt -> execute([ $userId ]);

    $user = $stmt -> fetch();

    if( $user->role === 'guest') {
        $message = "Sua conta é de um visitante";
    }

}


?>

<?php require('./inc/header.html'); ?>

<body>
    <div class="container">
        <div class="card bg-light mb-3 col-md-5 offset-md-3">
            <div class="card-header">
                <?php if(isset($user)) { ?>
                    <h6>Seja bem-vindo, <?php echo $user->name ?></h6>
            <?php } else { ?>
                    <h6>Seja bem-vindo, visitante</h6>
            <?php } ?>
            </div>
            <div class="card-body">

                <?php if(isset($user)) { ?>
                    <h6>Esse conteúdo só pode ser visualizado por pessoas logadas. Faça seu <a href="login.php">login</a> e tenha acesso. </h6>
            <?php } else { ?>
                    <h7>Por favor, faça <a href="login.php">login</a> ou <a href="register.php">registre-se</a> para ter acesso a todo conteúdo.</h7>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

<?php require('./inc/footer.html'); ?>



