<div class="col-md-8 col-md-offset-2 corps">
    <h5 class="" STYLE="font-weight: bold;"><span style="background-color: #ACCD4A;color: #fafafa;">ETAPE 1 </span> >
        ETAPE 2</h5>
    <h2>Configurer votre base de données</h2>
    <p>Si votre projet utilise une base de données configurer-le ici.</p>
    <br/>
    <p>
    <div class="row">
        <form method="post" action="">
            <div class="col-md-4 col-md-offset-1">
                <label>Driver</label><br/>
                <select name="driver">
                    <option value="pdo_mysql">MySQL (PDO)</option>
                    <option value="pdo_postgresql">PostgreSQL (PDO)</option>
                    <option value="sqlserver">SQL Server (PDO)</option>
                    <option value="pdo_mongodb">MongoDB (PDO)</option>
                </select><br/><br/>
                <label>Host</label><br/>
                <input type="text" name="host"/><br/><br/>
                <label>Name</label><br/>
                <input type="text" name="name"/><br/><br/>
                <label>Port</label><br/>
                <input type="text" name="port" value="3306"/><br/><br/>

                <button type="submit" class="btn btn-default">Etape Suivant</button>
            </div>
            <div class="col-md-4">
                <label>User</label><br/>
                <input type="text" name="user"/><br/><br/>
                <label>Password</label><br/>
                <input type="password" name="password"/><br/><br/>
                <label>Comfirm Password</label><br/>
                <input type="password" name="c_password"/><br/>
            </div>
        </form>
    </div>
    <br/>

    </p>

    <style>
        input, select {
            width: 180px !important;
        }
    </style>
</div>