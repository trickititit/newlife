<div class="box-typical box-typical-padding">
    @if (isset($user))
        <h1>Профиль {{ $user->name }}</h1>
    @else
        <h1>Создание нового пользователя</h1>
    @endif
    {!! Form::open(["url" => (isset($user->id)) ? route('user.update',['user'=>$user->id]) : route('user.store'), 'method' => "POST", "id" => "userCreate"]) !!}
    <div class="col-md-6">
    <div class="form-group">
        <label for="login">Логин</label>
    {!! Form::text('login', isset($user->login)? $user->login : old("login"), ['id'=>'login', "class" => "form-control", "required" => ""]) !!}
    </div>
    <div class="form-group">
        <label for="name">Имя</label>
    {!! Form::text('name', isset($user->name)? $user->name : old("name"), ['id'=>'name', "class" => "form-control", "required" => ""]) !!}
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
    {!! Form::password('password', ['id'=>'password', "class" => "form-control"]) !!}
        <small class="form-text text-muted">Для смены пароля заполните поле</small>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Повтор пароля</label>
        {!! Form::password('password_confirmation', ['id'=>'password_confirmation', "class" => "form-control"]) !!}
        <small class="form-text text-muted">Для смены пароля заполните поле</small>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
    {!! Form::email('email', isset($user->email)? $user->email : old("email"), ['id'=>'email', "class" => "form-control", "required" => ""]) !!}
    </div>
    <div class="form-group">
        <label for="telefon">Телефон</label>
    {!! Form::text('telefon', isset($user->telefon)? $user->telefon : old("telefon"), ['id'=>'telefon', "class" => "form-control", "required" => ""]) !!}
    </div>
        {{--// ПЕРЕДЕЛАТЬ!!--}}
    @if(isset($user))
        @if ($user->role->name == "admin")
            <div class="form-group">
                <label for="role">Роль</label>
                {!! Form::select('role', $inputs["roles"], isset($user->role) ? $user->role->id  : old('role'), ["class" => "form-control", "id" => "role"]) !!}
            </div>
        @endif
    @else
        <div class="form-group">
            <label for="role">Роль</label>
            {!! Form::select('role', $inputs["roles"], isset($user->role) ? $user->role->id  : old('role'), ["class" => "form-control", "id" => "role"]) !!}
        </div>
    @endif
    @if(isset($user))
        <input type="hidden" name="_method" value="PUT">
    @endif
    @if (isset($user))
            {!! Form::button('Сохранить', ['class' => 'btn btn-success','type'=>'submit']) !!}
    @else
            {!! Form::button('Добавить', ['class' => 'btn btn-success','type'=>'submit']) !!}
    @endif
    </div>
    {!! Form::close() !!}
</div>