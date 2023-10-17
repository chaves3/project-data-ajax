
<?php
//include de conection
include("conexao.php");


//taking data from another table to insert into the database in select
$sql = mysqli_query($conexao, "SELECT id, state FROM estados");

if(isset($_POST['br-states'])){
  
  $br_states = $_POST['br-states'];
    print($br_states);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Desenvolvimento web">
    <meta name="Keywords" content="programação, ti, php, ajax">
    <meta name="author" content="chaves-ti">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Dados com ajax</title>
</head>



<body>
<header>
<nav class="navbar  navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Register</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="pesquisa.html">Teams</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Sector
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">vendas</a></li>
            <li><a class="dropdown-item" href="#">Engenharia</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">T.I</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<div id="block" style="display: none;">
<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg style="height :22px; margin-left:50px;" xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    An example alert with an icon
  </div>
</div>
</div>


<section class="cadastro" style="max-width: 950px; margin:0 auto; margin-top: 130px;" >
<h3 style="font-size: 47px; text-transform: uppercase;">Register your employee</h3>
<br>
<form class="row g-3" method="post">
 
<div class="col-md-4">
    <label for="first-name" class="form-label">First name</label>
    <input type="text" class="form-control" id="first-name" name="nome">
    <small class="erro-name" style="color: red; display: none;">Please write the correct name</small>

  </div>
  
  <div class="col-md-4">
    <label for="last_name" class="form-label">Last name</label>
    <input  type="text" class="form-control" id="last_name" name="last-name">
    <small class="erro-last-name" style="color: red; display: none;">Please write the correct last name</small>
  </div>
 
  <div class="col-md-4">
    <label for="first-email" class="form-label">E-mail</label>
    <div class="input-group">
      <span class="input-group-text" id="first-email">@</span>
      <input type="email" name="email" class="form-control" id="emails" aria-describedby="inputGroupPrepend" >
      <small class="erro-email" style="color: red; display: none;">Please write the correct email</small>
    </div>
  </div>
  
  <div class="col-md-6">
    <label for="citys" class="form-label">City</label>
    <input name="city"  type="text" class="form-control" id="citys" >
    <small class="erro-city" style="color: red; display: none;">Please write the correct city</small>
  </div>
  
  <div class="col-md-3">
    <label for="states" class="form-label">State</label>
    <select name="br-states" class="form-select" id="states">
    <option selected disabled value="">Choose...</option>
     <?php
      //assigning data in select
        while($br_states = mysqli_fetch_array($sql)){
      ?>
      <option value="<?php print $br_states['state']?>"> <?php print $br_states['state']?></option>
      <?php 
        }
      ?>
    </select>
    <small class="erro-state" style="color: red; display: none;">Please write the correct city</small>
  </div>
  
  
  <div class="col-md-3">
    <label for="resgis" class="form-label">Registry</label>
    <input name="register" type="number" class="form-control" id="regis">
    <small class="erro-regis" style="color: red; display: none;">Please write the correct city</small>
  </div>
  
  <div class="col-12">
    <div class="form-check">
      <input name="check" class="form-check-input" type="checkbox" value="right" id="checkcheck">
      <label class="form-check-label">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="col-12">
    <button id="btn-ajax" class="btn btn-dark" type="button" name="btn-send">Send</button>
  </div>
</form>
</section>

<!--files javascript-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/main.js"></script>
</body>
</html>