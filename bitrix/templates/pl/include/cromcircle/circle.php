<div class="full-width-circle">


    <div class="circle col-1-2">
        <div class="circle-pos">
            <div class="circle-help active-help">
                <div class="circle-help-text">Перемещайте<?if($PC==1):?> мышкой<?endif?> эту плашку для выбора основного цвета</div>
                <div class="fa fa-mail-reply str"></div>
            </div>
            <div class="container">
                <div class="sector"></div>
                <div class="sector r2"></div>
                <div class="sector r3"></div>
                <div class="sector r4"></div>
                <div class="sector r5"></div>
                <div class="sector r6"></div>
                <div class="sector r7"></div>
                <div class="sector r8"></div>
                <div class="sector r9"></div>
                <div class="sector r10"></div>
                <div class="sector r11"></div>
                <div class="sector r12"></div>
            </div>
            <div class="container c2">
                <div class="sector r1"></div>
                <div class="sector r2"></div>
                <div class="sector r3"></div>
                <div class="sector r4"></div>
                <div class="sector r5"></div>
                <div class="sector r6"></div>
                <div class="sector r7"></div>
                <div class="sector r8"></div>
                <div class="sector r9"></div>
                <div class="sector r10"></div>
                <div class="sector r11"></div>
                <div class="sector r12"></div>
            </div>
            <div class="container c3">
                <div class="sector r1"></div>
                <div class="sector r2"></div>
                <div class="sector r3"></div>
                <div class="sector r4"></div>
                <div class="sector r5"></div>
                <div class="sector r6"></div>
                <div class="sector r7"></div>
                <div class="sector r8"></div>
                <div class="sector r9"></div>
                <div class="sector r10"></div>
                <div class="sector r11"></div>
                <div class="sector r12"></div>
            </div>
            <div class="container c4">
                <div class="sector r1"></div>
                <div class="sector r2"></div>
                <div class="sector r3"></div>
                <div class="sector r4"></div>
                <div class="sector r5"></div>
                <div class="sector r6"></div>
                <div class="sector r7"></div>
                <div class="sector r8"></div>
                <div class="sector r9"></div>
                <div class="sector r10"></div>
                <div class="sector r11"></div>
                <div class="sector r12"></div>
            </div>
            <div class="container c5">
                <div class="sector r1"></div>
                <div class="sector r2"></div>
                <div class="sector r3"></div>
                <div class="sector r4"></div>
                <div class="sector r5"></div>
                <div class="sector r6"></div>
                <div class="sector r7"></div>
                <div class="sector r8"></div>
                <div class="sector r9"></div>
                <div class="sector r10"></div>
                <div class="sector r11"></div>
                <div class="sector r12"></div>
            </div>
            <div class="container c6">
                <div style="position: relative">
                    <div class="triod triod10" id="triod10"></div>
                    <div class="triod triod41 active" id="triod41"></div>
                    <div class="triod triod33" id="triod33"></div>
                    <div class="triod triod17" id="triod17"></div>
                </div>


            </div>
            <div class="dragP1" id="dragP1"></div>
            <div class="dragP2" id="dragP2"></div>
            <div class="dragP2" id="dragP3"></div>

        </div>

    </div>
    <?if($PC==1):?>
    <div class="col-1-2">
        <div id="imgColor">
            <img src="bitrix/templates/pl/images/examPalitra3.png">
            <div class="p1 p-border"></div>
            <div class="p2 p-border"></div>
            <div class="p3 p-border"></div>
            <div class="p4 p-border"></div>
            <div class="p5 p-background"></div>
            <div class="p6 p-background"></div>
            <div class="p7 p-background"></div>
            <div class="s1 s-border"></div>
            <div class="s2 s-background"></div>
            <div class="s3 s-border"></div>
            <div class="s4 s-background"></div>
            <div class="t1 t-background"></div>
            <div class="t2 t-background"></div>
            <div class="t3 t-border"></div>
            <div class="t4 t-background"></div>
            <div class="t5 t-background"></div>
            <div class="t6 t-border"></div>
        </div>
    </div>
    <?endif?>
    <div class="check_gamma">
        <div class="gamma-help active-help">
            <div class="gamma-help-text">Выбирайте схему</div>
            <div class="fa fa-share str"></div>
        </div>
        <div>
            <input name="triod_ch" type="radio" id="triod10" data-k="1.5715">
            <img src="bitrix/templates/pl/images/cromcircle/compl.jpg"><br>
            <span>Комплементарная схема</span>
        </div>
        <div>
            <input name="triod_ch" type="radio" id="triod41" checked="checked" data-k="1.05">
            <img src="bitrix/templates/pl/images/cromcircle/compl_triad.jpg"><br>
            <span style="font-weight: bold">Комплементарная триадная схема</span>
        </div>

        <div>
            <input name="triod_ch" type="radio" id="triod33" data-k="0.52">
            <img src="bitrix/templates/pl/images/cromcircle/triad.jpg"><br>
            <span>Триадная схема</span>
        </div>
        <div>
            <input name="triod_ch" type="radio" id="triod17" data-k="-1.05">
            <img src="bitrix/templates/pl/images/cromcircle/analog.jpg"><br>
            <span>Аналоговая схема</span>
        </div>

    </div>
    <div class="colorPBox"><a name="colorpbox"></a>
        <div class="cBox-help active-help">
            <div class="cBox-help-text">Нажмите, чтобы поменять основной или дополнительные цвета между собой.</div>
            <div class="fa fa-mail-reply str"></div>
        </div>
        <div class="colorP1" id="colorP1"></div>
        <div class="colorP2" id="colorP2"></div>
        <div class="colorP3" id="colorP3"></div>
        <input id="rotColor1" type="button" value="ПОМЕНЯТЬ">
        <input id="rotColor2" type="button" value="ПОМЕНЯТЬ">
        <input id="rotColor3" type="button" value="ПОМЕНЯТЬ">
    </div>



</div>




