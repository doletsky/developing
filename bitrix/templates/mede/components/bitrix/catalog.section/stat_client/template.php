<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<pre><?//print_r($arResult)?></pre>

<?

$arTabl=$arParams['SECTION_USER_FIELDS']['ADDS'];
//array_splice($arTabl, 0, 1);

foreach($arResult["ITEMS"] as $cell=>$arElement):?>
<?$tid=explode('_',$arElement['CODE']);
$arTabl[$arElement['~IBLOCK_SECTION_ID']][$tid[3]]['NAME']=$arElement['NAME'];
$arTabl[$arElement['~IBLOCK_SECTION_ID']]['ID']=$tid[2];
$arTabl[$arElement['~IBLOCK_SECTION_ID']][$tid[3]]['stat']=$arElement['PROPERTIES']['OK_NUM']['VALUE'];
?>
<?endforeach;?>
<?$arTabl["pid"]=$tid[1];;?>
<?$arDep=array();?>
<?
foreach($arParams['SECTION_USER_FIELDS']['ADDS'] as $k=>$v)$arDep[$v['UF_DEP']][]=$k;
array_splice($arDep, 0, 1);
?>
<?
$arStat=array();
$arStatP=array();
$tabl=$arTabl;

?>
<?
foreach($tabl as $p=>$sc){
 
 foreach($sc as $k=>$v){
  if(is_array($v)){
   $arStat[$k]['NAME']=$v['NAME'];
   $n=explode('/',$v['stat']);
   if(!$n[0]){$arStat[$k]['zero'][]=1;$arStatP[$p]['zero'][]=1;}
   else if($n[0]==$n[1]){$arStat[$k]['full'][]=1;$arStatP[$p]['full'][]=1;}
        else {$arStat[$k]['half'][]=1;$arStatP[$p]['half'][]=1;}}

} 

}
?><pre><?//print_r($arTabl)?></pre>
<table id="stat">
<tr class="vsbl"><td value=""></td><td><div></div></td><td><div value="Дата">Дата</div></td>
<?
foreach($arStat as $k=>$v)
{?><td><div value="<?=$arStat[$k]['NAME']?>"><?=$arStat[$k]['NAME']?></div></td><?}
?>
<td><div value="Всего">Всего</div></td>
</tr>
<?
$did=0;
foreach($arDep as $k=>$v)
{$did++;
?>
<tr class="vsbl"><td><input type="checkbox" name="i<?=$did?>"/></td><td><div onclick="on('d<?=$did?>');" value="<?=$k?>"><?=$k?></div></td><td><div></div></td>
<?for($u=0;$u<count($arStat)+1;$u++){?><td><div></div></td><?}?></tr>
<?foreach($v as $id):
$dt= substr($arTabl[$id]['SORT'], -2, 2).'.'.substr($arTabl[$id]['SORT'], -4, 2).'.'.substr($arTabl[$id]['SORT'], 2, 2);
?>
<tr id="rd<?=$did?>" name="rd<?=$did?>" class="vsbl"><td><span class="td<?=$did?>"><input type="checkbox" name="mi<?=$did?>" value="<?=$arTabl["pid"]?>_<?=$arTabl[$id]['ID']?>"/></span></td><td><div class="td<?=$did?>" name="fio" value="<?=$arTabl[$id]['NAME']?>"><?=$arTabl[$id]['NAME']?></div></td><td><div class="td<?=$did?>" name="data" value="<?=$dt?>"><?=$dt?></div></td>
<?foreach($arStat as $kst=>$vst):
$fhz=explode("/",$arTabl[$id][$kst]['stat']);
$zz=0; $hh=0; $ff=0;
if($fhz[0]==0)$zz=1;
elseif($fhz[0]<$fhz[1])$hh=1;
else $ff=1;?>
 <td><div class="td<?=$did?> ts<?=$kst?>" tid="<?=$kst?>" zr="<?=$zz?>" hl="<?=$hh?>" fl="<?=$ff?>" value="<?=$arTabl[$id][$kst]['stat']?>"><?=$arTabl[$id][$kst]['stat']?></div></td>
<?endforeach;?>
<td><div class="td<?=$did?>" name="tsum" full="<?=count($arStatP[$id]['full'])?>" half="<?=count($arStatP[$id]['half'])?>" zero="<?=count($arStatP[$id]['zero'])?>" value="<?=count($arStatP[$id]['full'])?>/<?=count($arStatP[$id]['half'])?>/<?=count($arStatP[$id]['zero'])?>"><?=count($arStatP[$id]['full'])?>/<?=count($arStatP[$id]['half'])?>/<?=count($arStatP[$id]['zero'])?></div></td></tr>
<?endforeach;
}
?>
<tr class="vsbl"><td></td><td><div></div></td><td><div></div></td>
<?
foreach($arStat as $k=>$v)
{?><td><div class="tst" tnum="<?=$k?>" value="<?=count($arStat[$k]['full'])?>/<?=count($arStat[$k]['half'])?>/<?=count($arStat[$k]['zero'])?>"><span class="tnum" name="fl"><?=count($arStat[$k]['full'])?></span>/<span class="tnum" name="hl"><?=count($arStat[$k]['half'])?></span>/<span class="tnum" name="zr"><?=count($arStat[$k]['zero'])?></span></div></td><?}
?>
<td><div id="resum"><span class="tnum" name="fl"></span>/<span class="tnum" name="hl"></span>/<span class="tnum" name="zr"></span></div></td></tr>
</table>

