<div class="col-md-8 col-md-offset-2 corps">
    <h3></h3>
    <h1 class="">Hello <?= isset($name) ? $name : ''; ?></h1>
</div>
<div class="col-md-8 col-md-offset-2 corps">
    <h4>Le code qui a servi à générer cette page</h4>

    <div class="well">
        <h4>Le contrôleur</h4><br/>
        <p>
        <pre>
<span style="color: #ffdb31">/**
 * @Route(/demo/hello/{name})
 */</span>
<span class="m_cle">public function</span> <span class="func">executeHello</span>(HTTPRequest $request, HTTPResponse $response){
    $response-><span class="func">addVar</span>(<span class="str">'name'</span>,$request-><span class="func">get</span>(<span
                    class="str">'name'</span>));
    $response-><span class="func">addVar</span>(<span class="str">'title'</span>, <span
                    class="str">'Hello'</span>.</span>, <span class="str">' '</span>.$request-><span
                    class="func">get</span>(<span class="str">'name'</span>));

    $response-><span class="func">render</span>(<span class="m_cle">__DIR__</span>.<span class="str">'/../Ressources/Views/layout.php'</span>, __DIR__.<span
                    class="str">'/../Ressources/Views/Demo/hello.php'</span>);
}       </pre>
        <br/>
        <h4>La vue</h4><br/>
        <p>
        <pre>
<?= htmlspecialchars('<div class="col-md-8 col-md-offset-2 corps">
    <h1 class="">Hello <?= isset($name)?$name:\'\';?></h1>
</div>'); ?>
        </pre>
        </p>
    </div>
</div>
