<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <title>Crear producto</title>
  </head>
  <body>

    <?php include("../parcials/header.php"); ?>

    <main>
      <form>
        <input type="text" class="form-control" id="name" value="" placeholder="Nombre" >
        <input type="number" class="form-control" id="price" value="" placeholder="Precio">
        <textarea id="description" class="form-control" placeholder="Descripción"></textarea>
        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="save()">Registrar</button>
      </form>
    </main>

    <script type="text/javascript">
      function save() {
        var xhr = new XMLHttpRequest();
        var url = 'http://localhost/mvc/controllers/ProductsController.php';
        xhr.open('POST', url, true);
        var data = new FormData();

        var name = document.querySelector("#name");
        var price = document.querySelector("#price");
        var description = document.querySelector("#description");

        data.append('name', name.value);
        data.append('price', price.value);
        data.append('description', description.value);
        data.append('action', "create");

        xhr.addEventListener('loadend', function() {
          console.log("Petición realizada");
          name.innerHTML = "";
          price.innerHTML = "";
          description.innerHTML = "";
        });
        xhr.send(data);
      }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
