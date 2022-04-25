<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Alsanum</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/css/stylelogin.css">
    
    <!-- <script type="text/javascript" src="js/verif.js"></script> -->
</head>

<body>
 
  <form method="post" action="connexion_requete.php">

    <section class="vh-100 gradient-custom">
      
      <div class="container py-5 h-100">
        
        <div class="row d-flex justify-content-center align-items-center h-100">
          
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <img src="img/Logo_OpenEDUC_Moyen.png">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
    
                <div class="mb-md-5 mt-md-4 pb-5">
                
                  <h2 class="fw-bold mb-2 text-uppercase"></h2>
                  <p class="text-white-50 mb-5">Veuillez entrer votre identifiant et votre mot de passe.</p>
    
                  <div class="form-outline form-white mb-4">
                    <input type="email" id="courriel" class="form-control form-control-lg" name="courriel"/>
                    <label class="form-label" for="courriel">Identifiant</label>
                  </div>
    
                  <div class="form-outline form-white mb-4">
                    <input type="password" id="motdepasse" class="form-control form-control-lg" name="motdepasse"/>
                    <label class="form-label" for="motdepasse">Mot de passe</label>
                  </div>
    
                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Mot de passe oublié ?</a></p>
    
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Connexion</button>
    
                 
                </div>
    
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>

</body>

</html>