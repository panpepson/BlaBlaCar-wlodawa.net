<?php include("header.php");?>
<body id="myPage" onload="odliczanie();">
<div class="preloader"><div>
<i class="ld-spinner ld ld-cycle x2"></i></div></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
  $(window).on('load', function(){
    $('.preloader').delay(500).fadeOut('slow');
  });
</script>
 <main role="main" class="container">
   <div class="col-sm-12 text-center ">
     <div class="blok-i">
        <h4><i class="fa fa-car" style="font-size:48px;"></i>
<br/>.!. Wersja beta 0.3 .!.</h4>
        <br/>
        Automatyczne wyszukiwanie przejazdów z i do Włodawy, które są oferowane na portalu Blablacar.<br/> Wszytko w jednym miejscu. 11.o1.2o19 dodano wyszukiwarkę różnych przejazdów - <strong>testuj </strong> 
      </div>
<br/>
      <h1>
    <b>
        <?php
        //$arrLocale = array( "pl_PL", "polish_pol" );
        $arrLocale = array( 'pl_PL.UTF-8', 'pl','Polish_Poland.28592' );
        setlocale( LC_ALL, $arrLocale );
        echo "Dziś jest: <br>";
        ?>
        <div id="zegar"></div>
   </b>
</h1>

<div class="blok">
  <h2>Włodawa - Warszawa</h2>
  <p><?php include("lwl-waw.php");?></p>
</div>
<div class="blok">
  <h2>Warszawa - Włodawa</h2>
  <p><?php include("waw-lwl.php");?></p>
</div>
<div class="blok">
  <h2>Włodawa - Lublin</h2>
  <p><?php include("lwl-lbl.php");?></p>
</div>
<div class="blok">
  <h2>Lublin - Włodawa</h2>
<p><?php include("lbl-lwl.php");?></p>
</div>
<div class="blok">
  <h2>Włodawa - Chełm</h2>
<p><?php include("lwl-lch.php");?></p>
</div>
<div class="blok">
  <h2>Chełm - Włodawa</h2>
<p><?php include("lch-lwl.php");?></p>
</div>
<div class="blok">
  <h2>Lublin - Warszawa</h2>
<p><?php include("lbl-waw.php");?></p>
</div>
<div class="blok">
  <h2>Warszawa - Lublin</h2>
  <p><?php include("waw-lbl.php");?></p>
</div>

<div class="blok"><div><br/></div>
<div id="app">
<div class="">

<div class="form-group"><label><strong>Z</strong></label>: 
<input v-model="trasa.sk" class="form-control"> <br><label><strong>Do</strong></label>: 
<input v-model="trasa.dk" class="form-control"><br/><button @click="sZukaj" class="btn btn-primary btn-sm fa fa-search"> Szukaj </button></div></div><br/>
<h2>{{ this.trasa.sk }} {{ this.trasa.dk }}</h2><br /><div v-for="ppa in this.trasa.lista"><a :href="ppa.links._front" target="_blank">
<p><strong>{{ ppa.departure_date }}</strong> {{ ppa.departure_place.city_name }}&nbsp;{{ ppa.arrival_place.city_name }}&nbsp;cena 
<b>{{ ppa.price.string_value }}</b>, miejsc: <b>{{ ppa.seats_left}}</b></a></p></div> </div><div class="block"><br/> </div>
<script>new Vue({el:'#app',data:{trasa:{sk:'',dk:'',lista:[],}},methods:{sZukaj()
{let url=`https://public-api.blablacar.com/api/v2/trips?key=28axxxxxxxxxxbf9a&fn=${this.trasa.sk}&tn=${this.trasa.dk}&locale=pl_PL&_format=json`;
axios.get(url).then(response=>{return this.trasa.lista=response.data.trips})}}})</script><div class="blok-i"> 
Jeśli masz pomys jak tę wyszukiwarke ulepszyć - Pisz śmiało na adres <a href="http://trochymiak.net" target="_blank"><i class="fa fa-at">

</i> kontakt</a> - Uwagi mile widziane.</div>
<?php include("stopka.php");?>
