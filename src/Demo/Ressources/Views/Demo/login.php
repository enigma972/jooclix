<div class="col-md-8 col-md-offset-2 corps">
    <?php if (isset($_SESSION['connected'])) {
        echo '<p class="well" style="margin-top: 15px;">Vous étès connecté ! <a href="/demo/login?logout=true">se déconnecter</a></p>';
    } else { ?>
        <h4 class="">Login</h4>
        <form class="col-md-4 well" method="post">
            <input type="text" name="name" class="form-control" placeholder="user"/>
            <input style="margin-top: 2px;" type="password" name="pass" class="form-control" placeholder="pass"/>
            <input style="margin-top: 2px;" type="submit" value="Login" class="btn btn-default"/>
        </form>
    <?php } ?>

</div>
<div class="col-md-8 col-md-offset-2 corps">
    <h4>Le code qui a servi à générer cette page</h4>
    <div class="well">
        <h4>Le contrôleur</h4>
        <p>
        <pre>
<span style="color: #ffdb31">/**
 * @Route(/demo/login)
 */</span>
<span class="m_cle">public function</span> <span class="func">executeLogin</span>(<span
                    class="var">HTTPRequest $request</span>, <span class="var">HTTPResponse $response</span>){
       $response-><span class="func">addVar</span>(<span class="str">'title'</span>, <span class="str">'Login'</span>);

       <span class="m_cle">if</span>($request-><span class="func">getMethod</span>() == <span class="str">'POST'</span>){
        <span class="m_cle">if</span> ($request-><span class="func">postExist</span>(<span class="str">'name'</span>) && $request-><span
                    class="func">postExist</span>(<span class="str">'pass'</span>)){
            <span class="m_cle">if</span> ($request-><span class="func">post</span>(<span class="str">'name'</span>) == <span
                    class="str">'user'</span> && $request-><span class="func">post</span>(<span
                    class="str">'pass'</span>) == <span class="str">'pass'</span>){
                $response-><span class="func">setSession</span>(<span class="str">'connected'</span>, <span
                    class="m_cle">true</span>);
            }
        }
    }
    <span class="m_cle">if</span>($request-> <span class="func">getMethod</span>() == <span class="str">'GET'</span>){
        <span class="m_cle">if</span>($request-><span class="func">get</span>(<span
                    class="str">'logout'</span>) == <span class="m_cle">true</span>)
            $response-><span class="func">setSession</span>(<span class="str">'connected'</span>, <span class="m_cle">null</span>);
        }

    $response-><span class="func">render</span>(__DIR__.<span class="str">'/../Ressources/Views/layout.php'</span>, __DIR__.<span
                    class="str">'/../Ressources/Views/Demo/login.php'</span>);
}</pre>
        </p>

        <h4>La vue</h4><b/>
        <p>
        <pre>
<?= htmlspecialchars('<div class="col-md-8 col-md-offset-2 corps">
    <?php if(isset($_SESSION[\'connected\'])){
        echo \'<p class="well" style="margin-top: 15px;">Vous étès connecté ! <a href="/demo/login?logout=true">se déconnecter</a></p>\';
    }else{ ?>
        <h4 class="">Login</h4>
        <form class="col-md-4 well" method="post">
            <input type="text" name="name" class="form-control" placeholder="user"/>
            <input style="margin-top: 2px;" type="password" name="pass" class="form-control" placeholder="pass"/>
            <input style="margin-top: 2px;" type="submit" value="Login" class="btn btn-default"/>
        </form>
    <?php } ?>'); ?>

<?= htmlspecialchars('</div>'); ?>
            </pre>
        </p>
    </div>
</div>
