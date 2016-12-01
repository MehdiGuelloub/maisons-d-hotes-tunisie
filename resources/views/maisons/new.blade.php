@extends('layouts.app')

@section('content')
<script>
Dropzone.options.myDropzone = {
    url: 'api/new-house',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 10,
    maxFiles: 10,
    maxFilesize: 2,
    acceptedFiles: 'image/*',
    dictDefaultMessage: "Ajouter vos images ici...",
    addRemoveLinks: true,    
    dictRemoveFile: 'Supprimer',
    init: function() {
        dzClosure = this;
        document.getElementById("submit-all").addEventListener("click", function(e) {
            if(dzClosure.files.length > 0) {
              e.preventDefault();
              e.stopPropagation();
              dzClosure.processQueue();
            }
        });
        this.on("sendingmultiple", function(data, xhr, formData) {
          formData.append("img", $('input[type=file]')[0].files[0]);
          formData.append("name", $("#name").val());
          formData.append("main_picture", $("#main_picture").val());
          formData.append("ville_id", $("#ville_id").val());
          formData.append("presentation", $("#presentation").val());
          formData.append("services", $("#services").val());
          formData.append("contact", $("#contact").val());
          formData.append("longitude", $("#longitude").val());
          formData.append("latitude", $("#latitude").val());
        });
        this.on("successmultiple", function(files, response) {
          swal({
                title: "Succès!",
                text: "La nouvelle maison est enregistrée!",
                type: "success",
                closeOnConfirm: true
              },
              function(){
                $(location).attr('href', '/houses');
              });
        });
        this.on("errormultiple", function(files, response) {
          alert("Une Erreur s'est produite !!");
        });
    }
}
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter une nouvelle maison</div>

                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-md-3" for="name">Nom de la maison</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control" name="name" id="name">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" for="img">Image principale</label>
                      <div class="col-md-9">
                        <input type="file" class="form-control" name="img" id="img">
                        <input type="hidden" name="folder" id="folder">
                        <input type="hidden" name="main_picture" id="main_picture">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" for="ville">Ville</label>
                      <div class="col-md-9">
                        <select class="form-control" name="ville_id" id="ville_id">
                          <option selected disabled value="0">Choisir une ville</option>
                          @foreach($villes as $ville)
                          <option value="{!! $ville->id !!}">{!! $ville->name !!}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" for="presentation">Présentation:</label>
                      <div class="col-md-9"><textarea class="form-control" rows="5" name="presentation" id="presentation"></textarea></div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" for="services">Services:</label>
                      <div class="col-md-9"><textarea class="form-control" rows="5" name="services" id="services"></textarea></div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" for="contact">Contact:</label>
                      <div class="col-md-9"><textarea class="form-control" rows="5" name="contact" id="contact"></textarea></div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" for="map">Position:</label>
                      <div class="col-md-9"><br> MAP</div>
                      <input type="hidden" value="xxx" name="longitude" id="longitude"/>
                      <input type="hidden" value="xxx" name="latitude" id="latitude"/>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3" for="contact">Gallrie des photos:</label>
                      <div class="col-md-9"><div class="dropzone" id="myDropzone"></div></div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                        <button class=" pull-right btn btn-success" type="submit" id="submit-all"> Valider </button>
                      </div>
                    </div>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
