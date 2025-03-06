@vite('resources/css/user_styles/forms.css')
<header>
<nav class="navbar">
        <div class="navbar-brand">
            <a href="{{ route('login') }}">PostCity</a>
        </div>

        <div class="navbar-links">
            <a href="{{ route('login') }}">Iniciar Sesión</a>
        </div>
</nav>
</header>
<main class="main__register">
    <form class="register__register_form {{ $errors->any() ? 'register__register_form-error' : '' }}" action="{{ route('user.doRegister') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input class="form-control" type="text" name="name" placeholder="Enter name">
            @error('name') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" placeholder="Enter email">
            @error('email') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="input_password" name="password" placeholder="Password">
            @error('password') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="repeat_password">Repite la contraseña</label>
            <input type="password" class="form-control" id="input_repeat_password" name="password_repeat" placeholder="Repeat password">
            @error('repeat_password') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <button type="reset" class="btn btn-danger">Reiniciar</button>
        </div>
    </form>
</main>