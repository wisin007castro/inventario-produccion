@extends('layouts.auth')

@section('content')

<body class="bodylogin">      
  <div class="container" > 
          
                <div class="col-sm-12 cabecera-login" >
                   <a class="mybtn-social pull-right" href="{{ url('/register') }}">
                       Register
                  </a>

                  <a class="mybtn-social pull-right" href="{{ url('/login') }}">
                       Login
                  </a>
               
                </div>
                
    <div class="row">
            <div class="col-sm-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Upss!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-sm-offset-3 col-sm-6">
                <!-- <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p> -->
                <form class="formlogin" action="{{ url('/login') }}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h1>Login</h1>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" value="{{old('email')}}" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                    
                  </div>
                  <br>
                  
                    <button type="submit" class="mybtn">{{ trans('adminlte_lang::message.buttonsign') }}
                    </button>
                </form>


            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->                

  </div>

    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>

@endsection





