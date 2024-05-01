<?php
  class DivisionView{
    public function render($data){
        $no = 1;
        $dataHeader = "
        <tr>
            <th>ID</th>
            <th>DIVISION</th>
            <th>ACTIONS</th>
        </tr>
        ";

        $dataDivision = null;
        foreach($data as $row){
            $dataDivision .= "
            <tr>
                <th>$row[id]</th>
                <td>$row[abbr] | $row[name]</td>
                <td>
                    <a class='btn btn-success' href='edit_division.php?id_edit=$row[id]'>Edit</a>
                    <a class='btn btn-danger' href='division.php?id_hapus=$row[id]'>Delete</a>
                </td>
            </tr>
            ";
        }

        $dataAddLink = "create_division.php";

        $tpl = new Template("templates/table.html");
        $tpl->replace("DATA_HEADER", $dataHeader);
        $tpl->replace("DATA_ADD_LINK", $dataAddLink);
        $tpl->replace("DATA_TABEL", $dataDivision);
        $tpl->replace("HOME_ACTIVE", "");
        $tpl->replace("DIVISION_ACTIVE", "active");
        $tpl->write();
    }

    public function renderCreate(){
        $dataForm = '
        <form action="create_division.php" method="post">
 
          <br><br><div class="card">
          
          <div class="card-header bg-primary">
          <h1 class="text-white text-center">  Create New Division </h1>
          </div><br>

          <label> NAME: </label>
          <input type="text" name="name" class="form-control"> <br>

          <label> ABBREVIATION: </label>
          <input type="text" name="abbr" class="form-control"> <br>

          <button class="btn btn-success" type="submit" name="create"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

          </div>
        </form>
        ';

        $tpl = new Template("templates/createForm.html");
        $tpl->replace("DATA_FORM", $dataForm);
        $tpl->replace("DATA_ADD_LINK", "create_division.php");
        $tpl->write();
    }

    public function renderEdit($data){
        list($id, $name, $abbr) = $data;
        $dataForm = '
        <form action="edit_division.php" method="post">
            <br><br><div class="card">
            
            <div class="card-header bg-warning">
                <h1 class="text-white text-center">  Update Division </h1>
            </div><br>

            <input type="hidden" name="id" value="'. $id .'" class="form-control"> <br>

            <label> NAME: </label>
            <input type="text" name="name" value="'. $name .'" class="form-control"> <br>

            <label> ABBREVIATION: </label>
            <input type="text" name="abbr" value="'. $abbr .'" class="form-control"> <br>

            <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

            </div>
        </form>
        ';

        $tpl = new Template("templates/editForm.html");
        $tpl->replace("DATA_FORM", $dataForm);
        $tpl->write();
    }
  }