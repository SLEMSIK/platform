<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Главная страница</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="cataloge.php">Каталог</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create_work.php">Создание работы</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assets/constrcut.html">Конструктор</a>
        </li>
        </ul>
        
      <?php 
          if (isset($_COOKIE['user_id'])) {
              echo '
                  <a class="nav-link text-white-50" href="profile.php">
                  '.$_COOKIE['user_name'].'
                  </a>
                  
                  
              ';
            }  else{
              echo '<form class="d-flex" action="login.php">
                <button class="btn btn-light" type="submit">Войти</button>';
            }

          ?>
</form>
      
    </div>
  </div>
</nav>

<style>
  .navbar{
    margin-bottom: 20px;
  }
  .name{
    
    margin: 5px;
    font-size: 20px;
    font-weight: bolder;
  }
</style>
