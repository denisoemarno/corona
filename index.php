<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Pantau Penyebaran Virus Corona-19</title>
  </head>
  <body>
      <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container text-center">
          <h1 class="display-4">CORONA VIRUS</h1>
            <p class="lead">
              <h2>
                  PANTAU PENYEBARAN VIRUS COVID-19 DI DUNIA
                  <br>SECARA REAL-TIME
                  <br>Mari Menjaga Kesehatan Diri dan Keluarga Kita.
              </h2>
            </p>
        </div>
      </div>  

      <style type="text/css">
        .box{
          padding: 30px 40px;
          border-radius: 5px;
        }
      </style>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="bg-danger box text-white">
              <div class="row">
                <div class="col-md-6">
                  <h5>Positif</h5>
                  <h2 id="data-kasus">1234</h2>
                  <h5>Orang</h5>
                </div>
                <div class="col-md-4">
                  <img src="img/sad.svg" style="width: 100px;">
                </div>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="col-md-4">
            <div class="bg-info box text-white">
              <div class="row">
                <div class="col-md-6">
                  <h5>Meninggal</h5>
                  <h2 id="data-mati">1234</h2>
                  <h5>Orang</h5>
                </div>
                <div class="col-md-4">
                  <img src="img/cry.svg" style="width: 100px;">
                </div>
              </div>
            </div>
          </div>
          <!--  -->
          <div class="col-md-4">
            <div class="bg-success box text-white">
              <div class="row">
                <div class="col-md-6">
                  <h5>Sembuh</h5>
                  <h2 id="data-sembuh">1234</h2>
                  <h5>Orang</h5>
                </div>
                <div class="col-md-4">
                  <img src="img/happy.svg" style="width: 100px;">
                </div>
              </div>
            </div>
          </div>
          <!-- api nya untuk  -->
          <!-- <div class="col-md-3">
            <div class="bg-warning box text-white">
              <div class="row">
                <div class="col-md-6">
                  <h5>Rawat</h5>
                  <h2 id="data-rawat">1234</h2>
                  <h5>Orang</h5>
                </div>
                <div class="col-md-4">
                  <img src="img/sick.svg" style="width: 100px;">
                </div>
              </div>
            </div>
          </div> -->
          <!--  -->
          <div class="col-md-12 mt-3">
            <div class="bg-primary box text-white">
              <div class="row">
                <div class="col-md-3">
                  <h2>INDONESIA</h2>
                  <h5 id="data-id">
                    Positif   : 12 Orang  <br>
                    Meninggal : 5 Orang   <br>
                    Sembuh    : 7 Orang   <br>
                  </h5>
                </div>
                <div class="col-md-4">
                  <img src="img/indonesia.svg" style="width: 150px;">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- raw -->
        <!-- <div class="card mt-3">
          <div class="card-header bg-danger text-white">
            <b>Data kasus Corona Di Indonesia Berdasarkan Provinsi</b>
          </div>
          <div class="card-body">
            <table class="table table-bordered mt-3">
              <thead class="thead-dark">
                <tr>
                  <th>No</th>
                  <th>Nama Provinsi</th>
                  <th>Positif</th>
                  <th>Sembuh</th>
                  <th>Meninggal</th>
                </tr>
              </thead>
              <tbody id="table-data">
                
              </tbody>
            </table>
          </div>
        </div> -->
      </div>
      <!--container  -->
      <footer class="bg-primary text-white text-center mt-3 pt-2 pb-2">
        &copy; Copyright 2020 Create By Densu
      </footer>

     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </body>
</html>


    <script>
          $(document).ready(function(){
            // menampilkan semua data global
            semuaData();
            dataNegara();
            dataProvinsi();
            // unutk merefresh otomastis
            setInterval(function(){
              semuaData();
              dataNegara();
              dataProvinsi();
            },3000);

            function semuaData(){
              $.ajax({
                 url : 'https://coronavirus-19-api.herokuapp.com/all',
                 success : function(data){
                    try{
                        var json = data;
                        var kasus = data.cases;
                        var meninggal = data.deaths;
                        var sembuh = data.recovered;
                        var rawat = data.active;

                        $('#data-kasus').html(kasus);
                        $('#data-mati').html(meninggal);
                        $('#data-sembuh').html(sembuh);
                        // $('#data-rawat').html(rawat);


                    }catch{
                      alert('Errorr');
                    }
                 } 
              });
            }

            function dataNegara(){
              $.ajax({
                 url : 'https://coronavirus-19-api.herokuapp.com/countries',
                 success : function(data){
                    try{
                        var json = data;
                        var html = [];

                        if(json.length > 0){
                          var i;
                          for(i = 0; i < json.length; i++){
                            var dataNegara = json[i];
                            var namaNegara = dataNegara.country;

                            if(namaNegara === 'Indonesia'){
                              var kasus = dataNegara.cases;
                              var mati = dataNegara.deaths;
                              var sembuh = dataNegara.recovered;
                              // var dirawat = dataNegara.active;

                              $('#data-id').html('Positif :'+kasus+' Orang <br> Meninggal :' +mati+' Orang <br> Sembuh :' +sembuh+' Orang ');
                              // <br> Rawat :'+dirawat+' Orang
                              // $('#data-rawat').html(rawat);
                            }

                          }
                        }

                    }catch{
                      alert('Errorr');
                    }
                 } 
              });
            }

            function dataProvinsi(){
              $.ajax({
                 url : 'curl.php',
                 type: 'GET',
                 success : function(data){
                    try{
                        
                        $('#table-data').html(data);

                    }catch{
                      alert('Errorr');
                    }
                 } 
              });
            }
          });
    </script>