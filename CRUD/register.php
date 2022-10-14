<link rel="stylesheet" type="text/css" href="style.css">
<form class="formLogin" method="post" action="" name="signup-form">
    <div class="form-element">
        <label class="labelLogin">Username</label>
        <input class="inputLogin" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label class="labelLogin">Email</label>
        <input class="inputLogin" type="email" name="email" required />
    </div>
    <div class="form-element">
        <label class="labelLogin">Password</label>
        <input class="inputLogin" type="password" name="password" required />
    </div>
    <button class="buttonLogin" type="submit" name="register" value="register">Register</button>
</form>