<a href="#" onclick="tocsv();">Скачать</a><br /><div id="lfile"></div>
<a href="#" onclick="reset();">Сбросить фильтр</a><br />
<form action="javascript:dat(this);" method="POST" name="form1">
Дата: <?echo CalendarDate("dtt", ConvertTimeStamp(), "form1", "12", "class=\"my_input\"")?><input id="fd" type="submit" value="искать" />
</form><br />
<div>ФИО: <input id="fio" type="text" value="" /><input id="fsbm" type="submit" value="искать" /></div><br />
<a href="#" id="rep1"><?if($_GET['US']):?>Сводный отчет <?else:?>Индивидуальные отчеты <?endif?>PDF</a><br />
<a href="#" id="rep2">Общестатистический отчет</a>


<script>
$('#fsbm').click(function(){
 var fio=$('#fio').val();

 $('#stat tr.vsbl div[name="fio"]').each(function (i) {
  var flag=true;
  if($(this).html()==fio)flag=false;
    if(flag){
  var iid=$(this).parents('tr.vsbl').attr('id');
  var ttd=iid.slice(1);
  $(this).parents('tr.vsbl').children('td').children('.t'+ttd).css('display','none');
  $(this).parents('tr.vsbl').attr('class','novsbl');
  }
 });

 $('#stat tr.vsbl').children('td').children('div.tst').each(function (i) {
    var num=$(this).attr('tnum');
    tnums(num);
 });

tres();
});

$('#stat input:checkbox').click(function(){
 var dnm=$(this).attr('name');
 var chd=$(this).attr('checked');
 if(chd) $('#stat input:checkbox[name="m'+dnm+'"]').attr('checked','checked');
 else $('#stat input:checkbox[name="m'+dnm+'"]').attr('checked','');
});

$('#stat .tnum').click(function(){
 var nst=$(this).attr('name');
 var vst=$(this).html();
 var v=0;if(vst==0)v=1;
 
if($(this).parents('div').attr('class')=='tst'){

 var idt=$(this).parents('div.tst').attr('tnum');
 $('#stat tr.vsbl .ts'+idt+'['+nst+'="'+v+'"]').each(function (i) {
  var iid=$(this).parents('tr.vsbl').attr('id');
  var ttd=iid.slice(1);
  $(this).parents('tr.vsbl').children('td').children('.t'+ttd).css('display','none');
  $(this).parents('tr.vsbl').attr('class','novsbl');
 });

}
else{

$('#stat tr.vsbl').children('td').children('div[name="tsum"]').each(function (i) {
  var flag=true;
  var fl=parseInt($(this).attr('full'));
  var hl=parseInt($(this).attr('half'));
  var zr=parseInt($(this).attr('zero'));
   var ff=0;if(fl>0 && hl==0 && zr==0)ff=1;
   var hh=0;if(hl>0 || (fl>0 && zr>0))hh=1;
   var zz=0;if(fl==0 && hl==0 && zr>0)zz=1;
   if(nst=='fl' && v!=ff)flag=false;
   if(nst=='hl' && v!=hh)flag=false;
   if(nst=='zr' && v!=zz)flag=false;
    if(flag){
  var iid=$(this).parents('tr.vsbl').attr('id');
  var ttd=iid.slice(1);
  $(this).parents('tr.vsbl').children('td').children('.t'+ttd).css('display','none');
  $(this).parents('tr.vsbl').attr('class','novsbl');
  }
});

}

 $(this).parents('tr.vsbl').children('td').children('div.tst').each(function (i) {
    var num=$(this).attr('tnum');
    tnums(num);
});

tres();
});

