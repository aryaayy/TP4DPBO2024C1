<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }
    
    function getMembersJoin()
    {
        $query = "SELECT members.*, division.abbr  FROM members LEFT JOIN division ON members.id_division=division.id";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        $query = "SELECT * FROM members WHERE id = '$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $division = $data['division'];

        if($division != "null"){
            $query = "INSERT INTO members (id, name, email, phone, id_division) VALUES ('', '$name', '$email', '$phone', '$division')";
        }
        else{
            $query = "INSERT INTO members (id, name, email, phone) VALUES ('', '$name', '$email', '$phone')";
        }

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $division = $data['division'];

        $query = "UPDATE members SET name = '$name', email = '$email', phone = '$phone', id_division = $division WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
