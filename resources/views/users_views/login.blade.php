@vite('resources/css/user_styles/forms.css')
<nav class="navbar">
                <div class="navbar-brand">
                    <a href={{ route('login') }}>PostCity</a>
                </div>

                <div class="navbar-links">
                    <a href="{{ route('user.showRegister') }}">Registrarse</a>
                </div>
    </nav>
<main class="main__login">
    <form class="login__login_form {{ $errors->any() ? 'login__login_form-error' : '' }}" action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" id="input_email" name="email" placeholder="Enter email">
            @error('email') <small class="login_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="input_password" name="password" placeholder="Contraseña">
            @error('password') <small class="login_form__error">{{ $message }}</small> @enderror
            @error('credentials') <small class="login_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="btn form-group align-self-center">
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
    </form>
</main>