<h2>Добро пожаловать {{ Auth::user()->name }}</h2>
<br>
<a href="{{ route('admin.users.index') }}">Админка</a>
<br>
<a href="{{ route('logout') }}">Выйти</a>