function dat(el){
 
 var str=$('input#dtt').attr('value');
 //var pos = str.indexOf(':');
 var al=str.slice(0,6)+str.slice(-2);
 $('#stat tr.vsbl div[name="data"]').each(function (i) {
  var flag=true;
  if($(this).attr('value')==al)flag=false;
    if(flag){
  var iid=$(this).parents('tr.vsbl').attr('id');
  var ttd=iid.slice(1);
  $(this).parents('tr.vsbl').children('td').children('.t'+ttd).css('display','none');
  $(this).parents('tr.vsbl').attr('class','novsbl');
  }
 });
 $('#stat tr.vsbl').children('td').children('div.tst').each(function (i) {
    var num=$(this).attr('tnum');
    tnums(num);
 });

tres();
//return false;
}

function tocsv(){
var st="";
 $('#stat tr.vsbl').each(function (i) {
 var flag=1;
    $(this).children('td').each(function(j){var dv=$(this).children('div').attr('value');
                                             st+=dv+';';});
    st+='\n';
                                  });
 //alert(st);
 $.post("tocsv.php", { str: st, par: <?=$APPLICATION->get_cookie("UID");?>},
  function(data){
    $('#lfile').html(data);
  });
}

function on(id){
 var vis=$('.t'+id).css('display');
 if(vis=='none') {$('.t'+id).css('display','block');$('tr[name="r'+id+'"]').attr('class','vsbl');}
 else {$('.t'+id).css('display','none');$('tr[name="r'+id+'"]').attr('class','novsbl');}
 var num='';
 $('.tst').each(function (i) { 
  num=$(this).attr('tnum');
  tnums(num);
 });
tres();

}

function tnums(g){
  var num=g;
  var full=0;var half=0;var zero=0;
  $("div[tnum='"+num+"'] span[name='fl']").html(full);
  $("div[tnum='"+num+"'] span[name='hl']").html(half);
  $("div[tnum='"+num+"'] span[name='zr']").html(zero);
  $("div[tnum='"+num+"']").attr('value',full+'/'+half+'/'+zero);
  var tss='';
  $('#stat tr.vsbl .ts'+num).each(function (j) {
   tss=$(this).attr('value');
   var pos = tss.indexOf('/');
   var en=tss.slice(0,pos);
   var al=tss.slice(pos+1);
   if(parseInt(en)==parseInt(al))full++;
    else if(parseInt(en)>0)half++;
         else zero++;
  $("div[tnum='"+num+"'] span[name='fl']").html(full);
  $("div[tnum='"+num+"'] span[name='hl']").html(half);
  $("div[tnum='"+num+"'] span[name='zr']").html(zero);
   $("div[tnum='"+num+"']").attr('value',full+'/'+half+'/'+zero);

  });
}

function tres() { 
 var f=0;
 var h=0;
 var z=0;
  $('#stat tr.vsbl div[name="tsum"]').each(function (l) {
 var fl=$(this).attr('full');
 var hl=$(this).attr('half');
 var zr=$(this).attr('zero');
   var h1=h2=0;
   if(hl==0 && zr==0){f++;h1=1;}
   if(hl==0 && fl==0){z++;h2=1;}
   if(h1==0 && h2==0) h++;



  $("div#resum span[name='fl']").html(f);
  $("div#resum span[name='hl']").html(h);
  $("div#resum span[name='zr']").html(z);                                                });
  $("div#resum").attr('value',f+'/'+h+'/'+z);
}

function reset(){
 $('#stat tr.novsbl').children('td').children().css('display','block');
 $('#stat tr.novsbl').attr('class','vsbl');
 var num='';
 $('.tst').each(function (i) { 
  num=$(this).attr('tnum');
  tnums(num);
 });
 tres();
}


$(document).ready(function () {
 tres();
 });
</script>
