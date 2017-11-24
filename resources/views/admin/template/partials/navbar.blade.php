<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{route('home')}}" tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover"  data-trigger="focus"  data-content="And here's some amazing content. It's very engaging. Right?" ><i class="fa fa-home fa-2x" aria-hidden="true"></i> Inicio</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.index')}}" data-toggle="tooltip" data-placement="bottom" title="Usuarios que manejan el sistema"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>Usuarios<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{route('customer.index')}}" data-toggle="tooltip" data-placement="bottom" title="Consumidores del agua potable"><i class="fa fa-users fa-2x" aria-hidden="true"></i> Consumidores<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link active" href="{{route('period.index')}}" data-toggle="tooltip" data-placement="bottom" title="Lecturas del agua potable"><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i> Periodos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" diseable>
        <a class="nav-link active diseable " href="{{route('reading.create')}}" data-toggle="tooltip" data-placement="bottom" title="Lecturas del agua potable" ><i class="fa fa-book fa-2x" aria-hidden="true"></i> Lecturas<span class="sr-only">(current)</span></a>
      </li>
       <li style="margin-right: 50px" class="nav-item dropdown navbar-toggler-right " data-toggle="tooltip" data-placement="left" title="{{ Auth::user()->name }} ">
        <a class="nav-link dropdown-toggle active" href="http://example.com" id="navbarDropdownMenuLink"  data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
           <i class="fa fa-user-secret fa-2x" aria-hidden="true"></i><span class="badge  badge-success"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something </a>
        </div>
      </li>
    </ul>
  </div>
