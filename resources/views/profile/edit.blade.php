<x-app-layout>
    <x-slot name="title">
        Профиль администратора
    </x-slot>

    @if (session('status') === 'password-updated')
        <div class="alert alert-success">
            <p>Сохраните пароль</p>
        </div>
    @elseif(session('status') === 'profile-updated')
        <div class="alert alert-success">
            <p>Сохранить профиль</p>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link active"><i
                            class="icon-note"></i> <span class="hidden-xs">Редактировать</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit_password" data-toggle="pill" class="nav-link"><i
                            class="icon-note"></i> <span class="hidden-xs">Изменить пароль</span></a>
                </li>
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active" id="edit">
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Имя</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Электронная почта</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email"
                                    value="{{ old('email', $user->email) }}" required autocomplete="username">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Oтмена">
                                <input type="submit" class="btn btn-primary" value="Сохранить изменения">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="edit_password">
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Текущий пароль</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="current_password"
                                    autocomplete="current-password">
                            </div>
                            @error('current_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Новый пароль</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password" autocomplete="new-password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Подтвердите пароль</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password_confirmation"
                                    autocomplete="new-password">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Oтмена">
                                <input type="submit" class="btn btn-primary" value="Сохранить изменения">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
