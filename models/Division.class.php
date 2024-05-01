<?php

class Division extends DB
{
    function getDivision()
    {
        $query = "SELECT * FROM division";
        return $this->execute($query);
    }

    function getDivisionById($id)
    {
        $query = "SELECT * FROM division WHERE id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $abbr = $data['abbr'];

        $query = "INSERT INTO division (id, name, abbr) VALUES ('', '$name', '$abbr')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $abbr = $data['abbr'];

        $query = "UPDATE division SET name = '$name', abbr = '$abbr' WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM division WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
