
<div class="connexion">

    <div class="row connexion-wrapper">
        <div class="connexion-title">
            Espace Membre
        </div>
        <div class="connexion-wrapper-party row">
            <div class="connexion-child-1">
                <form class="connexion-form row" method="post" action="" id="act_form">

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control mouse email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control mouse" name="act_code" placeholder="Code d'activation">
                    </div>

                    <div class="form-group input-captchat-wrapper">
                        <input id="submit" type="text" class="form-control" name="captcha" placeholder="stamp code">
                        <img src="/outils/Images/captcha.png">
                    </div>
                    <div class="repress-child"></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-submit-loggin" type="submit" onclick="activateAccount('#act_form');return false;">Activer votre compte</button>
                    </div>
                        <button class="btn btn-primary btn-submit-loggin" type="button" onclick="resendCode('#act_form .email');return false;">Renvoyer le code</button>
                </form>
            </div>
            <div class="key-visuel">
                <div class="keyboard row">
                    <ul class="keyboard-body">

                        <li class="btn-pt aranger car carMin keyLetter key">`</li>


                        <li class="btn-pt car keyLetter key">1</li>


                        <li class="btn-pt car keyLetter key">2</li>


                        <li class="btn-pt car keyLetter key">3</li>


                        <li class="btn-pt car keyLetter key">4</li>


                        <li class="btn-pt car keyLetter key">5</li>


                        <li class="btn-pt car keyLetter key">6</li>


                        <li class="btn-pt car keyLetter key">7</li>


                        <li class="btn-pt car keyLetter key">8</li>


                        <li class="btn-pt car keyLetter key">9</li>


                        <li class="btn-pt car keyLetter key">0</li>


                        <li class="btn-pt car carMin keyLetter key">-</li>


                        <li class="btn-pt car carMin keyLetter key">=</li>


                        <li class="btn-gd keyDelete key">delete</li><br>

                    </ul>
                    <ul class="keyboard-body">

                        <li class="btn-gd rand2 rand2pt keyTab key">tab</li>


                        <li class="btn-pt rand2pt letter keyLetter key">q</li>


                        <li class="btn-pt rand2pt letter keyLetter key">w</li>


                        <li class="btn-pt rand2pt letter keyLetter key">e</li>


                        <li class="btn-pt rand2pt letter keyLetter key">r</li>


                        <li class="btn-pt rand2pt letter keyLetter key">t</li>


                        <li class="btn-pt rand2pt letter keyLetter key">y</li>


                        <li class="btn-pt rand2pt letter keyLetter key">u</li>


                        <li class="btn-pt rand2pt letter keyLetter key">i</li>


                        <li class="btn-pt rand2pt letter keyLetter key">o</li>


                        <li class="btn-pt rand2pt letter keyLetter key">p</li>


                        <li class="btn-pt rand2pt car carMin keyLetter key">[</li>


                        <li class="btn-pt rand2pt car carMin keyLetter key">]</li>


                        <li class="btn-pt rand2pt car carMin keyLetter key">\</li><br>


                    </ul>
                    <ul class="keyboard-body">
                        <li class="btn-gds caps-locks Min keyCaps">caps locks</li>
                        <li class="btn-pt letter keyLetter key">a</li>
                        <li class="btn-pt letter keyLetter key">s</li>
                        <li class="btn-pt letter keyLetter key">d</li>
                        <li class="btn-pt letter keyLetter key">f</li>
                        <li class="btn-pt letter keyLetter key">g</li>
                        <li class="btn-pt letter keyLetter key">h</li>
                        <li class="btn-pt letter keyLetter key">j</li>
                        <li class="btn-pt letter keyLetter key">k</li>
                        <li class="btn-pt letter keyLetter key">l</li>
                        <li class="btn-pt car carMin keyLetter key">;</li>

                        <li class="btn-gd keyReturn">return</li>

                    </ul>
                    <ul class="keyboard-body">
                        <li class="btn-gd shift shifs-val keyShift">shift</li>
                        <li class="btn-pt letter keyLetter key">z</li>
                        <li class="btn-pt letter keyLetter key">x</li>
                        <li class="btn-pt letter keyLetter key">c</li>
                        <li class="btn-pt letter keyLetter key">v</li>
                        <li class="btn-pt letter keyLetter key">b</li>
                        <li class="btn-pt letter keyLetter key">n</li>
                        <li class="btn-pt letter keyLetter key">m</li>
                        <li class="btn-pt car carMin keyLetter key">,</li>
                        <li class="btn-pt car carMin keyLetter key">.</li>
                        <li class="btn-pt car carMin keyLetter key">'</li>
                        <li class="btn-pt car carMin keyLetter key">/</li>
                        <li class="btn-gd shift shifs-val keyShift">shift</li>
                    </ul>
                    <ul class="keyboard-body">
                        <li class="btn-gdsp keySpace key">Space</li>
                    </ul>
                </div>
                <div class="repress-child row">

                </div>
                <div class="keyboard-footer row">
                    <div class="child child-1-keyboard">
                        <a href="">
                            Récupérer votre password
                        </a>
                    </div>
                    <div class="child child-2-keyboard">
                        <a href="">
                            Récupérer votre Username
                        </a>
                    </div>
                </div>
            </div>
        </div><!--end wrapper party-->
    </div>
</div>