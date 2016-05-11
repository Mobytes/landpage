@extends(Config::get('cpanel::views.layout'))

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Lista de Publicaciones</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Lista de Publicaciones</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Todas las Publicaciones creadas en cepco.org.pe</h5>
                        <div class="ibox-tools">
                            <a href="{{route('landpage.publicaciones.create')}}" class="btn btn-primary btn-xs">Crear nueva publicaci&oacute;n</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-b-sm m-t-sm">
                            <div class="col-md-1">
                                <a type="button" id="loading-example-btn" class="btn btn-white btn-sm" href="{{route('landpage.publicaciones')}}"><i class="fa fa-refresh"></i> Refresh</a>
                            </div>
                            <div class="col-md-11">
                                <form >
                                    <div class="input-group">
                                        <input type="text" name="search" autofocus placeholder="Search" class="input-sm form-control" value="{{Input::get("search")}}">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-sm btn-primary"> Buscar!</button>
                                        </span>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="project-list">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>T&iacute;tulo/Subt&iacute;tulo</th>
                                    <th>Contenido</th>
                                    <th>Etiquetas</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($publicaciones as $publicacion)
                                    <tr>
                                        <td class="project-title">
                                            <a href="project_detail.html">{{$publicacion->titulo}}</a>
                                            <br>
                                            <small>{{$publicacion->subtitulo}}</small>
                                        </td>
                                        <td class="issue-info">
                                            <small>
                                                {{ $publicacion->contenido }}
                                            </small>
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-white btn-xs"> Tag</button>
                                            <button class="btn btn-white btn-xs"> Mag</button>
                                            <button class="btn btn-white btn-xs"> Rag</button>
                                        </td>
                                        <td class="project-people">
                                            <a href=""><img alt="image" class="img-circle" src="{{url('assets/admin/img')}}/profile_small.jpg"></a>
                                            <a href=""><img alt="image" class="img-circle" src="{{url('assets/admin/img')}}/profile_small.jpg"></a>
                                            <a href=""><img alt="image" class="img-circle" src="{{url('assets/admin/img')}}/profile_small.jpg"></a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <i class="fa fa-cogs"></i>
                                                    <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('landpage.publicaciones.show', array($publicacion->id)) }}">
                                                            <i class="icon-info-sign"></i>&nbsp;Ver Noticia
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('landpage.publicaciones.edit', array($publicacion->id)) }}">
                                                            <i class="icon-edit"></i>&nbsp;Editar Noticia
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('landpage.publicaciones.destroy', array($publicacion->id)) }}"
                                                           data-method="delete"
                                                           data-modal-text="delete this User?">
                                                            <i class="icon-trash"></i>&nbsp;Borrar Noticia
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$publicaciones->appends(["search" => Input::get("search")])->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
