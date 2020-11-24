<div class="col-md-8 col-md-offset-2 corps">
    <h5 class="" STYLE="font-weight: bold;">ETAPE 1 ><span
                style="background-color: #ACCD4A;color: #fafafa;">ETAPE 2</span></h5>
    <h2 style="font-weight: bold;">Global Secret</h2>
    <p>Le <span style="font-weight: bold;">Global Secret</span> pour votre site (il sera utilisé pour la protection
        contre la faille CSRF ainsi que d'autres choses):
    </p>
    <p>
    <div class="row">
        <form method="post" action="" class="form-inline" style="margin-left: 10px !important;">
            <label style="margin-left: 5px !important;">Secret</label><br/>
            <input type="text" name="secret" class="form-control"
                   style="width: 250px !important;border: solid 1px !important;margin-left: 5px !important;"
                   required="required"/>
            <input type="button" class="btn btn-success" value="Generate" id="generate">
            <br/><br/>
            <br/>
            <button type="submit" class="btn btn-default" style="margin-left: 5px !important;">Etape Suivant</button>
        </form>
    </div>

    <script type="application/javascript">
        var generate = document.getElementById('generate');
        var global_secret = document.getElementsByTagName('input')[0];

        generate.onclick = function () {
            var xhr = new XMLHttpRequest;
            var lance = encodeURIComponent('true');

            xhr.open('GET', '/app_dev/_configurator/step/1/1');
            xhr.send(null);
            xhr.onreadystatechange = function () {

                // Le 4 répresente l'etat de la requête qu'on peut aussi récuperer par la proprièté xhr.DONE
                if (xhr.readyState === 4 && xhr.status === 200) {
                    global_secret.value = JSON.parse(xhr.responseText);
                }
            }
        }
    </script>
    <br/>
</div>
