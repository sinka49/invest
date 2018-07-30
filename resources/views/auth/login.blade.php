@extends('admin.adminWrap')

@section('content')
<div class="container">
    <div class="row">

                   <form class="addNewsForm" style="display: block;width: 40%;max-width: 320px;margin: 0 auto;" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                       <h3 style="color: gray;text-align: center;font-weight: normal;">Вход в панель администратора</h3>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                <div class="addNewsForm__group">
                                    <input id="email" type="email"  name="email" value="{{ old('email') }}" required >
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>


                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="addNewsForm__group">
                                <input id="password" type="password"  name="password" required >
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Password</label>
                            </div>


                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="customFile" style="outline: none; border: none; color: #fff; width: 87px">
                                    Войти
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
