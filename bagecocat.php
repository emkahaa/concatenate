<?php

class BageConcat
{
    private $countBageConcat = 0;
    private $countBageConcatTwice = 0;
    private $jumlahPerulangan;

    public function __construct($jumlahPerulangan)
    {
        $this->jumlahPerulangan = $jumlahPerulangan;
    }

    public function printOutput()
    {
        for ($number = 1; $this->countBageConcat < $this->jumlahPerulangan; $number++) {
            $output = $number . ' --- ';

            if ($this->countBageConcat >= 2 ) {
                if ($number % 5 === 0) {
                    $output .= 'Bage ';
                }

                if ($number % 3 === 0) {
                    $output .= 'Concat';
                }

            } else {
                if ($number % 3 === 0) {
                    $output .= 'Bage ';
                }
                
                if ($number % 5 === 0) {
                    $output .= 'Concat';
                }
                
            }
            
            if ($number % 3 === 0 && $number % 5 === 0) {
                $this->countBageConcat++;
                $output .= '***';
            }
     
            echo $output . "<br>";

            if ($this->countBageConcat == 5) {
                break;
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlahPerulangan = isset($_POST['jumlah_perulangan']) ? (int) $_POST['jumlah_perulangan'] : 0;

    echo "========================================<br>";
    echo "Hasil Perulangan<br>";
    echo "========================================<br><br>";

    $printer = new BageConcat($jumlahPerulangan);
    $printer->printOutput();

    echo "<br>========================================<br>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Program Perulangan dengan Kriteria</title>
</head>
<body>
    <h1>Program Perulangan dengan Kriteria</h1>

    <form method="POST" action="">
        <label for="jumlah_perulangan">Masukkan jumlah perulangan:</label>
        <input type="number" name="jumlah_perulangan" id="jumlah_perulangan" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
