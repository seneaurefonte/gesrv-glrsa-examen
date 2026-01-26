
<?php 
  define("WEBROOT","http://localhost:8000");
  require_once dirname(__DIR__)."/services/service.php";
  $page=$_GET['page']??"demande";

  //Gestion des Formulaires 
  //$_REQUEST
$message = '';
$errors = [];

   $action=$_REQUEST['action']??'';
     switch ($action) {
      case 'search-tel':
          $tel=$_GET['telephone']??'';
          $patient= getPatientByTel($tel);
         
         break;
          case 'search-tel-type':
          $tel=$_GET['telephone']??'';
          $type=$_GET['type']??'';
          $patient= getPatientByTelAndType($tel,$type);
         
         break;
         //create-compte
     case 'create-compte':
            if(isVide($_POST['telephone'])){
                $errors['telephone']="Telephone est obligatoire";
            }else{
                $patient= getPatientByTel($_POST['telephone']);
                if($patient!=null){
                    $errors['telephone']="Telephone existe deja";
                }
            }
            if(isVide($_POST['nom'])){
                $errors['nom']="Nom est obligatoire";
            }
            if(isVide($_POST['prenom'])){
                $errors['prenom']="Prenom est obligatoire";
            }
            if(count($errors)==0){
                $patient=[
                    "telephone"=>$_POST['telephone'],
                    "nom"=>$_POST['nom'],
                    "prenom"=>$_POST['prenom'],
                    "date_naissance"=>$_POST['date_naissance'],
                    "maladies"=>$_POST['maladies']
                  ];
                 $message=addPatient($patient);
            }
          
         
         break;
    default:
        # code...
        break;
   }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - Gestion RV</title>
    <link rel="stylesheet" href="<?php WEBROOT ?>/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a class="navbar-brand" href="<?php WEBROOT ?>/?page=demande">📅 Gestion RV Médicaux</a>
            <ul class="navbar-nav">
             
                <li class="nav-item">
                    <a class="nav-link active" href="<?php WEBROOT ?>/?page=creer-compte">Créer Compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php WEBROOT ?>/?page=demande">Nouvelle RV</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php WEBROOT ?>/?page=liste-drv">Toutes les RV</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php WEBROOT ?>/?page=liste-drv-statut">RV Par Statut</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php WEBROOT ?>/?page=liste-drv-type"> RV Par Type</a>
                </li>
               
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
            <div class="container">
            <?php 
               $pathFile=dirname(__DIR__)."/view/$page.html.php";
               if (!file_exists($pathFile)) {
                  echo "Page Not Found 404";
                   die;
               }else{
                   require_once $pathFile;
               }
            ?>

            </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Gestion RV Médicaux. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
   