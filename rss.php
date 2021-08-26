#!/usr/bin/php5
<?php

$filename='shift/data.csv';
setlocale(LC_ALL,'ja_JP');
$handle = fopen($filename,'r');
$file=file($filename);
fclose($handle);
$count=count($file);

###################################################################################
#
# XML Library, by Keith Devens, version 1.2b
# http://keithdevens.com/software/phpxml
#
# This code is Open Source, released under terms similar to the Artistic License.
# Read the license at http://keithdevens.com/software/license
#
###################################################################################

###################################################################################
# XML_unserialize: takes raw XML as a parameter (a string)
# and returns an equivalent PHP data structure
###################################################################################
function & XML_unserialize(&$xml){
	$xml_parser = &new XML();
	$data = &$xml_parser->parse($xml);
	$xml_parser->destruct();
	return $data;
}
###################################################################################
# XML_serialize: serializes any PHP data structure into XML
# Takes one parameter: the data to serialize. Must be an array.
###################################################################################
function & XML_serialize(&$data, $level = 0, $prior_key = NULL){
	if($level == 0){ ob_start(); echo '<?xml version="1.0" ?>',"\n"; }
	while(list($key, $value) = each($data))
		if(!strpos($key, ' attr')) #if it's not an attribute
			#we don't treat attributes by themselves, so for an empty element
			# that has attributes you still need to set the element to NULL

			if(is_array($value) and array_key_exists(0, $value)){
				XML_serialize($value, $level, $key);
			}else{
				$tag = $prior_key ? $prior_key : $key;
				echo str_repeat("\t", $level),'<',$tag;
				if(array_key_exists("$key attr", $data)){ #if there's an attribute for this element
					while(list($attr_name, $attr_value) = each($data["$key attr"]))
						echo ' ',$attr_name,'="',htmlspecialchars($attr_value),'"';
					reset($data["$key attr"]);
				}

				if(is_null($value)) echo " />\n";
				elseif(!is_array($value)) echo '>',htmlspecialchars($value),"</$tag>\n";
				else echo ">\n",XML_serialize($value, $level+1),str_repeat("\t", $level),"</$tag>\n";
			}
	reset($data);
	if($level == 0){ $str = &ob_get_contents(); ob_end_clean(); return $str; }
}
###################################################################################
# XML class: utility class to be used with PHP's XML handling functions
###################################################################################
class XML{
	var $parser;   #a reference to the XML parser
	var $document; #the entire XML structure built up so far
	var $parent;   #a pointer to the current parent - the parent will be an array
	var $stack;    #a stack of the most recent parent at each nesting level
	var $last_opened_tag; #keeps track of the last tag opened.

	function XML(){
 		$this->parser = &xml_parser_create("UTF-8");
		xml_parser_set_option(&$this->parser, XML_OPTION_CASE_FOLDING, false);
		xml_set_object(&$this->parser, &$this);
		xml_set_element_handler(&$this->parser, 'open','close');
		xml_set_character_data_handler(&$this->parser, 'data');
	}
	function destruct(){ xml_parser_free(&$this->parser); }
	function & parse(&$data){
		$this->document = array();
		$this->stack    = array();
		$this->parent   = &$this->document;
		return xml_parse(&$this->parser, &$data, true) ? $this->document : NULL;
	}
	function open(&$parser, $tag, $attributes){
		$this->data = ''; #stores temporary cdata
		$this->last_opened_tag = $tag;
		if(is_array($this->parent) and array_key_exists($tag,$this->parent)){ #if you've seen this tag before
			if(is_array($this->parent[$tag]) and array_key_exists(0,$this->parent[$tag])){ #if the keys are numeric
				#this is the third or later instance of $tag we've come across
				$key = count_numeric_items($this->parent[$tag]);
			}else{
				#this is the second instance of $tag that we've seen. shift around
				if(array_key_exists("$tag attr",$this->parent)){
					$arr = array('0 attr'=>&$this->parent["$tag attr"], &$this->parent[$tag]);
					unset($this->parent["$tag attr"]);
				}else{
					$arr = array(&$this->parent[$tag]);
				}
				$this->parent[$tag] = &$arr;
				$key = 1;
			}
			$this->parent = &$this->parent[$tag];
		}else{
			$key = $tag;
		}
		if($attributes) $this->parent["$key attr"] = $attributes;
		$this->parent  = &$this->parent[$key];
		$this->stack[] = &$this->parent;
	}
	function data(&$parser, $data){
		if($this->last_opened_tag != NULL) #you don't need to store whitespace in between tags
			$this->data .= $data;
	}
	function close(&$parser, $tag){
		if($this->last_opened_tag == $tag){
			$this->parent = $this->data;
			$this->last_opened_tag = NULL;
		}
		array_pop($this->stack);
		if($this->stack) $this->parent = &$this->stack[count($this->stack)-1];
	}
}
function count_numeric_items(&$array){
	return is_array($array) ? count(array_filter(array_keys($array), 'is_numeric')) : 0;
}
/* ////////////////////////////////////////////////////////////////////////////////////////// */

