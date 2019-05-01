<?php
$kata = "wabbaBwabbaBwabbaBwabbaBwooBwooBwoo"; //string inputan
$len = strlen($kata); //hitung panjang inputan
$huruf = str_split($kata); //pecah inputan menjadi perhuruf dan jadikan array

//ambil huruf unik (jika jumlah huruf sama lebih dari satu ambil satu saja)
//simpan di kamus->$dic[]
$dic = array_unique($huruf);
sort($dic); //urutkan Asceding

//tampilkan input $kata
echo "<b>INPUT: $kata</b>";
echo "<p></p>";
echo "<b>KAMUS:</b><br>";
echo "<table border=1>
    <tr>
        <th>code</th>
        <th>String</th>
    </tr>";
//tampilkan kamus
$m = 0;
foreach($dic as $k) {
    $m++;
echo "<tr>
        <td>$m</td>
        <td>$k</td>
    </tr>";
}
echo "</table>";
echo "<p></p>";

//simpan hasil kompresi di $result
echo "<b>HASIL:</b>";
$result = "";
$s = $huruf[0];
$j = count($dic); //hitung jumlah kata yang ada di kamus
echo "<table border=1>
    <tr>
        <th>s</th>
        <th>c</th>
        <th>output</th>
        <th>code</th>
        <th>string</th>
    </tr>";
//proses kompresi
for($i=0; $i<$len; $i++) {
    $c = @$huruf[$i+1];
    $new = $s.$c;
    //jika $new ada di dalam kamus
    if (in_array($new, $dic)) {
        if($c == NULL) { //jika huruf terakhir
            $nilai = array_keys($dic, $s); //ambil code huruf di dlam kamus
            $output = $nilai[0]+1;
            $result .= $output;
            echo "<tr>
                <td>$s</td>
                <td>EOF</td>
                <td>$output</td>
                <td>-</td>
                <td>-</td>
            </tr>";
        } else {
            echo "<tr>
                <td>$s</td>
                <td>$c</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>";
            $s = $new;
        }
    } else { //jika $new belum ada di kamus
        $j++;
        $nilai = array_keys($dic, $s);
        $output = $nilai[0]+1;
        $result .= $output;
        $code = $j;
        $string = array($new);
        $dic = array_merge($dic, $string); //masukkan $new ke dalam kamus $dic dan berikan kode=$code
        echo "<tr>
            <td>$s</td>
            <td>$c</td>
            <td>$output</td>
            <td>$code</td>
            <td>$new</td>
        </tr>";
        $s = $c;
    }
}
echo "</table>";
echo "<p></p>";

//tampilkan output =$result
echo "Ouput = ".$result."<br>";
?>