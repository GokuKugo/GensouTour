<?php
    function All_Gshop()
    {
        $con = Connect();
        $sql = "SELECT * FROM gshop";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
    function All_Newsl()
    {
        $con = Connect();
        $sql = "SELECT * FROM newsletters";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
    function All_Singers()
    {
        $con = Connect();
        $sql = "SELECT * FROM singers";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
    function Selected_Singer($id)
    {
        $con = Connect();
        $sql = "SELECT * FROM singers WHERE id=" . $id;
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
    function All_Tickets()
    {
        $con = Connect();
        $sql = "SELECT * FROM tickets";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
    function Selected_Tickets($id)
    {
        $con = Connect();
        $sql = "SELECT * FROM tickets WHERE id = $id";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
    function Add_Email($value1)
    {
        $con = Connect();
        $sql = "INSERT INTO newsletters (emails)
        VALUES ('$value1')";
        mysqli_query($con, $sql);
        mysqli_close($con);
    }
    function Add_Contact($c1, $c2, $c3, $c4)
    {
        $con = Connect();
        $sql = "INSERT INTO contact (lastname, firstname, contactemail, messages)
        VALUES ('$c1','$c2','$c3','$c4')";
        mysqli_query($con, $sql);
        mysqli_close($con);
    }