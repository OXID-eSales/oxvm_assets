<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.8.0
*/function
adminer_errors($zb,$_b){return!!preg_match('~^(Trying to access array offset on value of type null|Undefined array key)~',$_b);}error_reporting(6135);set_error_handler('adminer_errors',2);$Lb=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Lb||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$W){$Ve=filter_input_array(constant("INPUT$W"),FILTER_UNSAFE_RAW);if($Ve)$$W=$Ve;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$f;return$f;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($u){$Bc=substr($u,-1);return
str_replace($Bc.$Bc,$Bc,substr($u,1,-1));}function
escape_string($W){return
substr(q($W),1,-1);}function
number($W){return
preg_replace('~[^0-9]+~','',$W);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Bd,$Lb=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($y,$W)=each($Bd)){foreach($W
as$wc=>$V){unset($Bd[$y][$wc]);if(is_array($V)){$Bd[$y][stripslashes($wc)]=$V;$Bd[]=&$Bd[$y][stripslashes($wc)];}else$Bd[$y][stripslashes($wc)]=($Lb?$V:stripslashes($V));}}}}function
bracket_escape($u,$ua=false){static$Ke=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($ua?array_flip($Ke):$Ke));}function
min_version($ef,$Kc="",$g=null){global$f;if(!$g)$g=$f;$ae=$g->server_info;if($Kc&&preg_match('~([\d.]+)-MariaDB~',$ae,$B)){$ae=$B[1];$ef=$Kc;}return(version_compare($ae,$ef)>=0);}function
charset($f){return(min_version("5.5.3",0,$f)?"utf8mb4":"utf8");}function
script($he,$Je="\n"){return"<script".nonce().">$he</script>$Je";}function
script_src($af){return"<script src='".h($af)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($R){return
str_replace("\0","&#0;",htmlspecialchars($R,ENT_QUOTES,'utf-8'));}function
nl_br($R){return
str_replace("\n","<br>",$R);}function
checkbox($E,$X,$Fa,$zc="",$ed="",$Ia="",$_c=""){$L="<input type='checkbox' name='$E' value='".h($X)."'".($Fa?" checked":"").($_c?" aria-labelledby='$_c'":"").">".($ed?script("qsl('input').onclick = function () { $ed };",""):"");return($zc!=""||$Ia?"<label".($Ia?" class='$Ia'":"").">$L".h($zc)."</label>":$L);}function
optionlist($F,$Vd=null,$cf=false){$L="";foreach($F
as$wc=>$V){$id=array($wc=>$V);if(is_array($V)){$L.='<optgroup label="'.h($wc).'">';$id=$V;}foreach($id
as$y=>$W)$L.='<option'.($cf||is_string($y)?' value="'.h($y).'"':'').(($cf||is_string($y)?(string)$y:$W)===$Vd?' selected':'').'>'.h($W);if(is_array($V))$L.='</optgroup>';}return$L;}function
html_select($E,$F,$X="",$dd=true,$_c=""){if($dd)return"<select name='".h($E)."'".($_c?" aria-labelledby='$_c'":"").">".optionlist($F,$X)."</select>".(is_string($dd)?script("qsl('select').onchange = function () { $dd };",""):"");$L="";foreach($F
as$y=>$W)$L.="<label><input type='radio' name='".h($E)."' value='".h($y)."'".($y==$X?" checked":"").">".h($W)."</label>";return$L;}function
select_input($c,$F,$X="",$dd="",$ud=""){$xe=($F?"select":"input");return"<$xe$c".($F?"><option value=''>$ud".optionlist($F,$X,true)."</select>":" size='10' value='".h($X)."' placeholder='$ud'>").($dd?script("qsl('$xe').onchange = $dd;",""):"");}function
confirm($C="",$Wd="qsl('input')"){return
script("$Wd.onclick = function () { return confirm('".($C?js_escape($C):'Are you sure?')."'); };","");}function
print_fieldset($t,$Dc,$hf=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$Dc</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($hf?"":" class='hidden'").">\n";}function
bold($Aa,$Ia=""){return($Aa?" class='active $Ia'":($Ia?" class='$Ia'":""));}function
odd($L=' class="odd"'){static$s=0;if(!$L)$s=-1;return($s++%2?$L:'');}function
js_escape($R){return
addcslashes($R,"\r\n'\\/");}function
json_row($y,$W=null){static$Mb=true;if($Mb)echo"{";if($y!=""){echo($Mb?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($W!==null?'"'.addcslashes($W,"\r\n\"\\/").'"':'null');$Mb=false;}else{echo"\n}\n";$Mb=true;}}function
ini_bool($pc){$W=ini_get($pc);return(preg_match('~^(on|true|yes)$~i',$W)||(int)$W);}function
sid(){static$L;if($L===null)$L=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$L;}function
set_password($Y,$P,$U,$I){$_SESSION["pwds"][$Y][$P][$U]=($_COOKIE["adminer_key"]&&is_string($I)?array(encrypt_string($I,$_COOKIE["adminer_key"])):$I);}function
get_password(){$L=get_session("pwds");if(is_array($L))$L=($_COOKIE["adminer_key"]?decrypt_string($L[0],$_COOKIE["adminer_key"]):false);return$L;}function
q($R){global$f;return$f->quote($R);}function
get_vals($J,$d=0){global$f;$L=array();$K=$f->query($J);if(is_object($K)){while($M=$K->fetch_row())$L[]=$M[$d];}return$L;}function
get_key_vals($J,$g=null,$de=true){global$f;if(!is_object($g))$g=$f;$L=array();$K=$g->query($J);if(is_object($K)){while($M=$K->fetch_row()){if($de)$L[$M[0]]=$M[1];else$L[]=$M[0];}}return$L;}function
get_rows($J,$g=null,$k="<p class='error'>"){global$f;$Ta=(is_object($g)?$g:$f);$L=array();$K=$Ta->query($J);if(is_object($K)){while($M=$K->fetch_assoc())$L[]=$M;}elseif(!$K&&!is_object($g)&&$k&&defined("PAGE_HEADER"))echo$k.error()."\n";return$L;}function
unique_array($M,$v){foreach($v
as$nc){if(preg_match("~PRIMARY|UNIQUE~",$nc["type"])){$L=array();foreach($nc["columns"]as$y){if(!isset($M[$y]))continue
2;$L[$y]=$M[$y];}return$L;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($y);}function
where($Z,$m=array()){global$f,$x;$L=array();foreach((array)$Z["where"]as$y=>$W){$y=bracket_escape($y,1);$d=escape_key($y);$L[]=$d.($x=="sql"&&is_numeric($W)&&preg_match('~\.~',$W)?" LIKE ".q($W):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$W)):" = ".unconvert_field($m[$y],q($W))));if($x=="sql"&&preg_match('~char|text~',$m[$y]["type"])&&preg_match("~[^ -@]~",$W))$L[]="$d = ".q($W)." COLLATE ".charset($f)."_bin";}foreach((array)$Z["null"]as$y)$L[]=escape_key($y)." IS NULL";return
implode(" AND ",$L);}function
where_check($W,$m=array()){parse_str($W,$Ea);remove_slashes(array(&$Ea));return
where($Ea,$m);}function
where_link($s,$d,$X,$gd="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($d)."&where%5B$s%5D%5Bop%5D=".urlencode(($X!==null?$gd:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($X);}function
convert_fields($e,$m,$O=array()){$L="";foreach($e
as$y=>$W){if($O&&!in_array(idf_escape($y),$O))continue;$oa=convert_field($m[$y]);if($oa)$L.=", $oa AS ".idf_escape($y);}return$L;}function
cookie($E,$X,$Gc=2592000){global$aa;return
header("Set-Cookie: $E=".urlencode($X).($Gc?"; expires=".gmdate("D, d M Y H:i:s",time()+$Gc)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($Ob=false){$bf=ini_bool("session.use_cookies");if(!$bf||$Ob){session_write_close();if($bf&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$W){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$W;}function
auth_url($Y,$P,$U,$h=null){global$nb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($nb))."|username|".($h!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Y!="server"||$P!=""?urlencode($Y)."=".urlencode($P)."&":"")."username=".urlencode($U).($h!=""?"&db=".urlencode($h):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($A,$C=null){if($C!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$C;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($J,$A,$C,$Jd=true,$Db=true,$Gb=false,$Be=""){global$f,$k,$b;if($Db){$le=microtime(true);$Gb=!$f->query($J);$Be=format_time($le);}$je="";if($J)$je=$b->messageQuery($J,$Be,$Gb);if($Gb){$k=error().$je.script("messagesPrint();");return
false;}if($Jd)redirect($A,$C.$je);return
true;}function
queries($J){global$f;static$Ed=array();static$le;if(!$le)$le=microtime(true);if($J===null)return
array(implode("\n",$Ed),format_time($le));$Ed[]=(preg_match('~;$~',$J)?"DELIMITER ;;\n$J;\nDELIMITER ":$J).";";return$f->query($J);}function
apply_queries($J,$we,$Ab='table'){foreach($we
as$S){if(!queries("$J ".$Ab($S)))return
false;}return
true;}function
queries_redirect($A,$C,$Jd){list($Ed,$Be)=queries(null);return
query_redirect($Ed,$A,$C,$Jd,false,!$Jd,$Be);}function
format_time($le){return
sprintf('%.3f s',max(0,microtime(true)-$le));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($od=""){return
substr(preg_replace("~(?<=[?&])($od".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($H,$bb){return" ".($H==$bb?$H+1:'<a href="'.h(remove_from_uri("page").($H?"&page=$H".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($H+1)."</a>");}function
get_file($y,$fb=false){$Jb=$_FILES[$y];if(!$Jb)return
null;foreach($Jb
as$y=>$W)$Jb[$y]=(array)$W;$L='';foreach($Jb["error"]as$y=>$k){if($k)return$k;$E=$Jb["name"][$y];$He=$Jb["tmp_name"][$y];$Ua=file_get_contents($fb&&preg_match('~\.gz$~',$E)?"compress.zlib://$He":$He);if($fb){$le=substr($Ua,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$le,$Kd))$Ua=iconv("utf-16","utf-8",$Ua);elseif($le=="\xEF\xBB\xBF")$Ua=substr($Ua,3);$L.=$Ua."\n\n";}else$L.=$Ua;}return$L;}function
upload_error($k){$Oc=($k==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($k?'Unable to upload a file.'.($Oc?" ".sprintf('Maximum allowed file size is %sB.',$Oc):""):'File does not exist.');}function
repeat_pattern($rd,$Ec){return
str_repeat("$rd{0,65535}",$Ec/65535)."$rd{0,".($Ec%65535)."}";}function
is_utf8($W){return(preg_match('~~u',$W)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$W));}function
shorten_utf8($R,$Ec=80,$re=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Ec).")($)?)u",$R,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Ec).")($)?)",$R,$B);return
h($B[1]).$re.(isset($B[2])?"":"<i>‚Ä¶</i>");}function
format_number($W){return
strtr(number_format($W,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($W){return
preg_replace('~[^a-z0-9_]~i','-',$W);}function
hidden_fields($Bd,$mc=array(),$yd=''){$L=false;foreach($Bd
as$y=>$W){if(!in_array($y,$mc)){if(is_array($W))hidden_fields($W,array(),$y);else{$L=true;echo'<input type="hidden" name="'.h($yd?$yd."[$y]":$y).'" value="'.h($W).'">';}}}return$L;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($S,$Hb=false){$L=table_status($S,$Hb);return($L?$L:array("Name"=>$S));}function
column_foreign_keys($S){global$b;$L=array();foreach($b->foreignKeys($S)as$Sb){foreach($Sb["source"]as$W)$L[$W][]=$Sb;}return$L;}function
enum_input($Oe,$c,$l,$X,$wb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Lc);$L=($wb!==null?"<label><input type='$Oe'$c value='$wb'".((is_array($X)?in_array($wb,$X):$X===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Lc[1]as$s=>$W){$W=stripcslashes(str_replace("''","'",$W));$Fa=(is_int($X)?$X==$s+1:(is_array($X)?in_array($s+1,$X):$X===$W));$L.=" <label><input type='$Oe'$c value='".($s+1)."'".($Fa?' checked':'').'>'.h($b->editVal($W,$l)).'</label>';}return$L;}function
input($l,$X,$q){global$Qe,$b,$x;$E=h(bracket_escape($l["field"]));echo"<td class='function'>";if(is_array($X)&&!$q){$na=array($X);if(version_compare(PHP_VERSION,5.4)>=0)$na[]=JSON_PRETTY_PRINT;$X=call_user_func_array('json_encode',$na);$q="json";}$Nd=($x=="mssql"&&$l["auto_increment"]);if($Nd&&!$_POST["save"])$q=null;$Wb=(isset($_GET["select"])||$Nd?array("orig"=>'original'):array())+$b->editFunctions($l);$c=" name='fields[$E]'";if($l["type"]=="enum")echo
h($Wb[""])."<td>".$b->editInput($_GET["edit"],$l,$c,$X);else{$cc=(in_array($q,$Wb)||isset($Wb[$q]));echo(count($Wb)>1?"<select name='function[$E]'>".optionlist($Wb,$q===null||$cc?$q:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Wb))).'<td>';$rc=$b->editInput($_GET["edit"],$l,$c,$X);if($rc!="")echo$rc;elseif(preg_match('~bool~',$l["type"]))echo"<input type='hidden'$c value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?" checked='checked'":"")."$c value='1'>";elseif($l["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Lc);foreach($Lc[1]as$s=>$W){$W=stripcslashes(str_replace("''","'",$W));$Fa=(is_int($X)?($X>>$s)&1:in_array($W,explode(",",$X),true));echo" <label><input type='checkbox' name='fields[$E][$s]' value='".(1<<$s)."'".($Fa?' checked':'').">".h($b->editVal($W,$l)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$E'>";elseif(($ze=preg_match('~text|lob|memo~i',$l["type"]))||preg_match("~\n~",$X)){if($ze&&$x!="sqlite")$c.=" cols='50' rows='12'";else{$N=min(12,substr_count($X,"\n")+1);$c.=" cols='30' rows='$N'".($N==1?" style='height: 1.2em;'":"");}echo"<textarea$c>".h($X).'</textarea>';}elseif($q=="json"||preg_match('~^jsonb?$~',$l["type"]))echo"<textarea$c cols='50' rows='12' class='jush-js'>".h($X).'</textarea>';else{$Qc=(!preg_match('~int~',$l["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$l["length"],$B)?((preg_match("~binary~",$l["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$l["unsigned"]?1:0)):($Qe[$l["type"]]?$Qe[$l["type"]]+($l["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$l["type"]))$Qc+=7;echo"<input".((!$cc||$q==="")&&preg_match('~(?<!o)int(?!er)~',$l["type"])&&!preg_match('~\[\]~',$l["full_type"])?" type='number'":"")." value='".h($X)."'".($Qc?" data-maxlength='$Qc'":"").(preg_match('~char|binary~',$l["type"])&&$Qc>20?" size='40'":"")."$c>";}echo$b->editHint($_GET["edit"],$l,$X);$Mb=0;foreach($Wb
as$y=>$W){if($y===""||!$W)break;$Mb++;}if($Mb)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Mb), oninput: function () { this.onchange(); }});");}}function
process_input($l){global$b,$i;$u=bracket_escape($l["field"]);$q=$_POST["function"][$u];$X=$_POST["fields"][$u];if($l["type"]=="enum"){if($X==-1)return
false;if($X=="")return"NULL";return+$X;}if($l["auto_increment"]&&$X=="")return
null;if($q=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$l["on_update"])?idf_escape($l["field"]):false);if($q=="NULL")return"NULL";if($l["type"]=="set")return
array_sum((array)$X);if($q=="json"){$q="";$X=json_decode($X,true);if(!is_array($X))return
false;return$X;}if(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads")){$Jb=get_file("fields-$u");if(!is_string($Jb))return
false;return$i->quoteBinary($Jb);}return$b->processInput($l,$X,$q);}function
fields_from_edit(){global$i;$L=array();foreach((array)$_POST["field_keys"]as$y=>$W){if($W!=""){$W=bracket_escape($W);$_POST["function"][$W]=$_POST["field_funs"][$y];$_POST["fields"][$W]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$W){$E=bracket_escape($y,1);$L[$E]=array("field"=>$E,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$i->primary),);}return$L;}function
search_tables(){global$b,$f;$_GET["where"][0]["val"]=$_POST["query"];$Yd="<ul>\n";foreach(table_status('',true)as$S=>$T){$E=$b->tableName($T);if(isset($T["Engine"])&&$E!=""&&(!$_POST["tables"]||in_array($S,$_POST["tables"]))){$K=$f->query("SELECT".limit("1 FROM ".table($S)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($S),array())),1));if(!$K||$K->fetch_row()){$_d="<a href='".h(ME."select=".urlencode($S)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$E</a>";echo"$Yd<li>".($K?$_d:"<p class='error'>$_d: ".error())."\n";$Yd="";}}}echo($Yd?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($kc,$Tc=false){global$b;$L=$b->dumpHeaders($kc,$Tc);$ld=$_POST["output"];if($ld!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($kc).".$L".($ld!="file"&&preg_match('~^[0-9a-z]+$~',$ld)?".$ld":""));session_write_close();ob_flush();flush();return$L;}function
dump_csv($M){foreach($M
as$y=>$W){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$W)||$W==="")$M[$y]='"'.str_replace('"','""',$W).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$M)."\r\n";}function
apply_sql_function($q,$d){return($q?($q=="unixepoch"?"DATETIME($d, '$q')":($q=="count distinct"?"COUNT(DISTINCT ":strtoupper("$q("))."$d)"):$d);}function
get_temp_dir(){$L=ini_get("upload_tmp_dir");if(!$L){if(function_exists('sys_get_temp_dir'))$L=sys_get_temp_dir();else{$n=@tempnam("","");if(!$n)return
false;$L=dirname($n);unlink($n);}}return$L;}function
file_open_lock($n){$p=@fopen($n,"r+");if(!$p){$p=@fopen($n,"w");if(!$p)return;chmod($n,0660);}flock($p,LOCK_EX);return$p;}function
file_write_unlock($p,$cb){rewind($p);fwrite($p,$cb);ftruncate($p,strlen($cb));flock($p,LOCK_UN);fclose($p);}function
password_file($Wa){$n=get_temp_dir()."/adminer.key";$L=@file_get_contents($n);if($L||!$Wa)return$L;$p=@fopen($n,"w");if($p){chmod($n,0660);$L=rand_string();fwrite($p,$L);fclose($p);}return$L;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($W,$_,$l,$_e){global$b;if(is_array($W)){$L="";foreach($W
as$wc=>$V)$L.="<tr>".($W!=array_values($W)?"<th>".h($wc):"")."<td>".select_value($V,$_,$l,$_e);return"<table cellspacing='0'>$L</table>";}if(!$_)$_=$b->selectLink($W,$l);if($_===null){if(is_mail($W))$_="mailto:$W";if(is_url($W))$_=$W;}$L=$b->editVal($W,$l);if($L!==null){if(!is_utf8($L))$L="\0";elseif($_e!=""&&is_shortable($l))$L=shorten_utf8($L,max(0,+$_e));else$L=h($L);}return$b->selectVal($L,$_,$l,$W);}function
is_mail($tb){$pa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$mb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$rd="$pa+(\\.$pa+)*@($mb?\\.)+$mb";return
is_string($tb)&&preg_match("(^$rd(,\\s*$rd)*\$)i",$tb);}function
is_url($R){$mb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($mb?\\.)+$mb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$R);}function
is_shortable($l){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$l["type"]);}function
count_rows($S,$Z,$w,$r){global$x;$J=" FROM ".table($S).($Z?" WHERE ".implode(" AND ",$Z):"");return($w&&($x=="sql"||count($r)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$r).")$J":"SELECT COUNT(*)".($w?" FROM (SELECT 1$J GROUP BY ".implode(", ",$r).") x":$J));}function
slow_query($J){global$b,$Ie,$i;$h=$b->database();$Ce=$b->queryTimeout();$fe=$i->slowQuery($J,$Ce);if(!$fe&&support("kill")&&is_object($g=connect())&&($h==""||$g->select_db($h))){$yc=$g->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$yc,'&token=',$Ie,'\');
}, ',1000*$Ce,');
</script>
';}else$g=null;ob_flush();flush();$L=@get_key_vals(($fe?$fe:$J),$g,false);if($g){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$L;}function
get_token(){$Hd=rand(1,1e6);return($Hd^$_SESSION["token"]).":$Hd";}function
verify_token(){list($Ie,$Hd)=explode(":",$_POST["token"]);return($Hd^$_SESSION["token"])==$Ie;}function
lzw_decompress($za){$kb=256;$_a=8;$Ka=array();$Od=0;$Pd=0;for($s=0;$s<strlen($za);$s++){$Od=($Od<<8)+ord($za[$s]);$Pd+=8;if($Pd>=$_a){$Pd-=$_a;$Ka[]=$Od>>$Pd;$Od&=(1<<$Pd)-1;$kb++;if($kb>>$_a)$_a++;}}$jb=range("\0","\xFF");$L="";foreach($Ka
as$s=>$Ja){$sb=$jb[$Ja];if(!isset($sb))$sb=$lf.$lf[0];$L.=$sb;if($s)$jb[]=$lf.$sb[0];$lf=$sb;}return$L;}function
on_help($Pa,$ee=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $Pa, $ee) }, onmouseout: helpMouseout});","");}function
edit_form($S,$m,$M,$Ye){global$b,$x,$Ie,$k;$ve=$b->tableName(table_status1($S,true));page_header(($Ye?'Edit':'Insert'),$k,array("select"=>array($S,$ve)),$ve);$b->editRowPrint($S,$m,$M,$Ye);if($M===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$m)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($m
as$E=>$l){echo"<tr><th>".$b->fieldName($l);$gb=$_GET["set"][bracket_escape($E)];if($gb===null){$gb=$l["default"];if($l["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$gb,$Kd))$gb=$Kd[1];}$X=($M!==null?($M[$E]!=""&&$x=="sql"&&preg_match("~enum|set~",$l["type"])?(is_array($M[$E])?array_sum($M[$E]):+$M[$E]):(is_bool($M[$E])?+$M[$E]:$M[$E])):(!$Ye&&$l["auto_increment"]?"":(isset($_GET["select"])?false:$gb)));if(!$_POST["save"]&&is_string($X))$X=$b->editVal($X,$l);$q=($_POST["save"]?(string)$_POST["function"][$E]:($Ye&&preg_match('~^CURRENT_TIMESTAMP~i',$l["on_update"])?"now":($X===false?null:($X!==null?'':'NULL'))));if(!$_POST&&!$Ye&&$X==$l["default"]&&preg_match('~^[\w.]+\(~',$X))$q="SQL";if(preg_match("~time~",$l["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$X)){$X="";$q="now";}input($l,$X,$q);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($m){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Ye?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Ye?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."‚Ä¶', this); };"):"");}}echo($Ye?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$m?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$Ie,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0Ñ\0\n @\0¥CÑË\"\0`E„Q∏‡ˇá?¿tvM'îJd¡d\\åb0\0ƒ\"ô¿f”à§Ós5õœÁ—AùXPaJì0Ñ•ë8Ñ#RäT©ëz`à#.©«cÌX√˛»Ä?¿-\0°Im?†.´M∂Ä\0»Ø(Ãâ˝¿/(%å\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1ÃáìŸåﬁl7úáB1Ñ4vb0òÕfsëºÍn2BÃ—±Ÿòﬁn:á#(ºb.\rDc)»»a7EÑë§¬l¶√±îËi1Ãésò¥Á-4ôáf”	»Œi7Ü≥π§»t4Ö¶”yËZf4ù∞iñAT´VVêÈf:œ¶,:1¶Q›ºÒb2`«#˛>:7GÔó1—ÿ“s∞ôLóXD*bv<‹å#£e@÷:4Áß!foê∑∆t:<•‹Âíæôo‚‹\ni√≈',Èªa_§:πiÔÖ¥¡Bv¯|N˚4.5NfÅi¢vp–h∏∞l®Í°÷ö‹O¶ÅâÓ= £OFQ–ƒk\$•”iıô¿¬d2T„°p‡ 6Ñã˛á°-ÿZÄéÉ†ﬁ6Ω£Äh:¨aÃ,é£ÎÓ2ç#8–ê±#íò6n‚ÓÜÒJà¢h´tÖå±ä‰4O42ÙΩokﬁæ*r†©Ä@p@Ü!ƒæœ√Ù˛?–6¿âr[çL¡ã:2Bàjß!HbÛ√P‰=!1Vâ\"à≤0Öø\nS∆∆œD7√ÏD⁄õ√C!Ü!õ‡¶G åß »+í=tCÊ©.C§¿:+» =™™∫≤°±Â%™cÌ1MR/îE»í4Ñ©†2∞‰±†„`¬8(·”π[W‰—=âySÅb∞=÷-‹πBS+…Ø»‹˝•¯@pL4Yd„Ñqä¯„¶Í¢6£3ƒ¨Ø∏Ac‹åËŒ®åkÇ[&>ˆï®Z¡pkm]óu-c:ÿ∏àNtÊŒ¥p“ùåä8Ë=ø#ò·[.‹ﬁØç~†çÅmÀyáPP·|I÷õ˘¿ÏQ™9v[ñQïÑ\nñŸrÙ'gá+ê·T—2Ö≠V¡ız‰4ç£8˜è(	æEy*#j¨2]≠ïR“¡ë•)É¿[N≠R\$ä<>:Û≠>\$;ñ>†Ã\rªÑŒHÕ√T»\nw°N Âwÿ£¶Ï<ÔÀGw‡ˆˆπ\\YÛ_†Rt^å>é\r}åŸS\rzÈ4=µ\nLî%J„ã\",Z†8∏ûôêi˜0u©?®˚—Ù°s3#®Ÿâ†:Û¶˚ç„Ωñ»ﬁE]x›“Ås^8é£K^…˜*0—ﬁwﬁ‡»ﬁ~è„ˆ:Ì—iÿ˛èv2wΩˇ±˚^7ê„Ú7£c›—u+U%é{P‹*4ÃºÈLX./!ºâ1C≈ﬂqx!Hπ„Fd˘≠L®§®ƒ†œ`6ÎË5ÆôfÄ∏ƒÜ®=H¯l åV1ìõ\0a2◊;Å‘6Ü‡ˆ˛_Ÿáƒ\0&ÙZ‹S†d)KE'íÄnµê[X©≥\0Z…ä‘F[Pëﬁò@‡ﬂ!âÒY¬,`…\"⁄∑Å¬0Ee9yF>À‘9b∫ñåÊF5:¸àî\0}ƒ¥äá(\$û”áÎÄ37Hˆ£Ë MæA∞≤6Rï˙{Mq›7G†⁄CôCÍm2¢(åCt>[Ï-t¿/&Cõ]ÍetGÙÃ¨4@r>«¬Â<öSqï/Â˙îQÎçhmçö¿–∆Ù„ÙùL¿‹#ËÙKÀ|ÆôÑ6fKP›\r%t‘”V=\"†SH\$ù} ∏Å)w°,W\0F≥™u@ÿb¶9Ç\rr∞2√#¨DåîXÉ≥⁄yOI˘>ªÖnÅÜ«¢%„˘ê'ã›_¡Ät\rœÑzƒ\\1òhlº]Q5Mp6kÜ–ƒqh√\$£H~Õ|“›!*4åÒÚ€`SÎ˝≤S tÌPP\\g±Ë7á\n-ä:Ë¢™p¥ïîàlãBû¶Óî7”®cÉ(wO0\\:ï–wî¡ùp4àìÚ{T⁄˙jO§6H√ä∂r’•êq\n¶…%%∂y']\$ÇîaëZ”.fc’q*-ÍFW∫˙kçÑzÉ∞µjëé∞lg·å:á\$\"ﬁNº\r#…d‚√Ç¬ˇ–sc·¨Ã†ÑÉ\"j™\r¿∂ñ¶à’íºPhã1/ÇúDA)†≤›[¿kn¡p76¡Y¥âR{·M§P˚∞Ú@\n-∏a∑6˛ﬂ[ªzJH,ñdl†B£hêo≥çÏÚ¨+á#Dr^µ^µŸeöºEΩΩñ ƒúaPâÙıJG£z‡ÒtÒ†2«XŸ¢¥¡øV∂◊ﬂ‡ﬁ»≥â—B_%K=E©∏bÂºæﬂ¬ßkU(.!‹Æ8∏ú¸…I.@éKÕxn˛¨¸:√PÛ32´îmÌH		C*Ï:v‚T≈\nRπÉïµã0u¬ÌÉÊÓ“ß]ŒØòäîP/µJQd•{Lñﬁ≥:Y¡è2bºúT Òù 3”4Üó‰cÍ•V=êøÜL4Œ–rƒ!ﬂBY≥6Õ≠MeLä™‹Áúˆ˘i¿o–9< Gî§∆ï–ôMhm^ØU€N¿å∑ÚTr5HiMî/¨nÉÌù≥T†ç[-<__Ó3/Xr(<áØäÜÆ…ÙìÃu“ñGNX20Â\r\$^áç:'9Ë∂OÖÌ;◊kèºÜµf†ñN'a∂î«≠b≈,ÀV§ÙÖ´1µÔHI!%6@˙œ\$“EG⁄ú¨1ù(mU™ÂÖr’ΩÔﬂÂ`°–iN+√úÒ)öú‰0lÿ“f0√Ω[U‚¯V Ë-:I^†ò\$ÿs´b\reáëug…h™~9€ﬂàùbòµÙ¬»f‰+0¨‘ hXr›¨©!\$óe,±w+Ñ˜åÎå3ÜÃ_‚AÖkö˘\nk√rı õcuWdYˇ\\◊={.Ûƒçòê¢gªâp8út\rRZøvçJ:≤>˛£Y|+≈@¿áÉ€Cêt\rÄÅjtÅΩ6≤%¬?‡Ù«éÒí>˘/•Õ«Œ9F`◊ï‰Úv~K§ê·ˆ—R–WãzëÍlm™wL«9Yï*q¨xƒzÒËSeÆ›õ≥Ë˜£~öD‡Õ·ñ˜ùxòæÎ…üi7ï2ƒ¯—O›ªí˚_{Ò˙53‚˙têòõ_üız‘3˘d)ãCØ¬\$?K”™PÅ%œœT&˛ò&\0P◊NAé^≠~¢É†p∆ ˆœúì‘ı\r\$ﬁÔ–÷Ïb*+D6Í∂¶œàﬁÌJ\$(»olﬁÕh&îÏKBS>∏ãˆ;z∂¶x≈oz>Ìú⁄oƒZ\n ã[œvıÇÀ»úµ∞2ıOxŸêV¯0f˚Ä˙Øﬁ2Bl…bk–6ZkµhXcdÍ0*¬KT‚ØH=≠ïœÄëp0älVÈıË‚\rºå•ném¶Ô)(è ˙");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:õågCIº‹\n8ú≈3)∞À7úÖÜ81– x:\nOg#)–Ír7\n\"ÜË¥`¯|2ÃgSiñH)N¶Së‰ß\ráù\"0πƒ@‰)ü`(\$s6O!”ËúV/=ùå' T4Ê=ÑòiSòç6IO†G#“X∑VCç∆s°†Z1.–hp8,≥[¶H‰µ~Czß…Â2πlæc3öÕÈs£ëŸIÜb‚4\nÈF8T‡ÜIò›©U*fzπ‰r0ûE∆Å¿ÿyé∏ÒféY.:ÊÉIå (ÿc∑·Œã!ç_lôÌ^∑^(∂öN{Sñì)rÀq¡YìñlŸ¶3ä3⁄\nò+G•”Íy∫ÌÜÀi∂¬ÓxV3w≥uh„^rÿ¿∫¥a€î˙πçcÿË\rì®Î(.¬à∫ÅCh“<\r)Ë—£°`Ê7£ÌÚ43'm5å£»\nÅP‹:2£Pª™éãq Úˇ≈Cì}ƒ´à˙ ¡Í38ãBÿ0éhRâ»r(ú0•°b\\0åHr44å¡Bç!°p«\$érZZÀ2‹â.…É(\\é5√|\nC(Œ\"èÄPÖ¯.ç–NÃRT Œì¿Ê>ÅHNÖÅ8HP·\\¨7Jp~Ñ‹˚2%°–OC®1„.ÉßC8ŒáH»Ú*àj∞Ö·˜S(π/°Ï¨6KUú á°<2âpOIÑÙ’`ç‘‰‚≥àdOÅH†ﬁ5ç-¸∆4å„pX25-“¢Ú€à∞z7£∏\"(∞P†\\32:]U⁄ËÌ‚ﬂÖ!]∏<∑A€€§í–ﬂi⁄∞ãl\r‘\0v≤Œ#J8´œwmûÌ…§®<ä…†Ê¸%m;p#„`XùDå¯˜iZç¯N0åêï»9¯®Âç†¡Ë`ÖéwJçDøæ2“9tå¢*¯ŒyÏÀNiIh\\9∆’Ë–:ÉÄÊ·xÔ≠µyl*ö»àŒÊY†‹á¯Í8íW≥‚?µéÅﬁõ3Ÿ !\"6Âõn[¨ \r≠*\$∂∆ßænzx∆9\rÏ|*3◊£pﬁÔª∂û:(p\\;‘Àmz¢¸ß9Û–—¬å¸8NÖ¡êj2çΩ´Œ\r…HÓH&å≤(√zÑ¡7i€k£ ãä§Çc§ãeÚû˝ßtúÃÃ2:SHÛ»†√/)ñxﬁ@ÈÂtâri9•ΩıÎú8œ¿ÀÔy“∑Ω∞éVƒ+^W⁄¶≠¨kZÊYól∑ £ÅÅå4÷»∆ã™∂¿¨Ç\\E»{Ó7\0πpÜÄïDÄÑiî-TÊ˛⁄˚0l∞%=¡†–ÀÉ9(Ñ5\n\nÄn,4á\0Ëa}‹É.∞ˆRsÔÇ™\02B\\€b1üS±\0003,‘XPHJspÂdìKÉ CA!∞2*Wü‘Ò⁄2\$‰+¬f^\nÑ1åÅ¥ÚzEÉ Iv§\\‰ú2…†.*A∞ôîE(d±·∞√bÍ¬‹Ñê∆9áÇ‚Ä¡Dhê&≠™?ƒH∞sèQò2íx~n√ÅJãT2˘&„‡eRúΩôG“QéêTwÍ›ëªıPà‚„\\†)6¶Ù‚ú¬Úsh\\3®\0R	¿'\r+*;RH‡.ì!—[Õ'~≠%t< Áp‹K#¬ëÊ!ÒlﬂÃLeå≥úŸ,ƒ¿Æ&·\$	¡Ω`îñCXöâ”Ü0÷≠Âº˚≥ƒ:MÈh	Á⁄úG‰—!&3†DÅ<!Ëê23Ñ√?h§J©e ⁄h·\r°mïòNi∏£¥éíÜ NÿHl7°ÆvÇÍWIÂ.¥¡-”5÷ßeyè\rEJ\ni*º\$@⁄RU0,\$UøEÜ¶‘‘¬™u)@(tŒSJk·p!Ä~≠Ç‡d`Ã>Øï\n√;#\rp9Üj…π‹]&Nc(rÄàïTQU™ΩS∑⁄\08n`´óyïb§≈ûL‹O5ÇÓ,§Úûë>éÇÜx‚‚±f‰¥í‚ÿê+Åñ\"—IÄ{kM»[\r%∆[	§eÙa‘1! ËˇÌ≥‘Æ©F@´b)Rü£72àÓ0°\nW®ô±L≤‹ú“Ætd’+ÅÌ‹0wgl¯0n@ÚÍ…¢’iÌM´É\nAßM5nÏ\$E≥◊±N€·l©›ü◊Ï%™1 A‹˚∫˙˜›kÒrÓiFB˜œ˘ol,muNx-Õ_†÷§C( ÅêfÈl\r1p[9x(i¥B“ñ≤€zQl¸∫8C‘	¥©XU Tb£›I›`ïp+V\0Óã—;ãCbŒ¿XÒ+œíçsÔ¸]H˜“[·kãx¨G*ÙÜè]∑awn˙!≈6ÇÚ‚€–mSÌæìIﬁÕKÀ~/ù”•7ﬁ˘eeN…Úç™S´/;dÂAÜ>}l~ûœÍ ®%^¥fÁÿ¢p⁄úDEÓ√a∑Çt\nx=√k–éÑ*d∫ÍTó∫¸˚j2ü…júù\në†… ,òe=ëÜM84Ù˚‘aïj@ÓT√sè‘‰nf©›\nÓ6™\rdúº0ﬁÌÙYä'%‘ìÌﬁ~	Å“®Ü<÷ÀñAÓãñHøGÇÅ8ÒøùŒÉ\$z´{∂ª≤u2*Ü‡añ¿>ª(wåK.bPÇ{ÖÉo˝î¬¥´zµ#Î2ˆ8=…8>™§≥A,∞e∞¿Ö+ÏCËßxı*√·“-b=máôü,ãaí√lzkùÅÔ\$Wı,êmèJiÊ ß·˜Å+ãË˝0∞[Øˇ.R sK˘«‰XÁ›ZLÀÁ2ê`Ã(ÔC‡vZ°‹›¿∂Ë\$Å◊π,ÂD?H±÷NxXÙÛ)íÓéM®â\$Û,çÕ*\n—£\$<qˇ≈üh!øπSì‚É¿üxsA!ò:¥K•¡}¡≤ì˘¨£úR˛öA2k∑Xép\n<˜˛¶˝ÎlÏßŸ3Ø¯¶»ïVV¨}£g&Y›ç!Ü+Û;<∏Y«ÛüYE3r≥ŸéÒõCÌo5¶≈˘¢’≥œkk˛Ö¯∞÷€£´œt˜íU¯Ö≠)˚[˝ﬂ¡Ó}Ôÿu¥´lÁ¢:Dü¯+œè _o„‰h140÷· 0¯Øb‰Kò„¨í†ˆ˛ÈªlG™Ñ#™ö©ÍéÜ¶©Ï|UdÊ∂IK´Í¬7‡^Ï‡∏@∫ÆO\0H≈Hiä6\rá€©‹\\cg\0ˆ„Î2éBƒ*e‡ê\nÄö	Özrê!ênWz&ê {Hñ'\$X †w@“8ÎDGr*Îƒ›HÂ'p#éƒÆÄ¶‘\nd¸Ä˜,Ù•ó,¸;g~Ø\0–#ÄÃé≤Eè¬\r÷I`úÓ'É%E“.†]` –õÖÓ%&–Óm∞˝\r‚ﬁ%4SÑv#\n†ûfH\$%Î-¬#≠∆—qB‚ÌÊ†¿¬Q-Ùc2äßÇ&¬¿Ã]‡ô Ëqh\rÒl]‡Æs†–—h‰7±n#±ÇÇ⁄-‡jEØFrÁ§l&d¿ÿŸÂzÏF6∏êà¡\"†ûì|øß¢s@ﬂ±ÆÂz)0rp⁄è\0ÇX\0§ŸË|DL<!∞ÙoÑ*áD∂{.B<E™ãã0nB(Ô é|\r\nÏ^©ç‡ç h≥!Ç÷Ír\$ßí(^™~èËﬁ¬/pèq≤ÃB®≈Oöà˙,\\µ®#RRŒè%Î‰Õd–Hjƒ`¬†ÙÆÃ≠ VÂ bSídßiéEÇ¯Ôoh¥r<i/k\$-ü\$oîº+∆≈ãŒ˙l“ﬁO≥&ev∆íºi“jMPA'u'éŒí( M(h/+´ÚWDæSo∑.n∑.n∏ÏÍ(ú(\"≠¿ßhˆ&pÜ®/À/1DÃäÁjÂ®∏EËﬁ&‚¶Äè,'l\$/.,ƒd®ÖÇWÄbbO3ÛB≥sH†:J`!ì.Ä™Çá¿˚•†è,F¿—7(á»‘ø≥˚1älÂs ÷“éë≤ó≈¢q¢X\r¿öÆÉ~RÈ∞±`Æ“ûÛÆY*‰:R®˘rJ¥∑%Lœ+n∏\"à¯\r¶ŒÕáH!qbæ2‚Li±%”ﬁŒ®Wj#9”‘ObE.I:Ö6¡7\0À6+§%∞.»Öﬁ≥a7E8VSÂ?(DG®”≥BÎ%;Ú¨˘‘/<í¥˙•¿\r Ï¥>˚M¿∞@∂æÄH†Ds–∞Z[tH£Enx(å©R†xÒè˚@Ø˛GkjWî>Ã¬⁄#T/8Æc8ÈQ0ÀË_‘IIGIIí!•äYEdÀE¥^ètdÈth¬`DV!CÊ8é•\r≠¥übì3©!3‚@Ÿ33N}‚ZBÛ3	œ3‰30⁄‹M(Í>Ç }‰\\—tÍÇf†fåÀ‚I\rÆÄÛ337 X‘\"tdŒ,\nbtNO`P‚;≠‹ï“≠¿‘Ø\$\nÇûﬂ‰Z—≠5U5WUµ^ho˝‡ÊtŸPM/5K4Ej≥KQ&53GXìXx)“<5DÖè\r˚VÙ\nﬂr¢5b‹Ä\\J\">ßË1S\r[-¶ Du¿\r“‚ß√)00ÛYı»À¢∑k{\nµƒ#µﬁ\r≥^∑ã|Ëu‹ªUÂ_nÔU4…Uä~Yt”\rIö√@‰è≥ôR Û3:“uePMSË0TµwWØX»ÚÚD®Ú§KOU‹‡ïá;Uı\n†OYçÈYÕQ,M[\0˜_™DöÕ»W†æJ*Ï\rg(]‡®\r\"ZCâ©6uÍè+µYÛàY6√¥ê0™qı(ŸÛ8}êÛ3AX3T†h9j∂j‡fıMtÂPJbqMP5>è»¯∂©Yák%&\\Ç1d¢ÿE4¿ µYnê Ì\$<•U]”â1âmb÷∂ê^“ıö†Í\"NVÈﬂp∂Îpı±eM⁄ﬁ◊WÈ‹¢Ó\\‰)\n À\nf7\n◊2¥ır8ãó=Ek7tVöáµû7P¶∂L…Ìa6ÚÚv@'Ç6i‡Ôj&>±‚;≠„`“ˇa	\0p⁄®(µJ—Î)´\\ø™n˚Úƒ¨m\0º®2ÄÙeqJˆ≠PçÙtåÎ±fj¸¬\"[\0®∑Ü¢X,<\\åÓ∂◊‚˜Ê∑+mdÜÂ~‚‡öÖ—s%o∞¥mn◊),◊ÑÊ‘á≤\r4∂¬8\r±Œ∏◊mEÇH]Ç¶ò¸÷HW≠M0DÔﬂÄóÂ~èÀÅòKòÓE}¯∏¥‡|fÿ^ì‹◊\r>‘-z]2sÇxDòd[sátéS¢∂\0Qf-K`≠¢Çt‡ÿÑwTØ9ÄÊZÄ‡	¯\nB£9 Nbñ„<⁄B˛I5o◊oJÒp¿œJNdÂÀ\rçhﬁç√ê2ê\"‡xÊHC‡›çñ:ç¯˝9Yn16∆Ùzr+z±˘˛\\í˜ïúÙm ﬁ±T ˆÚ†˜@Y2lQ<2O+•%ìÕ.”Éh˘0AﬁÒ∏ä√Zãè2R¶¿1£ä/ØhH\r®XÖ»aNB&ß ƒM@÷[xåá Æ•Íñ‚8&L⁄VÕúv‡±*öj§€öGHÂ»\\ŸÆ	ô≤∂&s€\0Qö†\\\"Ëb†∞	‡ƒ\rBsõ…wùÇ	ùŸ·ûBN`ö7ßCo(Ÿ√‡®\n√®ùì®1ö9Ã*Eò ÒSÖ”Uê0U∫ tö'|îmô∞ﬁ?h[¢\$.#…5	 Â	pÑ‡yB‡@RÙ]£ÖÍ@|Ñß{ô¿ P\0xÙ/¶ w¢%§EsBdøßöCUö~O◊∑‡P‡@X‚]‘Öç®Z3®•1¶•{©eLYâ°å⁄ê¢\\í(*R`†	‡¶\nÖä‡é∫ÃQCF»*éππê‡Èú¨⁄pÜX|`N®Çæ\$Ä[Üâí@ÕU¢‡¶∂‡Z•`Zd\"\\\"ÖÇ¢£)´áIà:ËtöÏoDÊ\0[≤®‡±Ç-©ì†gÌ≥âôÆ*`hu%£,Äî¨„Iµ7ƒ´≤HÛµm§6ﬁ}Æ∫N÷Õ≥\$ªMµUYf&1˘é¿õe]pz•ß⁄I§≈m∂G/£ ∫w ‹!ï\\#5•4I•dπE¬hqÄÂ¶˜—¨kÁx|⁄k•qDöbÖz?ß∫â>˙Éæ:Üì[ËL“∆¨Z∞XöÆ:ûπÑ∑⁄ç«jﬂw5	∂YÅæ0 ©¬ì≠Ø\$\0C¢ÜdSg∏ÎÇ†{ù@î\n`û	¿√¸C ¢∑ªM∫µ‚ª≤# t}xŒNÑ˜∫á{∫€∞)Í˚CÉ FKZﬁjô¬\0PFYîB‰pFkñõ0<⁄> D<JEôög\rı.ì2ñ¸8ÈU@*Œ5fk™ÃJDÏ»…4çïTDU76…/¥ËØ@∑ÇK+Ñ√ˆJÆ∫√¬Ì@”=å‹WIOD≥85MöçN∫\$RÙ\0¯5®\r‡˘_™úÏEúÒœI´œ≥NÁl£“Ây\\Ùëà«qUÄ–Q˚†™\n@í®Ä€∫√pö¨®P€±´7‘ΩN\r˝R{*çqm›\$\0Rî◊‘ìä≈Âq–√à+U@ﬁB§ÁOf*ÜCÀ¨∫MCé‰`_ Ë¸ÚΩÀµNÍÊT‚5Ÿ¶C◊ª© ∏‡\\W√e&_Xå_ÿçhÂó¬∆Bú3¿å€%‹FW£˚Å|ôGﬁõ'≈[Ø≈Ç¿∞Ÿ’V†–#^\rÁ¶GRÄæòÄP±›FgÅ¢˚ÓØ¿Yi ˚•«z\n‚®ﬁ+ﬂ^/ì®ÄÇº•Ω\\ï6Ëﬂbºdmh◊‚@qÌç’Ah÷),J≠◊Wñ«cm˜em]é”èeœkZb0ﬂÂ˛ûÅYÒ]ymäËáfÿeπB;π”ÍO…¿wüapDW˚å…‹”{õ\0ò¿-2/bN¨s÷ΩﬁæRaìœÆh&qt\n\"’iˆRm¸hzœe¯Ü‡‹FS7µ–PPÚ‰ñ§‚‹:Bßà‚’sm∂≠Y d¸ﬁÚ7}3?*Çt˙ÚÈœlT⁄}ò~ÄÑèÄ‰=cû˝¨÷ﬁ«	û⁄3Ö;T≤Lﬁ5*	Ò~#µAïæÉëséx-7˜éf5`ÿ#\"N”b˜ØGòüãı@‹e¸[Ô¯Å§ÃsëòÄ∏-ßòM6ß£qqö hÄe5Ö\0“¢¿±˙*‡b¯IS‹…‹FŒÆ9}˝p”-¯˝`{˝±…ñkPò0T<Ñ©Z9‰0<’ö\r≠Ä;!√àg∫\r\nK‘\nïá\0¡∞*Ω\nb7(¿_∏@,Óe2\r¿]ñKÖ+\0…ˇp C\\—¢,0¨^ÓM–ßö∫©ì@ä;X\rï?\$\rájí+ˆ/¥¨BˆÊP†Ωâ˘®J{\"aÕ6ò‰âúπ|Â£\n\0ª‡\\5ìÅ–	156ˇÜ .›[¬UÿØ\0dË≤8YÁ:!—≤ë=∫¿X.≤uC™äåˆ!S∫∏áoÖp”B›¸€7∏≠≈Ø°Rh≠\\hãE=˙y:< :u≥Û2µ80ìsi¶üTsB€@\$ ÕÈ@«u	»Q∫ê¶.ÙÇT0M\\/ÍÄd+∆É\në°=‘∞då≈ÎA¢∏¢)\r@@¬h3ÄñŸ8.eZa|.‚7ùYk–c¿òÒñ'D#á®YÚ@Xçqñ=M°Ô44öB AM§ØdU\"ãHw4Ó(>Ç¨8®≤√C∏?e_`–≈X:ƒA9√∏ôÅÙp´G–‰áGy6Ω√FìXrâ°l˜1°ΩÿªêB¢√Ö9Rz©ıhBÑ{çûÄô\0ÎÂ^Ç√-‚0©%Dú5F\"\"‡⁄‹ ¬ô˙iƒ`ÀŸnAf® \"tDZ\"_‡V\$ü™!/ÖDÄ·öÜøµã¥àŸ¶°ÃÄF,25…jõTÎ·óy\0ÖNºx\rÁYl¶è#ë∆Eq\nÕ»B2ú\nÏ‡6∑Öƒ4”◊î!/¬\nÛÉâQ∏Ω*Æ;)bR∏Z0\0ƒCDoåÀûé48¿ï¥µá–eë\n„¶S%\\˙PIkêá(0¡åu/ôãG≤∆πäåº\\À}†4FpëûG˚_˜G?)g»otÅ∫[vû÷\0∞∏?b¿;™À`(ï€å‡∂NS)\n„x=Ë–+@Í‹7Éèj˙0èó,1√Özôì≠ç>0àâGc„LÖVXÙÉ±€ %¿Ö¡ÑQ+¯éÈo∆Fı»È‹∂–>Q-„cë⁄«lâ°≥§w‡Ãz5GëÍÇ@(hëc”Hı«r?àöNb˛@…®ˆ«¯∞Ólx3ãU`Ñrw™©‘U√‘Ùtÿ8‘=¿l#Úıèlˇ‰®â8•E\"åÉòôO6\nò¬1e£`\\hKfóV/–∑PaYKÁOÃ˝ Èè‡xë	âOjÑÛèr7•F;¥ÍÅBªëÍ£ÌÃíáº>Ê–¶≤V\rƒñƒ|©'Jµz´ºöî#íPB‰íY5\0NC§^\n~LrRí‘[ÃüR√¨Òg¿eZ\0xõ^ªi<Q„/)”%@ êíôfB≤Hf {%P‡\"\"Ωç¯@™˛ç)ÚíëìDE(iM2ÇSí*ÉyÚS¡\"‚Ò eÃí1å´◊ò\n4` ©>¶èQ*¶‹y∞nîíû•T‰u‘ù‚‰î—~%Å+WÅ≤XKãå£Q°[ îû‡lêPYy#DŸ¨D<´FL˙≥’@¡6']∆ãá˚\rFƒ`±!ï%\nè0êc–Ù¿À©%c8WrpGÉ.TúDoæUL2ÿ*È|\$¨:ËúròΩ@ÊÒË&“4ÅãHä> ë†ç%0*åZc(@‹]ÛÃQ:*¨ì‚(&\"xç'JO≥1π∫`>7	#Ÿ\"O4PX¸±î|B4ªÈâ[ òÈŸò\$nÔà1`ÙÍGSAı÷ÀAHª†\"Ü)‡©„S®˚fî…¶¡∫-\"ÀW˙+…ñ∫\0s-[îfoŸßÕD´êxÛÊ∏ıæ=Cö.ıì9≥≠ŒfÔ¿c¡\0¬ã7°?√ì95¥÷¶Z«0≠ÓfÏ≠®‡¯ÎH?R'q>o⁄ @aDüç˘G[;G¥DπBBdƒ°óq†ñ•2§|1πÏqô≤‰¿ŒÂ≤w<‹#™ßEYΩ^öß†≠Q\\Î[XÒÂË≈>?vÔû[ áÊäI…Õ— ÑôúÃg\0«)¥ÖÆgÖuå–g42j√∫'ÛéT‰êÑãÕvy,uí€DÜ=péH\\Éî^b‰ÏqÿÑƒit√≈XÖ¿£FP…@P˙•Täæi2#∞gÄóD·ÆôÒ%9ô@Ç");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$p=file_open_lock(get_temp_dir()."/adminer.version");if($p)file_write_unlock($p,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$f,$i,$nb,$qb,$yb,$k,$Wb,$Zb,$aa,$qc,$x,$ba,$Ac,$cd,$td,$oe,$dc,$Ie,$Me,$Qe,$Xe,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$pd=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$pd[]=true;call_user_func_array('session_set_cookie_params',$pd);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Lb);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($Le,$Zc=null){if(is_array($Le)){$wd=($Zc==1?0:1);$Le=$Le[$wd];}$Le=str_replace("%d","%s",$Le);$Zc=format_number($Zc);return
sprintf($Le,$Zc);}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$wd=array_search("SQL",$b->operators);if($wd!==false)unset($b->operators[$wd]);}function
dsn($ob,$U,$I,$F=array()){try{$this->pdo=new
PDO($ob,$U,$I,$F);}catch(Exception$Bb){auth_error(h($Bb->getMessage()));}$this->pdo->setAttribute(3,1);$this->pdo->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->pdo->getAttribute(4);}function
quote($R){return$this->pdo->quote($R);}function
query($J,$Re=false){$K=$this->pdo->query($J);$this->error="";if(!$K){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($K);return$K;}function
multi_query($J){return$this->_result=$this->query($J);}function
store_result($K=null){if(!$K){$K=$this->_result;if(!$K)return
false;}if($K->columnCount()){$K->num_rows=$K->rowCount();return$K;}$this->affected_rows=$K->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($J,$l=0){$K=$this->query($J);if(!$K)return
false;$M=$K->fetch();return$M[$l];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$M=(object)$this->getColumnMeta($this->_offset++);$M->orgtable=$M->table;$M->orgname=$M->name;$M->charsetnr=(in_array("blob",(array)$M->flags)?63:0);return$M;}}}$nb=array();function
add_driver($t,$E){global$nb;$nb[$t]=$E;}class
Min_SQL{var$_conn;function
__construct($f){$this->_conn=$f;}function
select($S,$O,$Z,$r,$G=array(),$z=1,$H=0,$_d=false){global$b,$x;$w=(count($r)<count($O));$J=$b->selectQueryBuild($O,$Z,$r,$G,$z,$H);if(!$J)$J="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$r&&$w&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$O)."\nFROM ".table($S),($Z?"\nWHERE ".implode(" AND ",$Z):"").($r&&$w?"\nGROUP BY ".implode(", ",$r):"").($G?"\nORDER BY ".implode(", ",$G):""),($z!=""?+$z:null),($H?$z*$H:0),"\n");$le=microtime(true);$L=$this->_conn->query($J);if($_d)echo$b->selectQuery($J,$le,!$L);return$L;}function
delete($S,$Fd,$z=0){$J="FROM ".table($S);return
queries("DELETE".($z?limit1($S,$J,$Fd):" $J$Fd"));}function
update($S,$Q,$Fd,$z=0,$Zd="\n"){$df=array();foreach($Q
as$y=>$W)$df[]="$y = $W";$J=table($S)." SET$Zd".implode(",$Zd",$df);return
queries("UPDATE".($z?limit1($S,$J,$Fd,$Zd):" $J$Fd"));}function
insert($S,$Q){return
queries("INSERT INTO ".table($S).($Q?" (".implode(", ",array_keys($Q)).")\nVALUES (".implode(", ",$Q).")":" DEFAULT VALUES"));}function
insertUpdate($S,$N,$zd){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($J,$Ce){}function
convertSearch($u,$W,$l){return$u;}function
value($W,$l){return(method_exists($this->_conn,'value')?$this->_conn->value($W,$l):(is_resource($W)?stream_get_contents($W):$W));}function
quoteBinary($Rd){return
q($Rd);}function
warnings(){return'';}function
tableHelp($E){}}class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".'Editor'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($Wa=false){return
password_file($Wa);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($P){}function
database(){global$f;if($f){$eb=$this->databases(false);return(!$eb?$f->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$eb[(information_schema($eb[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($Nb=true){return
get_databases($Nb);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$L=array();$n="adminer.css";if(file_exists($n))$L[]=$n;return$L;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.'Username'.'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.'Password'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
loginFormField($E,$gc,$X){return$gc.$X;}function
login($Hc,$I){return
true;}function
tableName($ue){return
h($ue["Comment"]!=""?$ue["Comment"]:$ue["Name"]);}function
fieldName($l,$G=0){return
h(preg_replace('~\s+\[.*\]$~','',($l["comment"]!=""?$l["comment"]:$l["field"])));}function
selectLinks($ue,$Q=""){$a=$ue["Name"];if($Q!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$Q).'">'.'New item'."</a>\n";}function
foreignKeys($S){return
foreign_keys($S);}function
backwardKeys($S,$te){$L=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($S)."
ORDER BY ORDINAL_POSITION",null,"")as$M)$L[$M["TABLE_NAME"]]["keys"][$M["CONSTRAINT_NAME"]][$M["COLUMN_NAME"]]=$M["REFERENCED_COLUMN_NAME"];foreach($L
as$y=>$W){$E=$this->tableName(table_status($y,true));if($E!=""){$Td=preg_quote($te);$Zd="(:|\\s*-)?\\s+";$L[$y]["name"]=(preg_match("(^$Td$Zd(.+)|^(.+?)$Zd$Td\$)iu",$E,$B)?$B[2].$B[3]:$E);}else
unset($L[$y]);}return$L;}function
backwardKeysPrint($wa,$M){foreach($wa
as$S=>$va){foreach($va["keys"]as$Oa){$_=ME.'select='.urlencode($S);$s=0;foreach($Oa
as$d=>$W)$_.=where_link($s++,$d,$M[$W]);echo"<a href='".h($_)."'>".h($va["name"])."</a>";$_=ME.'edit='.urlencode($S);foreach($Oa
as$d=>$W)$_.="&set".urlencode("[".bracket_escape($d)."]")."=".urlencode($M[$W]);echo"<a href='".h($_)."' title='".'New item'."'>+</a> ";}}}function
selectQuery($J,$le,$Gb=false){return"<!--\n".str_replace("--","--><!-- ",$J)."\n(".format_time($le).")\n-->\n";}function
rowDescription($S){foreach(fields($S)as$l){if(preg_match("~varchar|character varying~",$l["type"]))return
idf_escape($l["field"]);}return"";}function
rowDescriptions($N,$Rb){$L=$N;foreach($N[0]as$y=>$W){if(list($S,$t,$E)=$this->_foreignColumn($Rb,$y)){$lc=array();foreach($N
as$M)$lc[$M[$y]]=q($M[$y]);$ib=$this->_values[$S];if(!$ib)$ib=get_key_vals("SELECT $t, $E FROM ".table($S)." WHERE $t IN (".implode(", ",$lc).")");foreach($N
as$D=>$M){if(isset($M[$y]))$L[$D][$y]=(string)$ib[$M[$y]];}}}return$L;}function
selectLink($W,$l){}function
selectVal($W,$_,$l,$kd){$L=$W;$_=h($_);if(preg_match('~blob|bytea~',$l["type"])&&!is_utf8($W)){$L=lang(array('%d byte','%d bytes'),strlen($kd));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$kd))$L="<img src='$_' alt='$L'>";}if(like_bool($l)&&$L!="")$L=(preg_match('~^(1|t|true|y|yes|on)$~i',$W)?'yes':'no');if($_)$L="<a href='$_'".(is_url($_)?target_blank():"").">$L</a>";if(!$_&&!like_bool($l)&&preg_match(number_type(),$l["type"]))$L="<div class='number'>$L</div>";elseif(preg_match('~date~',$l["type"]))$L="<div class='datetime'>$L</div>";return$L;}function
editVal($W,$l){if(preg_match('~date|timestamp~',$l["type"])&&$W!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~','$1-$3-$5',$W);return$W;}function
selectColumnsPrint($O,$e){}function
selectSearchPrint($Z,$e,$v){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Search'."</legend><div>\n";$xc=array();foreach($Z
as$y=>$W)$xc[$W["col"]]=$y;$s=0;$m=fields($_GET["select"]);foreach($e
as$E=>$hb){$l=$m[$E];if(preg_match("~enum~",$l["type"])||like_bool($l)){$y=$xc[$E];$s--;echo"<div>".h($hb)."<input type='hidden' name='where[$s][col]' value='".h($E)."'>:",(like_bool($l)?" <select name='where[$s][val]'>".optionlist(array(""=>"",'no','yes'),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$l,(array)$Z[$y]["val"],($l["null"]?0:null))),"</div>\n";unset($e[$E]);}elseif(is_array($F=$this->_foreignKeyOptions($_GET["select"],$E))){if($m[$E]["null"])$F[0]='('.'empty'.')';$y=$xc[$E];$s--;echo"<div>".h($hb)."<input type='hidden' name='where[$s][col]' value='".h($E)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($F,$Z[$y]["val"],true)."</select></div>\n";unset($e[$E]);}}$s=0;foreach($Z
as$W){if(($W["col"]==""||$e[$W["col"]])&&"$W[col]$W[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".'anywhere'.")".optionlist($e,$W["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$W["op"]),"<input type='search' name='where[$s][val]' value='".h($W["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$s++;}}echo"<div><select name='where[$s][col]'><option value=''>(".'anywhere'.")".optionlist($e,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($G,$e,$v){$jd=array();foreach($v
as$y=>$nc){$G=array();foreach($nc["columns"]as$W)$G[]=$e[$W];if(count(array_filter($G,'strlen'))>1&&$y!="PRIMARY")$jd[$y]=implode(", ",$G);}if($jd){echo'<fieldset><legend>'.'Sort'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$jd,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($_e){}function
selectActionPrint($v){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($ub,$e){if($ub){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".'From'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Subject'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$e,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Insert'."'>\n";echo"<p>".'Attachments'.": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($ub)==1?'<input type="hidden" name="email_field" value="'.h(key($ub)).'">':html_select("email_field",$ub)),"<input type='submit' name='email' value='".'Send'."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($e,$v){return
array(array(),array());}function
selectSearchProcess($m,$v){global$i;$L=array();foreach((array)$_GET["where"]as$y=>$Z){$La=$Z["col"];$fd=$Z["op"];$W=$Z["val"];if(($y<0?"":$La).$W!=""){$Ra=array();foreach(($La!=""?array($La=>$m[$La]):$m)as$E=>$l){if($La!=""||is_numeric($W)||!preg_match(number_type(),$l["type"])){$E=idf_escape($E);if($La!=""&&$l["type"]=="enum")$Ra[]=(in_array(0,$W)?"$E IS NULL OR ":"")."$E IN (".implode(", ",array_map('intval',$W)).")";else{$Ae=preg_match('~char|text|enum|set~',$l["type"]);$X=$this->processInput($l,(!$fd&&$Ae&&preg_match('~^[^%]+$~',$W)?"%$W%":$W));$Ra[]=$i->convertSearch($E,$W,$l).($X=="NULL"?" IS".($fd==">="?" NOT":"")." $X":(in_array($fd,$this->operators)||$fd=="="?" $fd $X":($Ae?" LIKE $X":" IN (".str_replace(",","', '",$X).")")));if($y<0&&$W=="0")$Ra[]="$E IS NULL";}}}$L[]=($Ra?"(".implode(" OR ",$Ra).")":"1 = 0");}}return$L;}function
selectOrderProcess($m,$v){$oc=$_GET["index_order"];if($oc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($oc!=""?array($v[$oc]):$v)as$nc){if($oc!=""||$nc["type"]=="INDEX"){$bc=array_filter($nc["descs"]);$hb=false;foreach($nc["columns"]as$W){if(preg_match('~date|timestamp~',$m[$W]["type"])){$hb=true;break;}}$L=array();foreach($nc["columns"]as$y=>$W)$L[]=idf_escape($W).(($bc?$nc["descs"][$y]:$hb)?" DESC":"");return$L;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Rb){if($_POST["email_append"])return
true;if($_POST["email"]){$Xd=0;if($_POST["all"]||$_POST["check"]){$l=idf_escape($_POST["email_field"]);$qe=$_POST["email_subject"];$C=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$qe.$C",$Lc);$N=get_rows("SELECT DISTINCT $l".($Lc[1]?", ".implode(", ",array_map('idf_escape',array_unique($Lc[1]))):"")." FROM ".table($_GET["select"])." WHERE $l IS NOT NULL AND $l != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$m=fields($_GET["select"]);foreach($this->rowDescriptions($N,$Rb)as$M){$Md=array('{\\'=>'{');foreach($Lc[1]as$W)$Md['{$'."$W}"]=$this->editVal($M[$W],$m[$W]);$tb=$M[$_POST["email_field"]];if(is_mail($tb)&&send_mail($tb,strtr($qe,$Md),strtr($C,$Md),$_POST["email_from"],$_FILES["email_files"]))$Xd++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('%d e-mail has been sent.','%d e-mails have been sent.'),$Xd));}return
false;}function
selectQueryBuild($O,$Z,$r,$G,$z,$H){return"";}function
messageQuery($J,$Be,$Gb=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$J)."\n".($Be?"($Be)\n":"")."-->";}function
editRowPrint($S,$m,$M,$Ye){}function
editFunctions($l){$L=array();if($l["null"]&&preg_match('~blob~',$l["type"]))$L["NULL"]='empty';$L[""]=($l["null"]||$l["auto_increment"]||like_bool($l)?"":"*");if(preg_match('~date|time~',$l["type"]))$L["now"]='now';if(preg_match('~_(md5|sha1)$~i',$l["field"],$B))$L[]=strtolower($B[1]);return$L;}function
editInput($S,$l,$c,$X){if($l["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$c value='-1' checked><i>".'original'."</i></label> ":"").enum_input("radio",$c,$l,($X||isset($_GET["select"])?$X:0),($l["null"]?"":null));$F=$this->_foreignKeyOptions($S,$l["field"],$X);if($F!==null)return(is_array($F)?"<select$c>".optionlist($F,$X,true)."</select>":"<input value='".h($X)."'$c class='hidden'>"."<input value='".h($F)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($S)."&field=".urlencode($l["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($l))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?' checked':'')."$c>";$hc="";if(preg_match('~time~',$l["type"]))$hc='HH:MM:SS';if(preg_match('~date|timestamp~',$l["type"]))$hc='[yyyy]-mm-dd'.($hc?" [$hc]":"");if($hc)return"<input value='".h($X)."'$c> ($hc)";if(preg_match('~_(md5|sha1)$~i',$l["field"]))return"<input type='password' value='".h($X)."'$c>";return'';}function
editHint($S,$l,$X){return(preg_match('~\s+(\[.*\])$~',($l["comment"]!=""?$l["comment"]:$l["field"]),$B)?h(" $B[1]"):'');}function
processInput($l,$X,$q=""){if($q=="now")return"$q()";$L=$X;if(preg_match('~date|timestamp~',$l["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote('$1-$3-$5'))).'(.*))',$X,$B))$L=($B["p1"]!=""?$B["p1"]:($B["p2"]!=""?($B["p2"]<70?20:19).$B["p2"]:gmdate("Y")))."-$B[p3]$B[p4]-$B[p5]$B[p6]".end($B);$L=($l["type"]=="bit"&&preg_match('~^[0-9]+$~',$X)?$L:q($L));if($X==""&&like_bool($l))$L="'0'";elseif($X==""&&($l["null"]||!preg_match('~char|text~',$l["type"])))$L="NULL";elseif(preg_match('~^(md5|sha1)$~',$q))$L="$q($L)";return
unconvert_field($l,$L);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($h){}function
dumpTable($S,$pe,$vc=0){echo"\xef\xbb\xbf";}function
dumpData($S,$pe,$J){global$f;$K=$f->query($J,1);if($K){while($M=$K->fetch_assoc()){if($pe=="table"){dump_csv(array_keys($M));$pe="INSERT";}dump_csv($M);}}}function
dumpFilename($kc){return
friendly_url($kc);}function
dumpHeaders($kc,$Tc=false){$Eb="csv";header("Content-Type: text/csv; charset=utf-8");return$Eb;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Sc){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Sc=="auth"){$Mb=true;foreach((array)$_SESSION["pwds"]as$Y=>$be){foreach($be[""]as$U=>$I){if($I!==null){if($Mb){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$Mb=false;}echo"<li><a href='".h(auth_url($Y,"",$U))."'>".($U!=""?h($U):"<i>".'empty'."</i>")."</a>\n";}}}}else{$this->databasesPrint($Sc);if($Sc!="db"&&$Sc!="ns"){$T=table_status('',true);if(!$T)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($T);}}}function
databasesPrint($Sc){}function
tablesPrint($we){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($we
as$M){echo'<li>';$E=$this->tableName($M);if(isset($M["Engine"])&&$E!="")echo"<a href='".h(ME).'select='.urlencode($M["Name"])."'".bold($_GET["select"]==$M["Name"]||$_GET["edit"]==$M["Name"],"select")." title='".'Select data'."'>$E</a>\n";}echo"</ul>\n";}function
_foreignColumn($Rb,$d){foreach((array)$Rb[$d]as$Qb){if(count($Qb["source"])==1){$E=$this->rowDescription($Qb["table"]);if($E!=""){$t=idf_escape($Qb["target"][0]);return
array($Qb["table"],$t,$E);}}}}function
_foreignKeyOptions($S,$d,$X=null){global$f;if(list($ye,$t,$E)=$this->_foreignColumn(column_foreign_keys($S),$d)){$L=&$this->_values[$ye];if($L===null){$T=table_status($ye);$L=($T["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $E FROM ".table($ye)." ORDER BY 2"));}if(!$L&&$X!==null)return$f->result("SELECT $E FROM ".table($ye)." WHERE $t = ".q($X));return$L;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);$nb=array("server"=>"MySQL")+$nb;if(!defined("DRIVER")){define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($P="",$U="",$I="",$db=null,$vd=null,$ge=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($ic,$vd)=explode(":",$P,2);$ke=$b->connectSsl();if($ke)$this->ssl_set($ke['key'],$ke['cert'],$ke['ca'],'','');$L=@$this->real_connect(($P!=""?$ic:ini_get("mysqli.default_host")),($P.$U!=""?$U:ini_get("mysqli.default_user")),($P.$U.$I!=""?$I:ini_get("mysqli.default_pw")),$db,(is_numeric($vd)?$vd:ini_get("mysqli.default_port")),(!is_numeric($vd)?$vd:$ge),($ke?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$L;}function
set_charset($Da){if(parent::set_charset($Da))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Da");}function
result($J,$l=0){$K=$this->query($J);if(!$K)return
false;$M=$K->fetch_array();return$M[$l];}function
quote($R){return"'".$this->escape_string($R)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($P,$U,$I){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($P!=""?$P:ini_get("mysql.default_host")),("$P$U"!=""?$U:ini_get("mysql.default_user")),("$P$U$I"!=""?$I:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Da){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Da,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Da");}function
quote($R){return"'".mysql_real_escape_string($R,$this->_link)."'";}function
select_db($db){return
mysql_select_db($db,$this->_link);}function
query($J,$Re=false){$K=@($Re?mysql_unbuffered_query($J,$this->_link):mysql_query($J,$this->_link));$this->error="";if(!$K){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($K===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($K);}function
multi_query($J){return$this->_result=$this->query($J);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($J,$l=0){$K=$this->query($J);if(!$K||!$K->num_rows)return
false;return
mysql_result($K->_result,0,$l);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($K){$this->_result=$K;$this->num_rows=mysql_num_rows($K);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$L=mysql_fetch_field($this->_result,$this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=($L->blob?63:0);return$L;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($P,$U,$I){global$b;$F=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$ke=$b->connectSsl();if($ke){if(!empty($ke['key']))$F[PDO::MYSQL_ATTR_SSL_KEY]=$ke['key'];if(!empty($ke['cert']))$F[PDO::MYSQL_ATTR_SSL_CERT]=$ke['cert'];if(!empty($ke['ca']))$F[PDO::MYSQL_ATTR_SSL_CA]=$ke['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$P)),$U,$I,$F);return
true;}function
set_charset($Da){$this->query("SET NAMES $Da");}function
select_db($db){return$this->query("USE ".idf_escape($db));}function
query($J,$Re=false){$this->pdo->setAttribute(1000,!$Re);return
parent::query($J,$Re);}}}class
Min_Driver
extends
Min_SQL{function
insert($S,$Q){return($Q?parent::insert($S,$Q):queries("INSERT INTO ".table($S)." ()\nVALUES ()"));}function
insertUpdate($S,$N,$zd){$e=array_keys(reset($N));$yd="INSERT INTO ".table($S)." (".implode(", ",$e).") VALUES\n";$df=array();foreach($e
as$y)$df[$y]="$y = VALUES($y)";$re="\nON DUPLICATE KEY UPDATE ".implode(", ",$df);$df=array();$Ec=0;foreach($N
as$Q){$X="(".implode(", ",$Q).")";if($df&&(strlen($yd)+$Ec+strlen($X)+strlen($re)>1e6)){if(!queries($yd.implode(",\n",$df).$re))return
false;$df=array();$Ec=0;}$df[]=$X;$Ec+=strlen($X)+2;}return
queries($yd.implode(",\n",$df).$re);}function
slowQuery($J,$Ce){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$Ce FOR $J";elseif(preg_match('~^(SELECT\b)(.+)~is',$J,$B))return"$B[1] /*+ MAX_EXECUTION_TIME(".($Ce*1000).") */ $B[2]";}}function
convertSearch($u,$W,$l){return(preg_match('~char|text|enum|set~',$l["type"])&&!preg_match("~^utf8~",$l["collation"])&&preg_match('~[\x80-\xFF]~',$W['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$K=$this->_conn->query("SHOW WARNINGS");if($K&&$K->num_rows){ob_start();select($K);return
ob_get_clean();}}function
tableHelp($E){$Jc=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Jc?"information-schema-$E-table/":str_replace("_","-",$E)."-table.html"));if(DB=="mysql")return($Jc?"mysql$E-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$Qe,$oe;$f=new
Min_DB;$Ya=$b->credentials();if($f->connect($Ya[0],$Ya[1],$Ya[2])){$f->set_charset(charset($f));$f->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$f)){$oe['Strings'][]="json";$Qe["json"]=4294967295;}return$f;}$L=$f->error;if(function_exists('iconv')&&!is_utf8($L)&&strlen($Rd=iconv("windows-1250","utf-8",$L))>strlen($L))$L=$Rd;return$L;}function
get_databases($Nb){$L=get_session("dbs");if($L===null){$J=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$L=($Nb?slow_query($J):get_vals($J));restart_session();set_session("dbs",$L);stop_session();}return$L;}function
limit($J,$Z,$z,$ad=0,$Zd=" "){return" $J$Z".($z!==null?$Zd."LIMIT $z".($ad?" OFFSET $ad":""):"");}function
limit1($S,$J,$Z,$Zd="\n"){return
limit($J,$Z,1,0,$Zd);}function
db_collation($h,$Na){global$f;$L=null;$Wa=$f->result("SHOW CREATE DATABASE ".idf_escape($h),1);if(preg_match('~ COLLATE ([^ ]+)~',$Wa,$B))$L=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$Wa,$B))$L=$Na[$B[1]][-1];return$L;}function
engines(){$L=array();foreach(get_rows("SHOW ENGINES")as$M){if(preg_match("~YES|DEFAULT~",$M["Support"]))$L[]=$M["Engine"];}return$L;}function
logged_user(){global$f;return$f->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($eb){$L=array();foreach($eb
as$h)$L[$h]=count(get_vals("SHOW TABLES IN ".idf_escape($h)));return$L;}function
table_status($E="",$Hb=false){$L=array();foreach(get_rows($Hb&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($E!=""?"AND TABLE_NAME = ".q($E):"ORDER BY Name"):"SHOW TABLE STATUS".($E!=""?" LIKE ".q(addcslashes($E,"%_\\")):""))as$M){if($M["Engine"]=="InnoDB")$M["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$M["Comment"]);if(!isset($M["Engine"]))$M["Comment"]="";if($E!="")return$M;$L[$M["Name"]]=$M;}return$L;}function
is_view($T){return$T["Engine"]===null;}function
fk_support($T){return
preg_match('~InnoDB|IBMDB2I~i',$T["Engine"])||(preg_match('~NDB~i',$T["Engine"])&&min_version(5.6));}function
fields($S){$L=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($S))as$M){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$M["Type"],$B);$L[$M["Field"]]=array("field"=>$M["Field"],"full_type"=>$M["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($M["Default"]!=""||preg_match("~char|set~",$B[1])?(preg_match('~text~',$B[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$M["Default"])):$M["Default"]):null),"null"=>($M["Null"]=="YES"),"auto_increment"=>($M["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$M["Extra"],$B)?$B[1]:""),"collation"=>$M["Collation"],"privileges"=>array_flip(preg_split('~, *~',$M["Privileges"])),"comment"=>$M["Comment"],"primary"=>($M["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$M["Extra"]),);}return$L;}function
indexes($S,$g=null){$L=array();foreach(get_rows("SHOW INDEX FROM ".table($S),$g)as$M){$E=$M["Key_name"];$L[$E]["type"]=($E=="PRIMARY"?"PRIMARY":($M["Index_type"]=="FULLTEXT"?"FULLTEXT":($M["Non_unique"]?($M["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$L[$E]["columns"][]=$M["Column_name"];$L[$E]["lengths"][]=($M["Index_type"]=="SPATIAL"?null:$M["Sub_part"]);$L[$E]["descs"][]=null;}return$L;}function
foreign_keys($S){global$f,$cd;static$rd='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$L=array();$Xa=$f->result("SHOW CREATE TABLE ".table($S),1);if($Xa){preg_match_all("~CONSTRAINT ($rd) FOREIGN KEY ?\\(((?:$rd,? ?)+)\\) REFERENCES ($rd)(?:\\.($rd))? \\(((?:$rd,? ?)+)\\)(?: ON DELETE ($cd))?(?: ON UPDATE ($cd))?~",$Xa,$Lc,PREG_SET_ORDER);foreach($Lc
as$B){preg_match_all("~$rd~",$B[2],$he);preg_match_all("~$rd~",$B[5],$ye);$L[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$he[0]),"target"=>array_map('idf_unescape',$ye[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$L;}function
view($E){global$f;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$f->result("SHOW CREATE VIEW ".table($E),1)));}function
collations(){$L=array();foreach(get_rows("SHOW COLLATION")as$M){if($M["Default"])$L[$M["Charset"]][-1]=$M["Collation"];else$L[$M["Charset"]][]=$M["Collation"];}ksort($L);foreach($L
as$y=>$W)asort($L[$y]);return$L;}function
information_schema($h){return(min_version(5)&&$h=="information_schema")||(min_version(5.5)&&$h=="performance_schema");}function
error(){global$f;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$f->error));}function
create_database($h,$Ma){return
queries("CREATE DATABASE ".idf_escape($h).($Ma?" COLLATE ".q($Ma):""));}function
drop_databases($eb){$L=apply_queries("DROP DATABASE",$eb,'idf_escape');restart_session();set_session("dbs",null);return$L;}function
rename_database($E,$Ma){$L=false;if(create_database($E,$Ma)){$Ld=array();foreach(tables_list()as$S=>$Oe)$Ld[]=table($S)." TO ".idf_escape($E).".".table($S);$L=(!$Ld||queries("RENAME TABLE ".implode(", ",$Ld)));if($L)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$L;}function
auto_increment(){$ta=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$nc){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$nc["columns"],true)){$ta="";break;}if($nc["type"]=="PRIMARY")$ta=" UNIQUE";}}return" AUTO_INCREMENT$ta";}function
alter_table($S,$E,$m,$Pb,$Qa,$xb,$Ma,$sa,$qd){$ma=array();foreach($m
as$l)$ma[]=($l[1]?($S!=""?($l[0]!=""?"CHANGE ".idf_escape($l[0]):"ADD"):" ")." ".implode($l[1]).($S!=""?$l[2]:""):"DROP ".idf_escape($l[0]));$ma=array_merge($ma,$Pb);$me=($Qa!==null?" COMMENT=".q($Qa):"").($xb?" ENGINE=".q($xb):"").($Ma?" COLLATE ".q($Ma):"").($sa!=""?" AUTO_INCREMENT=$sa":"");if($S=="")return
queries("CREATE TABLE ".table($E)." (\n".implode(",\n",$ma)."\n)$me$qd");if($S!=$E)$ma[]="RENAME TO ".table($E);if($me)$ma[]=ltrim($me);return($ma||$qd?queries("ALTER TABLE ".table($S)."\n".implode(",\n",$ma).$qd):true);}function
alter_indexes($S,$ma){foreach($ma
as$y=>$W)$ma[$y]=($W[2]=="DROP"?"\nDROP INDEX ".idf_escape($W[1]):"\nADD $W[0] ".($W[0]=="PRIMARY"?"KEY ":"").($W[1]!=""?idf_escape($W[1])." ":"")."(".implode(", ",$W[2]).")");return
queries("ALTER TABLE ".table($S).implode(",",$ma));}function
truncate_tables($we){return
apply_queries("TRUNCATE TABLE",$we);}function
drop_views($gf){return
queries("DROP VIEW ".implode(", ",array_map('table',$gf)));}function
drop_tables($we){return
queries("DROP TABLE ".implode(", ",array_map('table',$we)));}function
move_tables($we,$gf,$ye){$Ld=array();foreach(array_merge($we,$gf)as$S)$Ld[]=table($S)." TO ".idf_escape($ye).".".table($S);return
queries("RENAME TABLE ".implode(", ",$Ld));}function
copy_tables($we,$gf,$ye){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($we
as$S){$E=($ye==DB?table("copy_$S"):idf_escape($ye).".".table($S));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $E"))||!queries("CREATE TABLE $E LIKE ".table($S))||!queries("INSERT INTO $E SELECT * FROM ".table($S)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")))as$M){$Ne=$M["Trigger"];if(!queries("CREATE TRIGGER ".($ye==DB?idf_escape("copy_$Ne"):idf_escape($ye).".".idf_escape($Ne))." $M[Timing] $M[Event] ON $E FOR EACH ROW\n$M[Statement];"))return
false;}}foreach($gf
as$S){$E=($ye==DB?table("copy_$S"):idf_escape($ye).".".table($S));$ff=view($S);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $E"))||!queries("CREATE VIEW $E AS $ff[select]"))return
false;}return
true;}function
trigger($E){if($E=="")return
array();$N=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($E));return
reset($N);}function
triggers($S){$L=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")))as$M)$L[$M["Trigger"]]=array($M["Timing"],$M["Event"]);return$L;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($E,$Oe){global$f,$yb,$qc,$Qe;$la=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$ie="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Pe="((".implode("|",array_merge(array_keys($Qe),$la)).")\\b(?:\\s*\\(((?:[^'\")]|$yb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$rd="$ie*(".($Oe=="FUNCTION"?"":$qc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Pe";$Wa=$f->result("SHOW CREATE $Oe ".idf_escape($E),2);preg_match("~\\(((?:$rd\\s*,?)*)\\)\\s*".($Oe=="FUNCTION"?"RETURNS\\s+$Pe\\s+":"")."(.*)~is",$Wa,$B);$m=array();preg_match_all("~$rd\\s*,?~is",$B[1],$Lc,PREG_SET_ORDER);foreach($Lc
as$od)$m[]=array("field"=>str_replace("``","`",$od[2]).$od[3],"type"=>strtolower($od[5]),"length"=>preg_replace_callback("~$yb~s",'normalize_enum',$od[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$od[8] $od[7]"))),"null"=>1,"full_type"=>$od[4],"inout"=>strtoupper($od[1]),"collation"=>strtolower($od[9]),);if($Oe!="FUNCTION")return
array("fields"=>$m,"definition"=>$B[11]);return
array("fields"=>$m,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($E,$M){return
idf_escape($E);}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ID()");}function
explain($f,$J){return$f->query("EXPLAIN ".(min_version(5.1)&&!min_version(5.7)?"PARTITIONS ":"").$J);}function
found_rows($T,$Z){return($Z||$T["Engine"]!="InnoDB"?null:$T["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Sd,$g=null){return
true;}function
create_sql($S,$sa,$pe){global$f;$L=$f->result("SHOW CREATE TABLE ".table($S),1);if(!$sa)$L=preg_replace('~ AUTO_INCREMENT=\d+~','',$L);return$L;}function
truncate_sql($S){return"TRUNCATE ".table($S);}function
use_sql($db){return"USE ".idf_escape($db);}function
trigger_sql($S){$L="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")),null,"-- ")as$M)$L.="\nCREATE TRIGGER ".idf_escape($M["Trigger"])." $M[Timing] $M[Event] ON ".table($M["Table"])." FOR EACH ROW\n$M[Statement];;\n";return$L;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($l){if(preg_match("~binary~",$l["type"]))return"HEX(".idf_escape($l["field"]).")";if($l["type"]=="bit")return"BIN(".idf_escape($l["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$l["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($l["field"]).")";}function
unconvert_field($l,$L){if(preg_match("~binary~",$l["type"]))$L="UNHEX($L)";if($l["type"]=="bit")$L="CONV($L, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$l["type"]))$L=(min_version(8)?"ST_":"")."GeomFromText($L, SRID($l[field]))";return$L;}function
support($Ib){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$Ib);}function
kill_process($W){return
queries("KILL ".number($W));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$f;return$f->result("SELECT @@max_connections");}function
driver_config(){$Qe=array();$oe=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$W){$Qe+=$W;$oe[$y]=array_keys($W);}return
array('possible_drivers'=>array("MySQLi","MySQL","PDO_MySQL"),'jush'=>"sql",'types'=>$Qe,'structured_types'=>$oe,'unsigned'=>array("unsigned","zerofill","unsigned zerofill"),'operators'=>array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL"),'functions'=>array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper"),'grouping'=>array("avg","count","count distinct","group_concat","max","min","sum"),'edit_functions'=>array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",)),);}}$Sa=driver_config();$xd=$Sa['possible_drivers'];$x=$Sa['jush'];$Qe=$Sa['types'];$oe=$Sa['structured_types'];$Xe=$Sa['unsigned'];$hd=$Sa['operators'];$Wb=$Sa['functions'];$Zb=$Sa['grouping'];$qb=$Sa['edit_functions'];if($b->operators===null)$b->operators=$hd;define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.8.0";function
page_header($De,$k="",$Ca=array(),$Ee=""){global$ba,$ca,$b,$nb,$x;page_headers();if(is_ajax()&&$k){page_messages($k);exit;}$Fe=$De.($Ee!=""?": $Ee":"");$Ge=strip_tags($Fe.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$Ge,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.8.0"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.8.0");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.0"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.8.0"),'">
';foreach($b->css()as$ab){echo'<link rel="stylesheet" type="text/css" href="',h($ab),'">
';}}echo'
<body class="ltr nojs">
';$n=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($n)&&filemtime($n)+86400>time()){$ef=unserialize(file_get_contents($n));$Cd="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($ef["version"],base64_decode($ef["signature"]),$Cd)==1)$_COOKIE["adminer_version"]=$ef["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Ca!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$nb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$P=$b->serverName(SERVER);$P=($P!=""?$P:'Server');if($Ca===false)echo"$P\n";else{echo"<a href='".h($_)."' accesskey='1' title='Alt+Shift+1'>$P</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ca)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ca)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ca
as$y=>$W){$hb=(is_array($W)?$W[1]:h($W));if($hb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($W)?$W[0]:$W)."'>$hb</a> &raquo; ";}}echo"$De\n";}}echo"<h2>$Fe</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($k);$eb=&get_session("dbs");if(DB!=""&&$eb&&!in_array(DB,$eb,true))$eb=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Za){$ec=array();foreach($Za
as$y=>$W)$ec[]="$y $W";header("Content-Security-Policy: ".implode("; ",$ec));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$Xc;if(!$Xc)$Xc=base64_encode(rand_string());return$Xc;}function
page_messages($k){$Ze=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Rc=$_SESSION["messages"][$Ze];if($Rc){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Rc)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ze]);}if($k)echo"<div class='error'>$k</div>\n";}function
page_footer($Sc=""){global$b,$Ie;echo'</div>

';if($Sc!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$Ie,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Sc);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($D){while($D>=2147483648)$D-=4294967296;while($D<=-2147483649)$D+=4294967296;return(int)$D;}function
long2str($V,$if){$Rd='';foreach($V
as$W)$Rd.=pack('V',$W);if($if)return
substr($Rd,0,end($V));return$Rd;}function
str2long($Rd,$if){$V=array_values(unpack('V*',str_pad($Rd,4*ceil(strlen($Rd)/4),"\0")));if($if)$V[]=strlen($Rd);return$V;}function
xxtea_mx($nf,$mf,$se,$wc){return
int32((($nf>>5&0x7FFFFFF)^$mf<<2)+(($mf>>3&0x1FFFFFFF)^$nf<<4))^int32(($se^$mf)+($wc^$nf));}function
encrypt_string($ne,$y){if($ne=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$V=str2long($ne,true);$D=count($V)-1;$nf=$V[$D];$mf=$V[0];$Dd=floor(6+52/($D+1));$se=0;while($Dd-->0){$se=int32($se+0x9E3779B9);$pb=$se>>2&3;for($md=0;$md<$D;$md++){$mf=$V[$md+1];$Uc=xxtea_mx($nf,$mf,$se,$y[$md&3^$pb]);$nf=int32($V[$md]+$Uc);$V[$md]=$nf;}$mf=$V[0];$Uc=xxtea_mx($nf,$mf,$se,$y[$md&3^$pb]);$nf=int32($V[$D]+$Uc);$V[$D]=$nf;}return
long2str($V,false);}function
decrypt_string($ne,$y){if($ne=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$V=str2long($ne,false);$D=count($V)-1;$nf=$V[$D];$mf=$V[0];$Dd=floor(6+52/($D+1));$se=int32($Dd*0x9E3779B9);while($se){$pb=$se>>2&3;for($md=$D;$md>0;$md--){$nf=$V[$md-1];$Uc=xxtea_mx($nf,$mf,$se,$y[$md&3^$pb]);$mf=int32($V[$md]-$Uc);$V[$md]=$mf;}$nf=$V[$D];$Uc=xxtea_mx($nf,$mf,$se,$y[$md&3^$pb]);$mf=int32($V[0]-$Uc);$V[0]=$mf;$se=int32($se-0x9E3779B9);}return
long2str($V,true);}$f='';$dc=$_SESSION["token"];if(!$dc)$_SESSION["token"]=rand(1,1e6);$Ie=get_token();$td=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$W){list($y)=explode(":",$W);$td[$y]=$W;}}function
add_invalid_login(){global$b;$p=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$p)return;$tc=unserialize(stream_get_contents($p));$Be=time();if($tc){foreach($tc
as$uc=>$W){if($W[0]<$Be)unset($tc[$uc]);}}$sc=&$tc[$b->bruteForceKey()];if(!$sc)$sc=array($Be+30*60,0);$sc[1]++;file_write_unlock($p,serialize($tc));}function
check_invalid_login(){global$b;$tc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$sc=$tc[$b->bruteForceKey()];$Wc=($sc[1]>29?$sc[0]-time():0);if($Wc>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($Wc/60)));}$ra=$_POST["auth"];if($ra){session_regenerate_id();$Y=$ra["driver"];$P=$ra["server"];$U=$ra["username"];$I=(string)$ra["password"];$h=$ra["db"];set_password($Y,$P,$U,$I);$_SESSION["db"][$Y][$P][$U][$h]=true;if($ra["permanent"]){$y=base64_encode($Y)."-".base64_encode($P)."-".base64_encode($U)."-".base64_encode($h);$Ad=$b->permanentLogin(true);$td[$y]="$y:".base64_encode($Ad?encrypt_string($I,$Ad):"");cookie("adminer_permanent",implode(" ",$td));}if(count($_POST)==1||DRIVER!=$Y||SERVER!=$P||$_GET["username"]!==$U||DB!=$h)redirect(auth_url($Y,$P,$U,$h));}elseif($_POST["logout"]&&(!$dc||verify_token())){foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.'Thanks for using Adminer, consider <a href="https://www.adminer.org/en/donation/">donating</a>.');}elseif($td&&!$_SESSION["pwds"]){session_regenerate_id();$Ad=$b->permanentLogin();foreach($td
as$y=>$W){list(,$Ha)=explode(":",$W);list($Y,$P,$U,$h)=array_map('base64_decode',explode("-",$y));set_password($Y,$P,$U,decrypt_string(base64_decode($Ha),$Ad));$_SESSION["db"][$Y][$P][$U][$h]=true;}}function
unset_permanent(){global$td;foreach($td
as$y=>$W){list($Y,$P,$U,$h)=array_map('base64_decode',explode("-",$y));if($Y==DRIVER&&$P==SERVER&&$U==$_GET["username"]&&$h==DB)unset($td[$y]);}cookie("adminer_permanent",implode(" ",$td));}function
auth_error($k){global$b,$dc;$ce=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$ce]||$_GET[$ce])&&!$dc)$k='Session expired, please login again.';else{restart_session();add_invalid_login();$I=get_password();if($I!==null){if($I===false)$k.=($k?'<br>':'').sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$ce]&&$_GET[$ce]&&ini_bool("session.use_only_cookies"))$k='Session support must be enabled.';$pd=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$pd["lifetime"]);page_header('Login',$k,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$xd)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($ic,$vd)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$vd,$B)&&($B[1]<1024||$B[1]>65535))auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$f=connect();$i=new
Min_Driver($f);}$Hc=null;if(!is_object($f)||($Hc=$b->login($_GET["username"],get_password()))!==true){$k=(is_string($f)?h($f):(is_string($Hc)?$Hc:'Invalid credentials.'));auth_error($k.(preg_match('~^ | $~',get_password())?'<br>'.'There is a space in the input password which might be the cause.':''));}if($_POST["logout"]&&$dc&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}if($ra&&$_POST["token"])$_POST["token"]=$Ie;$k='';if($_POST){if(!verify_token()){$pc="max_input_vars";$Pc=ini_get($pc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$W=ini_get($y);if($W&&(!$Pc||$W<$Pc)){$pc=$y;$Pc=$W;}}}$k=(!$_POST["token"]&&$Pc?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$pc'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$k=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$k.=' '.'You can upload a big SQL file via FTP and import it from server.';}function
email_header($ec){return"=?UTF-8?B?".base64_encode($ec)."?=";}function
send_mail($tb,$qe,$C,$Vb="",$Kb=array()){$j=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$C=str_replace("\n",$j,wordwrap(str_replace("\r","","$C\n")));$Ba=uniqid("boundary");$qa="";foreach((array)$Kb["error"]as$y=>$W){if(!$W)$qa.="--$Ba$j"."Content-Type: ".str_replace("\n","",$Kb["type"][$y]).$j."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$Kb["name"][$y])."\"$j"."Content-Transfer-Encoding: base64$j$j".chunk_split(base64_encode(file_get_contents($Kb["tmp_name"][$y])),76,$j).$j;}$ya="";$fc="Content-Type: text/plain; charset=utf-8$j"."Content-Transfer-Encoding: 8bit";if($qa){$qa.="--$Ba--$j";$ya="--$Ba$j$fc$j$j";$fc="Content-Type: multipart/mixed; boundary=\"$Ba\"";}$fc.=$j."MIME-Version: 1.0$j"."X-Mailer: Adminer Editor".($Vb?$j."From: ".str_replace("\n","",$Vb):"");return
mail($tb,email_header($qe),$ya.$C.$qa,$fc);}function
like_bool($l){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$l["full_type"]);}$f->select_db($b->database());$cd="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$nb[DRIVER]='Login';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$m=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$O=array(idf_escape($_GET["field"]));$K=$i->select($a,$O,array(where($_GET,$m)),$O);$M=($K?$K->fetch_row():array());echo$i->value($M[0],$m[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$m=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$m):""):where($_GET,$m));$Ye=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($m
as$E=>$l){if(!isset($l["privileges"][$Ye?"update":"insert"])||$b->fieldName($l)==""||$l["generated"])unset($m[$E]);}if($_POST&&!$k&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($Ye?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$v=indexes($a);$Te=unique_array($_GET["where"],$v);$Gd="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,'Item has been deleted.',$i->delete($a,$Gd,!$Te));else{$Q=array();foreach($m
as$E=>$l){$W=process_input($l);if($W!==false&&$W!==null)$Q[idf_escape($E)]=$W;}if($Ye){if(!$Q)redirect($A);queries_redirect($A,'Item has been updated.',$i->update($a,$Q,$Gd,!$Te));if(is_ajax()){page_headers();page_messages($k);exit;}}else{$K=$i->insert($a,$Q);$Cc=($K?last_id():0);queries_redirect($A,sprintf('Item%s has been inserted.',($Cc?" $Cc":"")),$K);}}}$M=null;if($_POST["save"])$M=(array)$_POST["fields"];elseif($Z){$O=array();foreach($m
as$E=>$l){if(isset($l["privileges"]["select"])){$oa=convert_field($l);if($_POST["clone"]&&$l["auto_increment"])$oa="''";if($x=="sql"&&preg_match("~enum|set~",$l["type"]))$oa="1*".idf_escape($E);$O[]=($oa?"$oa AS ":"").idf_escape($E);}}$M=array();if(!support("table"))$O=array("*");if($O){$K=$i->select($a,$O,array($Z),$O,array(),(isset($_GET["select"])?2:1));if(!$K)$k=error();else{$M=$K->fetch_assoc();if(!$M)$M=false;}if(isset($_GET["select"])&&(!$M||$K->fetch_assoc()))$M=null;}}if(!support("table")&&!$m){if(!$Z){$K=$i->select($a,array("*"),$Z,array("*"));$M=($K?$K->fetch_assoc():false);if(!$M)$M=array($i->primary=>"");}if($M){foreach($M
as$y=>$W){if(!$Z)$M[$y]=null;$m[$y]=array("field"=>$y,"null"=>($y!=$i->primary),"auto_increment"=>($y==$i->primary));}}}edit_form($a,$m,$M,$Ye);}elseif(isset($_GET["select"])){$a=$_GET["select"];$T=table_status1($a);$v=indexes($a);$m=fields($a);$Tb=column_foreign_keys($a);$bd=$T["Oid"];parse_str($_COOKIE["adminer_import"],$ia);$Qd=array();$e=array();$_e=null;foreach($m
as$y=>$l){$E=$b->fieldName($l);if(isset($l["privileges"]["select"])&&$E!=""){$e[$y]=html_entity_decode(strip_tags($E),ENT_QUOTES);if(is_shortable($l))$_e=$b->selectLengthProcess();}$Qd+=$l["privileges"];}list($O,$r)=$b->selectColumnsProcess($e,$v);$w=count($r)<count($O);$Z=$b->selectSearchProcess($m,$v);$G=$b->selectOrderProcess($m,$v);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Ue=>$M){$oa=convert_field($m[key($M)]);$O=array($oa?$oa:idf_escape(key($M)));$Z[]=where_check($Ue,$m);$L=$i->select($a,$O,$Z,$O);if($L)echo
reset($L->fetch_row());}exit;}$zd=$We=null;foreach($v
as$nc){if($nc["type"]=="PRIMARY"){$zd=array_flip($nc["columns"]);$We=($O?$zd:array());foreach($We
as$y=>$W){if(in_array(idf_escape($y),$O))unset($We[$y]);}break;}}if($bd&&!$zd){$zd=$We=array($bd=>0);$v[]=array("type"=>"PRIMARY","columns"=>array($bd));}if($_POST&&!$k){$kf=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ga=array();foreach($_POST["check"]as$Ea)$Ga[]=where_check($Ea,$m);$kf[]="((".implode(") OR (",$Ga)."))";}$kf=($kf?"\nWHERE ".implode(" AND ",$kf):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Vb=($O?implode(", ",$O):"*").convert_fields($e,$m,$O)."\nFROM ".table($a);$Yb=($r&&$w?"\nGROUP BY ".implode(", ",$r):"").($G?"\nORDER BY ".implode(", ",$G):"");if(!is_array($_POST["check"])||$zd)$J="SELECT $Vb$kf$Yb";else{$Se=array();foreach($_POST["check"]as$W)$Se[]="(SELECT".limit($Vb,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W,$m).$Yb,1).")";$J=implode(" UNION ALL ",$Se);}$b->dumpData($a,"table",$J);exit;}if(!$b->selectEmailProcess($Z,$Tb)){if($_POST["save"]||$_POST["delete"]){$K=true;$ja=0;$Q=array();if(!$_POST["delete"]){foreach($e
as$E=>$W){$W=process_input($m[$E]);if($W!==null&&($_POST["clone"]||$W!==false))$Q[idf_escape($E)]=($W!==false?$W:idf_escape($E));}}if($_POST["delete"]||$Q){if($_POST["clone"])$J="INTO ".table($a)." (".implode(", ",array_keys($Q)).")\nSELECT ".implode(", ",$Q)."\nFROM ".table($a);if($_POST["all"]||($zd&&is_array($_POST["check"]))||$w){$K=($_POST["delete"]?$i->delete($a,$kf):($_POST["clone"]?queries("INSERT $J$kf"):$i->update($a,$Q,$kf)));$ja=$f->affected_rows;}else{foreach((array)$_POST["check"]as$W){$jf="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W,$m);$K=($_POST["delete"]?$i->delete($a,$jf,1):($_POST["clone"]?queries("INSERT".limit1($a,$J,$jf)):$i->update($a,$Q,$jf,1)));if(!$K)break;$ja+=$f->affected_rows;}}}$C=lang(array('%d item has been affected.','%d items have been affected.'),$ja);if($_POST["clone"]&&$K&&$ja==1){$Cc=last_id();if($Cc)$C=sprintf('Item%s has been inserted.'," $Cc");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$C,$K);if(!$_POST["delete"]){edit_form($a,$m,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$k='Ctrl+click on a value to modify it.';else{$K=true;$ja=0;foreach($_POST["val"]as$Ue=>$M){$Q=array();foreach($M
as$y=>$W){$y=bracket_escape($y,1);$Q[idf_escape($y)]=(preg_match('~char|text~',$m[$y]["type"])||$W!=""?$b->processInput($m[$y],$W):"NULL");}$K=$i->update($a,$Q," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Ue,$m),!$w&&!$zd," ");if(!$K)break;$ja+=$f->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$ja),$K);}}elseif(!is_string($Jb=get_file("csv_file",true)))$k=upload_error($Jb);elseif(!preg_match('~~u',$Jb))$k='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($ia["output"])."&format=".urlencode($_POST["separator"]));$K=true;$Oa=array_keys($m);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Jb,$Lc);$ja=count($Lc[0]);$i->begin();$Zd=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$N=array();foreach($Lc[0]as$y=>$W){preg_match_all("~((?>\"[^\"]*\")+|[^$Zd]*)$Zd~",$W.$Zd,$Mc);if(!$y&&!array_diff($Mc[1],$Oa)){$Oa=$Mc[1];$ja--;}else{$Q=array();foreach($Mc[1]as$s=>$La)$Q[idf_escape($Oa[$s])]=($La==""&&$m[$Oa[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$La))));$N[]=$Q;}}$K=(!$N||$i->insertUpdate($a,$N,$zd));if($K)$K=$i->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$ja),$K);$i->rollback();}}}$ve=$b->tableName($T);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $ve",$k);$Q=null;if(isset($Qd["insert"])||!support("table")){$Q="";foreach((array)$_GET["where"]as$W){if($Tb[$W["col"]]&&count($Tb[$W["col"]])==1&&($W["op"]=="="||(!$W["op"]&&!preg_match('~[_%]~',$W["val"]))))$Q.="&set".urlencode("[".bracket_escape($W["col"])."]")."=".urlencode($W["val"]);}}$b->selectLinks($T,$Q);if(!$e&&support("table"))echo"<p class='error'>".'Unable to select the table'.($m?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($O,$e);$b->selectSearchPrint($Z,$e,$v);$b->selectOrderPrint($G,$e,$v);$b->selectLimitPrint($z);$b->selectLengthPrint($_e);$b->selectActionPrint($v);echo"</form>\n";$H=$_GET["page"];if($H=="last"){$o=$f->result(count_rows($a,$Z,$w,$r));$H=floor(max(0,$o-1)/$z);}$Ud=$O;$Xb=$r;if(!$Ud){$Ud[]="*";$Va=convert_fields($e,$m,$O);if($Va)$Ud[]=substr($Va,2);}foreach($O
as$y=>$W){$l=$m[idf_unescape($W)];if($l&&($oa=convert_field($l)))$Ud[$y]="$oa AS $W";}if(!$w&&$We){foreach($We
as$y=>$W){$Ud[]=idf_escape($y);if($Xb)$Xb[]=idf_escape($y);}}$K=$i->select($a,$Ud,$Z,$Xb,$G,$z,$H,true);if(!$K)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$H)$K->seek($z*$H);$vb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$N=array();while($M=$K->fetch_assoc()){if($H&&$x=="oracle")unset($M["RNUM"]);$N[]=$M;}if($_GET["page"]!="last"&&$z!=""&&$r&&$w&&$x=="sql")$o=$f->result(" SELECT FOUND_ROWS()");if(!$N)echo"<p class='message'>".'No rows.'."\n";else{$xa=$b->backwardKeys($a,$ve);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$r&&$O?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Vc=array();$Wb=array();reset($O);$Id=1;foreach($N[0]as$y=>$W){if(!isset($We[$y])){$W=$_GET["columns"][key($O)];$l=$m[$O?($W?$W["col"]:current($O)):$y];$E=($l?$b->fieldName($l,$Id):($W["fun"]?"*":$y));if($E!=""){$Id++;$Vc[$y]=$E;$d=idf_escape($y);$jc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$hb="&desc%5B0%5D=1";echo"<th id='th[".h(bracket_escape($y))."]'>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($jc.($G[0]==$d||$G[0]==$y||(!$G&&$w&&$r[0]==$d)?$hb:'')).'">';echo
apply_sql_function($W["fun"],$E)."</a>";echo"<span class='column hidden'>","<a href='".h($jc.$hb)."' title='".'descending'."' class='text'> ‚Üì</a>";if(!$W["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$Wb[$y]=$W["fun"];next($O);}}$Fc=array();if($_GET["modify"]){foreach($N
as$M){foreach($M
as$y=>$W)$Fc[$y]=max($Fc[$y],min(40,strlen(utf8_decode($W))));}}echo($xa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$H%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($N,$Tb)as$D=>$M){$Te=unique_array($N[$D],$v);if(!$Te){$Te=array();foreach($N[$D]as$y=>$W){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Te[$y]=$W;}}$Ue="";foreach($Te
as$y=>$W){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$m[$y]["type"])&&strlen($W)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$m[$y]["collation"])?$y:"CONVERT($y USING ".charset($f).")").")";$W=md5($W);}$Ue.="&".($W!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($W):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$r&&$O?"":"<td>".checkbox("check[]",substr($Ue,1),in_array(substr($Ue,1),(array)$_POST["check"])).($w||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ue)."' class='edit'>".'edit'."</a>"));foreach($M
as$y=>$W){if(isset($Vc[$y])){$l=$m[$y];$W=$i->value($W,$l);if($W!=""&&(!isset($vb[$y])||$vb[$y]!=""))$vb[$y]=(is_mail($W)?$Vc[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$l["type"])&&$W!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Ue;if(!$_&&$W!==null){foreach((array)$Tb[$y]as$Sb){if(count($Tb[$y])==1||end($Sb["source"])==$y){$_="";foreach($Sb["source"]as$s=>$he)$_.=where_link($s,$Sb["target"][$s],$N[$D][$he]);$_=($Sb["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($Sb["db"]),ME):ME).'select='.urlencode($Sb["table"]).$_;if($Sb["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($Sb["ns"]),$_);if(count($Sb["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$V){if(!array_key_exists($V["col"],$Te))$_.=where_link($s++,$V["col"],$V["val"],$V["op"]);}foreach($Te
as$wc=>$V)$_.=where_link($s++,$wc,$V);}$W=select_value($W,$_,$l,$_e);$t=h("val[$Ue][".bracket_escape($y)."]");$X=$_POST["val"][$Ue][bracket_escape($y)];$rb=!is_array($M[$y])&&is_utf8($W)&&$N[$D][$y]==$M[$y]&&!$Wb[$y];$ze=preg_match('~text|lob~',$l["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$rb)||$X!==null){$ac=h($X!==null?$X:$M[$y]);echo">".($ze?"<textarea name='$t' cols='30' rows='".(substr_count($M[$y],"\n")+1)."'>$ac</textarea>":"<input name='$t' value='$ac' size='$Fc[$y]'>");}else{$Ic=strpos($W,"<i>‚Ä¶</i>");echo" data-text='".($Ic?2:($ze?1:0))."'".($rb?"":" data-warning='".h('Use edit link to modify this value.')."'").">$W</td>";}}}if($xa)echo"<td>";$b->backwardKeysPrint($xa,$N[$D]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($N||$H){$Cb=true;if($_GET["page"]!="last"){if($z==""||(count($N)<$z&&($N||!$H)))$o=($H?$H*$z:0)+count($N);elseif($x!="sql"||!$w){$o=($w?false:found_rows($T,$Z));if($o<max(1e4,2*($H+1)*$z))$o=reset(slow_query(count_rows($a,$Z,$w,$r)));else$Cb=false;}}$nd=($z!=""&&($o===false||$o>$z||$H));if($nd){echo(($o===false?count($N)+1:$o-$H*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($H+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".'Loading'."‚Ä¶');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($N||$H){if($nd){$Nc=($o===false?$H+(count($N)>=$z?2:1):floor(($o-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($H+1)."')); return false; };"),pagination(0,$H).($H>5?" ‚Ä¶":"");for($s=max(1,$H-4);$s<min($Nc,$H+5);$s++)echo
pagination($s,$H);if($Nc>0){echo($H+5<$Nc?" ‚Ä¶":""),($Cb&&$o!==false?pagination($Nc,$H):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Nc'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$H).($H>1?" ‚Ä¶":""),($H?pagination($H,$H):""),($Nc>$H?pagination($H+1,$H).($Nc>$H+1?" ‚Ä¶":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$lb=($Cb?"":"~ ").$o;echo
checkbox("all",1,0,($o!==false?($Cb?"":"~ ").lang(array('%d row','%d rows'),$o):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$lb' : checked); selectCount('selected2', this.checked || !checked ? '$lb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$Ub=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($Ub['sql']);break;}}if($Ub){print_fieldset("export",'Export'." <span id='selected2'></span>");$ld=$b->dumpOutput();echo($ld?html_select("output",$ld,$ia["output"])." ":""),html_select("format",$Ub,$ia["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($vb,'strlen'),$e);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ia["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$Ie'>\n","</form>\n",(!$r&&$O?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$f->query("KILL ".number($_POST["kill"]));elseif(list($S,$t,$E)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$K=$f->query("SELECT $t, $E FROM ".table($S)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$E LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($M=$K->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($S)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($M[0]))."'>".h($M[1])."</a><br>\n";if($M)echo"...\n";}exit;}else{page_header('Server',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Search'."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.'Table','<td>'.'Rows',"</thead>\n";foreach(table_status()as$S=>$M){$E=$b->tableName($M);if(isset($M["Engine"])&&$E!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$S,in_array($S,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($S)."'>$E</a>";$W=format_number($M["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($S)."'>".($M["Engine"]=="InnoDB"&&$W?"~ $W":$W)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();