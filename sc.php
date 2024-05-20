system("clear");

$k = "[33;1m";
$h = "[32;1m";
$p = "[37;1m";
$m = "[31;1m";
$o = "[30;1m";

echo $p."	
";
echo $p."	          ".$h."Bot Dor XCP XL".$p."        
";
echo $p."	      ".$p."Author: Satria Wibawa  ".$p."   
";
echo $p."	  ".$p."Telegram: t.me/config_geratis".$p." 
";
echo $p."	   ".$p."Website: toolstermux.my.id".$p."   
";
echo $p."	       ".$p."Youtube: ".$k."Inject-ID".$p."       
";
echo $p."	

";

system("xdg-open https://youtube.com/@inject1d?feature=shared");
sleep(1);
$no = readline($p."	 [] Input Number   ".$m.": ".$k);

$ua=array(
	'Host: 23123jggivgd9080979869.netlify.app',
	'sec-ch-ua-mobile: ?1',
	'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36',
	'content-type: application/json',
	'origin: https://23123jggivgd9080979869.netlify.app',
	'sec-fetch-site: same-origin',
	'sec-fetch-mode: cors',
	'sec-fetch-dest: empty',
	'referer: https://23123jggivgd9080979869.netlify.app/'
	
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://23123jggivgd9080979869.netlify.app/api/users/otp");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$data=('{"msisdn":"'.$no.'"}');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$res = curl_exec($ch);
$suc = preg_match("/dikirm/i",$res);
if($suc == "1"){
	echo $p."	
";
	echo $p."	 ".$h."     OTP Success Terkirim!".$p."     
";
	echo $p."	
";
	
}else{
	echo $p."	
";
	echo $p."	 ".$m."      OTP Gagal Terkirim!".$p."      
";
	echo $p."	
";
	exit();
}

$otp = readline($p."	 [] Input Code OTP ".$m.": ".$k);
echo $p."	 ________________________________

";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://23123jggivgd9080979869.netlify.app/api/users/login");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$data=('{"msisdn":"'.$no.'","otp":"'.$otp.'"}');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$res = curl_exec($ch);
$suc = preg_match("/Login Success/i",$res);

if($suc == "1"){
	$json = json_decode($res);
	$tkn = $json->datax->refresh_token;
	
	echo $p."	
";
	echo $p."	 ".$h."         Login Success!".$p."        
";
	echo $p."	
";
	
}else{
	echo $p."	
";
	echo $p."	 ".$m."          Login Gagal!".$p."         
";
	echo $p."	
";
	exit();
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://23123jggivgd9080979869.netlify.app/api/users/buy");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$data=('{"refresh_token":"'.$tkn.'"}');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$res = curl_exec($ch);
$suc = preg_match("/Saldo Tidak Bisa/i",$res);
$cob = preg_match("/Coba Lagi/i",$res);
$bis = preg_match("/SUCCESS/i",$res);
sleep(1);
if($suc == "1"){
	echo $p."	
";
	echo $p."	 ".$m."          Dor Gagal!".$p."           
";
	echo $p."	
";
	
}elseif($cob == "1"){
	echo $p."	
";
	echo $p."	 ".$k."         Ulang Lagi!".$p."           
";
	echo $p."	
";
	exit();
}elseif($bis == "1"){
	echo $p."	
";
	echo $p."	 ".$h."         Dor Success!".$p."          
";
	echo $p."	
";
	exit();
}else{
	echo $p."	
";
	echo $p."	 ".$h."          Dor Gagal!".$p."           
";
	echo $p."	
";
	exit();
}
