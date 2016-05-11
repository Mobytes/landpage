@extends(Config::get('cpanel::views.layout'))

@section('header')
    <i class="fa fa-user"></i>
    Noticia
@stop

@section('css')
    {{ HTML::style('packages/mobytes/landpage/css/summernote/summernote.css') }}
    {{ HTML::style('packages/mobytes/landpage/css/summernote/summernote-bs3.css') }}
    {{ HTML::style('packages/mobytes/landpage/css/dropzone/basic.css') }}
    {{ HTML::style('packages/mobytes/landpage/css/dropzone/dropzone.css') }}
@overwrite

@section('js')
    {{ HTML::script('dropzone.min.js') }}
    {{ HTML::scridropzone.min.jss/mobytes/landpage/js/summernote/summernote.min.js') }}
    <script>
        $(document).ready(function () {

            var url_file = $("#image");
            var summernote = $('.summernote');

            Dropzone.autoDiscover = false;

            $("#dZUpload").dropzone({
                url: "update",
                addRemoveLinks: true,
                success: function (file, response) {
                    var imgName = response;
                    file.previewElement.classList.add("dz-success");
                    console.log("Successfully uploaded :" + imgName);
                    url_file.val(response.name);
                },
                error: function (file, response) {
                    file.previewElement.classList.add("dz-error");
                }
            });

            summernote.summernote();

        });
    </script>
@overwrite

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{Former::horizontal_open( route('landpage.noticias.store') )}}

                <div class="block-body">
                    <div class="col-md-8">
                            <div class="mail-box-header">
                                <div class="pull-right tooltip-demo">
                                    <a href="{{URL::previous()}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Descartar</a>
                                </div>
                                <h2>
                                    Crear Noticia
                                </h2>
                            </div>
                            <div class="mail-box">
                                <div class="mail-body">

                                    <form class="form-horizontal" method="get">
                                        <div class="form-group"><label class="col-sm-2 control-label">Título:</label>

                                            <div class="col-sm-10"><input type="text" class="form-control" name="titulo"></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 control-label">SubTítulo:</label>

                                            <div class="col-sm-10"><input type="text" class="form-control" name="subtitulo" value=""></div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 control-label">Tags:</label>

                                            <div class="col-sm-10"><input type="text" class="form-control" name="tag" value=""></div>
                                        </div>
                                    </form>

                                </div>

                                <div class="mail-text h-200">
                                    <div class="summernote" style="display: none;">
                                       </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mail-body text-right tooltip-demo">
                                    <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Guardar" type="submit"><i class="fa fa-floppy-o"></i> Guardar</button>
                                    <a href="{{URL::previous()}}" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Descartar noticia"><i class="fa fa-times"></i> Descartar</a>
                                </div>
                                <div class="clearfix"></div>



                            </div>
                    </div>

                    <div class="col-md-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Subir Imágenes</h5>

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="dZUpload" class="dropzone">
                                    <div class="dz-default dz-message"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            {{Former::close()}}
        </div>
    </div>
@stop
