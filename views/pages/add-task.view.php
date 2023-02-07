<?php require "views/_partials/head.view.php";?>

<div class="container">
    <h2>Prideti Nauja uzduoti</h2>
    <form method="post" >
        <div class="form-group">
            <input type="text" name="Title" class="form-control" placeholder="Uzduoties pavadinimas">
        </div>
        <div class="form-group">
            <select name="priority" class="form-control">
                <option value="selected disabled">Pasirinkite prioriteta</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="form-group">
            <label>Atlikimo data:</label>
            <input type="date" name="date" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" name="save">Saugoti</button>
        </div>
    </form>
</div>

<?php require "views/_partials/end.view.php";?>

