@extends('frontend.layout')

@section('content')
    <!-- =====  CONTAINER START  ===== -->
    <div class="container">
        <div class="row ">
            <!-- =====  BANNER START  ===== -->
            <div class="col-sm-12">
                <div class="breadcrumb ptb_20">
                    <h1>Modifica Profilo</h1>
                    <ul>
                        <li><a href="{{route('Profile')}}">Il Mio Profilo</a></li>
                        <li class="active">Modifica Profilo</li>
                    </ul>
                </div>
            </div>

            <div class="panel-body col-lg-12 mtb_20">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="login-form" action="{{route('user.loginpost')}}" method="post">
                        @csrf
                            <div class="content">
                                <h1 class="header">Modifica Dati Personali
                                </h1>

                                <div class="table">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td class="form-group">Nome<input type="text" name="name" id="username1" tabindex="1" placeholder="Nome" value="" disabled>
                                             <button>Modifica</button>
                                        </td>

                                        <td class="form-group">Cognome<input type="text" name="surname" id="sur" tabindex="2"  placeholder="Cognome" value="" disabled>
                                            <button>Modifica</button>
                                        </td>

                                        <td class="form-group">Numero di Cellulare<input type="text" name="number" id="sur" tabindex="3"  placeholder="333255448" value="" disabled>
                                            <button>Modifica</button>
                                        </td>

                                        <td class="form-group">Email<input type="email" name="email" id="email" tabindex="4"  placeholder="Email@ii.it" value="" disabled>
                                        </td>

                                        <td class="form-group">Password<input type="password" name="password" id="password" tabindex="5"  placeholder="Password">
                                            <button>Modifica</button>
                                        </td>
                                    </tr>
                                     </thead>
                                </table>
                                    <form action="{{route('Profile')}}">
                                        <input class="btn pull-right mt_50" type="submit" value="Salva"/>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection