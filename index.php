<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students</title>
  <link rel="stylesheet" href="app.css">
</head>

<body>
  <?php
  // data
  $students = [
    ['NIM' => '01111021', 'nama' => 'Andi', 'nilai' => 80],
    ['NIM' => '01111022', 'nama' => 'Ani', 'nilai' => 70],
    ['NIM' => '01111023', 'nama' => 'Ari', 'nilai' => 50],
    ['NIM' => '01111024', 'nama' => 'Aji', 'nilai' => 40],
    ['NIM' => '01111025', 'nama' => 'Ali', 'nilai' => 90],
    ['NIM' => '01111026', 'nama' => 'Ai', 'nilai' => 75],
    ['NIM' => '01111027', 'nama' => 'Budi', 'nilai' => 30],
    ['NIM' => '01111028', 'nama' => 'Bani', 'nilai' => 85],
  ];
  // check grade
  $students = array_map(function ($student) {
    if ($student['nilai'] > 85 && $student['nilai'] <= 100) {
      $student['grade'] = "A";
      return $student;
    } elseif ($student['nilai'] > 70 && $student['nilai'] <= 85) {
      $student['grade'] = "B";
      return $student;
    } elseif ($student['nilai'] > 55 && $student['nilai'] <= 70) {
      $student['grade'] = "C";
      return $student;
    } elseif ($student['nilai'] > 40 && $student['nilai'] <= 55) {
      $student['grade'] = "D";
      return $student;
    } elseif ($student['nilai'] >= 0 && $student['nilai'] <= 40) {
      $student['grade'] = "E";
      return $student;
    } else {
      $student['grade'] = false;
      return $student;
    }
  }, $students);
  // check predikat
  $students = array_map(function ($student) {
    switch ($student['grade']) {
      case "A":
        $student['predikat'] = "Sangat Baik";
        return $student;
        break;
      case "B":
        $student['predikat'] = "Baik";
        return $student;
        break;
      case "C":
        $student['predikat'] = "Cukup";
        return $student;
        break;
      case "D":
        $student['predikat'] = "Kurang";
        return $student;
        break;
      case "E":
        $student['predikat'] = "Sangat Kurang";
        return $student;
        break;

      default:
        $student['predikat'] = false;
        return $student;
        break;
    }
  }, $students);
  $bestValue = max(array_column($students, 'nilai'));
  $avgValue = array_sum(array_column($students, 'nilai')) / count($students);
  $badValue = min(array_column($students, 'nilai'));
  $titles = ['No', 'NIM', 'Nama', 'Nilai', 'Grade', 'Predikat'];
  ?>

  <div class="container">
    <h1>Data Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <?php
          foreach ($titles as $key => $title) {
          ?>
            <th><?= $title ?></th>
          <?php
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($students as $key => $student) {
        ?>
          <tr <?php
              if ($student['nilai'] == $bestValue) {
                echo 'class="best"';
              } elseif ($student['nilai'] == $badValue) {
                echo 'class="bad"';
              }
              ?>>
            <td><?= $key + 1 ?></td>
            <td><?= $student['NIM'] ?></td>
            <td><?= $student['nama'] ?></td>
            <td><?= $student['nilai'] ?></td>
            <td><?= $student['grade'] ?></td>
            <td><?= $student['predikat'] ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr style="background: turquoise;">
          <td colspan="3">Nilai Tertinggi</td>
          <td colspan="3"><?= $bestValue ?></td>
        </tr>
        <tr>
          <td colspan="3">Nilai Rata-Rata</td>
          <td colspan="3"><?= $avgValue ?></td>
        </tr>
        <tr style="background: rgb(255, 52, 52);
  color: white;">
          <td colspan="3">Nilai Terendah</td>
          <td colspan="3"><?= $badValue ?></td>
        </tr>
      </tfoot>
    </table>
  </div>

</body>

</html>