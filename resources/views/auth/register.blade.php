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
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                
                  <div class="col-md-12" >
                    @if (count($errors) > 0)
                     
                        <div class="alert alert-danger">
                            <strong>UPPS!</strong> Error al Registrar<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    
                    @endif
                   </div  >

                    <div class="myform-bottom">
                      
                      <form class="formlogin" role="form" action="{{ url('/register') }}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          <label for="">Nombre</label>
                          <input type="text" name="name" placeholder="Nombres..." class="form-control" value="{{ old('name') }}" >
                        </div>
                     
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" placeholder="Email..." class="form-control"  
                            value="{{ old('email') }}" />
                        </div>



                        <div class="form-group">
                          <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password..." class="form-control" >
                        </div>


                         <div class="form-group">
                          <label for="">Password</label>
                        <input type="password" name="password_confirmation" placeholder="Password..." class="form-control" >
                        </div>
                        <label for=""></label>
                        <button type="submit" class="mybtn">Registrarme</button>
                      </form>
                    
                    </div>
              </div>
            </div>
  </div>
 
</body>
@endsection


