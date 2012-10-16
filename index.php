<?php


// ------- FUNCTION -------

 function GET_DATA($url)
{ 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2');
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_POST, 0);
 //curl_setopt($ch, CURLOPT_COOKIE, $cookie); 
 curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");
 curl_setopt($ch, CURLOPT_COOKIEFILE,"cookies.txt");
 //echo $cookie;
$rez= curl_exec($ch);
curl_close($ch);
return $rez;
}

 function POST_DATA($_url, $_post)
 {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $_url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ?

 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");
 curl_setopt($ch, CURLOPT_COOKIEFILE,"cookies.txt");
curl_setopt($ch, CURLOPT_POSTFIELDS,$_post);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:6.0.2) Gecko/20100101 Firefox/6.0.2');
$rez = curl_exec($ch);
curl_close($ch);
return $rez;
}

function delTo(&$dest, $to)
{
$pos=strpos($dest,$to);
if($pos === false) return 0;
$dest=substr($dest,$pos);
return 1;
}

function parse_Get(&$dest, $from, $to)
{
 $pos=strpos($dest,$from)+strlen($from);
 $dest=substr($dest,$pos);
 $pos=strpos($dest,$to);
 return substr($dest,0,$pos+strlen($to));
}


function autch() {

$html = GET_DATA('http://ask.fm');

$AutchTok = parse_Get($html, "var AUTH_TOKEN = \"", "\";");
//echo $AutchTok ;


$post = array(
  		'authenticity_token' => "/"+$AutchTok,
			'login' => "zvolodumur",
			'password' => "laserget32",
			'follow' => "",
			'like' => "",
			'back' => "/zvolodumur",
			'authenticity_token' => "/"+$AutchTok
        );
		
$url ='http://ask.fm/session';
POST_DATA($url, $post);

}

function likeact() {
$html = GET_DATA('http://ask.fm/account/wall');

$AutchTok = parse_Get($html, "var AUTH_TOKEN = \"", "\";");
//echo $AutchTok ;

//delTo($html, "questionBox");


 
//while(delTo($html, "questionBox")) 
//for($i=0; $i<3; $i++)
{
delTo($html, "questionBox");

$user = parse_Get($html, "<a href=\"/","\" class");
$is_ur = "/likes/"+$user+"\"/question/";
if(strpos($html,$is_ur)===false) continue;

$url = "http://ask.fm/"+parse_Get($html, "'post', url:'/","'}); };");
print $url+"<br>";
/*
$id = parse_Get($html, "id=\"wall_answer_","\">");
$user = parse_Get($html, "<a href=\"/","\" class");
$url = "http://ask.fm/likes/"+$user+"/question/"+$id+"/add";
$post = array('authenticity_token' => "/"+$AutchTok);
*/
//POST_DATA($url, $post);

}
}

autch();
likeact();


//----PRE DATA------ 



//------ DATA -------

/*
$html=GET_DATA('http://lingualeo.ru/training');
echo $html; 
*/
//delTo($html,'ip_h');
//$ip_h_get=parse_Get($html,'ip_h%1\'','\',');
//echo $html; //'ip_h= '.$ip_h_get;




//$post='email='.$mail.'&pass='.$pass;

	
	


//------ START -----

//$html=GET_DATA('http://vkontakte.ru');
//delTO($html,'<head>');


//http://userapi.com/data?&act=add_wall&id=40852767&ts=376000002&message=1&sid=02c61e9625db6b9edff1b837ec882fe7&back=reqs[462].resultFunc
//http://userapi.com/data?&act=history&wall=376000005&message=816000002&id=40852767&sid=02c61e9625db6b9edff1b837ec882fe7&back=reqs[401].resultFunc
 
?>
