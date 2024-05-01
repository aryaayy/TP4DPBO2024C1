<?php
  class MembersView{
    public function render($data){
        $no = 1;
        $dataHeader = "
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>JOINING DATE</th>
            <th>DIVISION</th>
            <th>ACTIONS</th>
        </tr>
        ";
        
        $dataMembers = null;
        foreach($data as $row){
            $dataMembers .= "
            <tr>
                <th>$row[id]</th>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[join_date]</td>
                <td>$row[abbr]</td>
                <td>
                    <a class='btn btn-success' href='edit_members.php?id_edit=$row[id]'>Edit</a>
                    <a class='btn btn-danger' href='index.php?id_hapus=$row[id]'>Delete</a>
                </td>
            </tr>
            ";
        }

        $dataAddLink = "create_members.php";

        $tpl = new Template("templates/table.html");
        $tpl->replace("DATA_HEADER", $dataHeader);
        $tpl->replace("DATA_ADD_LINK", $dataAddLink);
        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->replace("HOME_ACTIVE", "active");
        $tpl->replace("DIVISION_ACTIVE", "");
        $tpl->write();
    }

    public function renderCreate($divisions){
        $dataDivision = null;

        foreach($divisions as $division){
            $dataDivision .= '<option value="'.$division['id'].'">'. $division['abbr'] . ' | ' . $division['name'].'</option>';
        }

        $dataForm = '
        <form action="create_members.php" method="post">
 
          <br><br><div class="card">
          
          <div class="card-header bg-primary">
          <h1 class="text-white text-center">  Create New Member </h1>
          </div><br>

          <label> NAME: </label>
          <input type="text" name="name" class="form-control"> <br>

          <label> EMAIL: </label>
          <input type="text" name="email" class="form-control"> <br>

          <label> PHONE: </label>
          <input type="text" name="phone" class="form-control"> <br>

          <label> DIVISION: </label>
            <select class="form-select" aria-label="Category" id="division" name="division" required>
                <option value="" selected disabled hidden>Pilih</option>
                <option value="null">Tidak ada divisi</option>'.
                $dataDivision.'
            </select> <br>

          <button class="btn btn-success" type="submit" name="create"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

          </div>
        </form>
        ';

        $tpl = new Template("templates/createForm.html");
        $tpl->replace("DATA_FORM", $dataForm);
        $tpl->replace("DATA_ADD_LINK", "create_members.php");
        $tpl->write();
    }

    public function renderEdit($data, $divisions){
        $dataDivision = null;

        foreach($divisions as $division){
            $dataDivision .= '<option value="'.$division['id'].'" '. ($division['id'] == $data['id_division'] ? 'selected' : '') .'>'. $division['abbr'] . ' | ' . $division['name'].'</option>';
        }

        list($id, $name, $email, $phone) = $data;
        $dataForm = '
        <form action="edit_members.php" method="post">
            <br><br><div class="card">
            
            <div class="card-header bg-warning">
                <h1 class="text-white text-center">  Update Member </h1>
            </div><br>

            <input type="hidden" name="id" value="'. $id .'" class="form-control"> <br>

            <label> NAME: </label>
            <input type="text" name="name" value="'. $name .'" class="form-control"> <br>

            <label> EMAIL: </label>
            <input type="text" name="email" value="'. $email .'" class="form-control"> <br>

            <label> PHONE: </label>
            <input type="text" name="phone" value="'. $phone .'" class="form-control"> <br>

            <label> DIVISION: </label>
            <select class="form-select" aria-label="Category" id="division" name="division" required>
                <option value="" selected disabled hidden>Pilih</option>
                <option value="null">Tidak ada divisi</option>'.
                $dataDivision.'
            </select> <br>

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