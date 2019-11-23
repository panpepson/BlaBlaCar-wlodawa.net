<?php


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://public-api.blablacar.com/api/v2/trips?fn=Włodawa&tn=Chełm&locale=pl_PL&_format=json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "key: 8xxxxxxxxxxx"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

$g = json_decode($response);

      $p = $g->pager->total;
      if ($p===0){ echo '<p><strong><i class="fa fa-frown-o" style="font-size:28px;color:red"></i> <br/> Brak oferty przejazdu.</strong></p>';}

            $o2 = $g->trips;
            $przejazd = count ($o2);
            $przejazdy = $przejazd-1 ;
$blank="_blank";

for($l=0;$l<=$przejazdy;$l++){
     $link = $o2[$l]->links->_front;
     echo '<a href="'.$link.'" target="'.$blank.'">';
     $start_czas = $o2[$l]->departure_date;
     echo "<b>$start_czas </b>";
     $odjazd=$o2[$l]->departure_place->address;
  //   echo " z: $odjazd ";
     $cel=$o2[$l]->arrival_place->address;
  //   echo "--> Przyjazd: $cel ";
     $cena=$o2[$l]->price->value;
     echo "cena: <b>$cena zł</b>,";
     $miejsce=$o2[$l]->seats_left;
     echo " miejsc <b>$miejsce</b></a><br/>";
   }
    //var_dump ($o2[2]);
 }
//sleep(1);
?>
