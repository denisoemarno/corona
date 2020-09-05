<?php
// membuat fungsi http-request
function http_request($url){
    //persiapan curl
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, $url);

    // aktifkan fungsi transfer nilai berupa string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // setting agar dapat dijalankan dilocalhost
    // memeatikan ssl verify dari Api (https)
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);

    // tampung hasil ke dalam variable $output
    $output = curl_exec($ch);

    // tutup CURL
    curl_close($ch);

    // mengembalikan hasil curl
    return $output;

}
// panggil fungsi http_request
$data = http_request("https://indonesia-covid-19.mathdro.id/api/provinsi/");

//ubah data ke format json
$data = json_decode($data,TRUE);

// echo "<pre>";
//     print_r($data);
// echo "</pre>";
// tampung data
$jumlah = count($data);

$nomor = 1;

for($i = 0; $i < $jumlah; $i++){
    $hasil = $data[$i]['attributes'];

?>
    <tr>
        <td><?=$nomor++?></td>
        <td><?=$hasil['Provinsi']?></td>
        <td><?=$hasil['Kasus_Posi']?></td>
        <td><?=$hasil['Kasus_Semb']?></td>
        <td><?=$hasil['Kasus_Meni']?></td>
    </tr>

<?php
}

?>