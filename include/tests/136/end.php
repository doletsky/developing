<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<div class="catalog-section">
���������� ��� �� ��������� �����.<br />
����� <span id="timer">30</span> ���. �� ��������� � ������ ��������.<br />
���� ������ ��������� ����� ������, ������� <a href="/cabinet_sotrudnica/">����</a>.
</div>
<script>
var p=30;
function lr(){
 p=p-1;
 if(p>0){
 $('#timer').html(p);
 tm();}
 else location.href='/cabinet_sotrudnica/';
}

function tm(){
 setTimeout(lr,1000);
}

var param='<?=substr($APPLICATION->GetCurPageParam(),32);?>';
$.post('/include/tests/<?=$_REQUEST["TID"]?>/testoff.php',{param:param});
var t=30;
setTimeout(lr,1000);

</script>