for($i=0;$i<$count;$i++){
	$data=explode(',',$file[$i]);
	if($data[17]==''){
		echo '';
	}else{
		$blog_url="http://rssblog.ameba.jp/".$data[17]."/rss20.xml";
		$blog_name=$data[1];
		$blog_name=str_replace(' ','',$blog_name);
		if($data[62]==''){
			$blog_photo="../shift/photo/no_photo";
		}else{
			$blog_photo="../shift/".$data[62]."";
		}
		if(@file_get_contents($blog_url)){
			$result=@file_get_contents($blog_url);
		}else{
			$result='failed';
		}
		if($result=='failed'){
			$blog_title='（記事無し）';
			$blog_link="http://ameblo.jp/".$data[17]."/";
			$blog_pub='';
			$blog_des='（まだ書き込みがありません）';
			$blog_sort='19700101000000';
		}else{
			$xml = file_get_contents($blog_url);
			$rssdata = XML_unserialize($xml);
			$blog_title=$rssdata['rss']['channel']['item'][0]['title'];
			$blog_link=$rssdata['rss']['channel']['item'][0]['link'];
			$blog_pub=str_replace(',','',$rssdata['rss']['channel']['item'][0]['pubDate']);
			$blog_des=$rssdata['rss']['channel']['item'][0]['description'];
			$blog_title=mb_substr($blog_title,0,5,'utf-8')."…";
			$blog_des=str_replace(array("\r\n","\r","\n"), '<br />', $blog_des);
			$blog_des=strip_tags($blog_des);
			$blog_des=str_replace('&nbsp;','',$blog_des);
			$blog_des=str_replace(' ','',$blog_des);
			$blog_des=mb_substr($blog_des,0,30,'utf-8')."・・・";
			$blog_date=explode(' ',$blog_pub);
			if($blog_date[2]=='Jan'){$blog_date[2]='01';}
			elseif($blog_date[2]=='Feb'){$blog_date[2]='02';}
			elseif($blog_date[2]=='Mar'){$blog_date[2]='03';}
			elseif($blog_date[2]=='Apr'){$blog_date[2]='04';}
			elseif($blog_date[2]=='May'){$blog_date[2]='05';}
			elseif($blog_date[2]=='Jun'){$blog_date[2]='06';}
			elseif($blog_date[2]=='Jul'){$blog_date[2]='07';}
			elseif($blog_date[2]=='Aug'){$blog_date[2]='08';}
			elseif($blog_date[2]=='Sep'){$blog_date[2]='09';}
			elseif($blog_date[2]=='Oct'){$blog_date[2]='10';}
			elseif($blog_date[2]=='Nov'){$blog_date[2]='11';}
			elseif($blog_date[2]=='Dec'){$blog_date[2]='12';}
		
			$blog_time=explode(':',$blog_date[4]);
			$blog_sort=$blog_date[3].$blog_date[2].$blog_date[1].$blog_time[0].$blog_time[1].$blog_time[2];
		}
		$blog_title=str_replace('\r\n','',$blog_title);
		$line[$i]=array($blog_name,$blog_url,$blog_title,$blog_link,$blog_des,$blog_pub,$blog_sort,$blog_photo);
	}
}

for($j=0;$j<$count;$j++){
	if($j==0){
		$blog_data=array($line[$j]);
	}elseif($j>0){
		array_push($blog_data,$line[$j]);
	}
}
usort($blog_data,"cmp_blog");
$handle = fopen('blog_data.csv' , 'w');
flock($handle , LOCK_EX);
foreach($blog_data as $fields){
	@fputcsv($handle,$fields);
}
fclose($handle);
function cmp_blog($b,$a){
return strcmp($a[6],$b[6]);}
?>