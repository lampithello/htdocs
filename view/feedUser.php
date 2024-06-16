<?php

session_start();
?>

<!DOCTYPE html>
<html lang="it" xml:lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Project X wiki</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Il tuo header va qui -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Homepage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="pkb.php">PKB table</a></li>
                    <li class="nav-item"><a class="nav-link" href="feedUser.php">Area Feedback</a></li>
                </ul>
                <div>
                    <?php if (isset($_SESSION['username'])) : ?>
                        <!-- Se l'utente è loggato mostra il nome utente con profilo e azione di logout -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo htmlspecialchars($_SESSION['username']); ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php">Home</a></li>
                                <li><a class="dropdown-item" href="model/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <!-- Se l'utente non è loggato allora mostra i bottoni di registrazione e login -->
                        <button class="btn btn-outline-dark mx-2" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                        <button class="btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                    <?php endif; ?>
                </div>


            </div>


        </div>
    </nav>
    <!-- Section-->    
    <section class="py-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Benvenuto nell'area feedback</h4>
            <hr>
            <p class="mb-0">In questa pagina potrai inviare un qualsiasi feedback sull'applicazione e sulle norme di sicurezza presenti all'interno, con suggerimenti su eventuali norme da aggiungere o migliorie nella gestione delle pagine</p>
        </div>
        <form action="../model/feedWrite.php" method="POST">
            <div class="mb-3">
                <label for="textarea" class="form-label">Inserisci il tuo feedback</label>
                <textarea class="form-control" name="textArea" id="textarea" rows="3" required></textarea>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="submit">Invia</button>
            </div>
        </form>
    </section>                    
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"></p>
        </div>
    </footer>
    <!-- Il resto del tuo HTML va qui -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-8C+Zt5qFqFjY8YGHK4BjtGHv+Ue5Fg5p7nMewc+DA6g6Zl4X4x7+we5m5lFvtDbi" crossorigin="anonymous"></script></body>

</html>