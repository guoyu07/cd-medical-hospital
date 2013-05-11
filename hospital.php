<?php
require_once './simplehtmldom_1_5/simple_html_dom.php';

$url = 'http://www.cdcgs.cn/Hospital/HospitalInfo.aspx';
$data = array();

$html = file_get_html($url);
foreach($html->find('tr[align=left]') as $tr) {
	$tds = $tr->find('td');
	$item = array();
	$item['title'] = trim($tds[0]->innertext);
	$item['addr'] = trim($tds[1]->innertext);
	$item['point'] = baidu_point($item['addr']);
	
	echo ",{title:\"{$item['title']}\",content:\"{$item['addr']}\",point:\"{$item['point'][0]}|{$item['point'][1]}\",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}\n";
	
	$data[] = $item;
}

$html->clear();

function baidu_point($addr) {
	$api = 'http://api.map.baidu.com/geocoder/v2/';
	$ak = 'BFc4e09952f556a0a825a7861e171b11';
	$param = array();
	$param['address'] = $addr;
	$param['ak'] = $ak;
	$param['output'] = 'json';
	
	$url = $api.'?'.http_build_query($param);
	//echo $url;
	
	$json = file_get_contents($url);
	$json = json_decode($json);
	
	if($json->status == '0') {
		return array($json->result->location->lng, $json->result->location->lat);
	}
}
?>