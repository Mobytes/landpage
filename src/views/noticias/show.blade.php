@extends(Config::get('cpanel::views.layout'))

@section('header')
    <i class="fa fa-user"></i>
    Noticias
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="block">
                <p class="block-heading">{{ $noticia->titulo }}</p>

                <div class="block-body">

                    <div class="btn-toolbar">
                        <a href="{{ route('cpanel.users.index') }}" class="btn btn-primary" rel="tooltip" title="Back">
                            <i class="icon-arrow-left"></i>
                            Back
                        </a>
                    </div>

                    <div class="tabbable">

                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a href="#info" data-toggle="tab">User Info</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="info">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td><strong>Titulo</strong></td>
                                        <td>{{ $noticia->titulo }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Subtitulo</strong></td>
                                        <td>{{ $noticia->subtitulo }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contenido</strong></td>
                                        <td>{{ $noticia->contenido }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@stop
