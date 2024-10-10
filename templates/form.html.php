<div class="form">
    <form method="post">
        <div class="form-control">
            <input type="text" name="name" placeholder="Imię" value="<?php if(isset($_POST['name']) && $isError): echo $_POST['name']; endif; ?>" require>
        </div>
        <div class="form-control">
            <input type="text" name="surname" placeholder="Nazwisko" value="<?php if(isset($_POST['surname']) && $isError): echo $_POST['surname']; endif; ?>" require/>
        </div>
        <div class="form-control">
            <input type="email" name="email" placeholder="Adres E-mail" value="<?php if(isset($_POST['email']) && $isError): echo $_POST['email']; endif; ?>" require>
        </div>
        <div class="form-control">
            <input type="password" name="password" placeholder="Hasło" require />
        </div>                        
        <div class="form-control">
            <input type="password" name="password2" placeholder="Powtórz hasło" require />
        </div>
        <dvi class="buttons">
            <button type="submit" name="submit">Wyślij</button>
        </div>
    </form>
    <div class="clear"></div>
</div>