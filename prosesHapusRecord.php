<?php
  include "conn.php";

  $id_kandidat = $_POST['select'];

  echo $id_kandidat;

  $sql = "DELETE FROM kandidat WHERE id_kandidat='$id_kandidat'";

  if ($conn->query($sql) === TRUE) {
    echo "Data sudah di hapus";
    header("location:index.php");
  }
  else {
    echo "Error : " . $conn->error;
  }
  $conn->close();
?>
