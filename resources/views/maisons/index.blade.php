@extends('layouts.app')

@section('content')
<script>
function deletePopup (el, maisonId) {
  swal({
      title: "Suppression",
      text: "Voulez vous vraiment supprimer cette maison d'hôte?!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d9534f",
      confirmButtonText: "Supprimer",
      closeOnConfirm: false
  },
  function(){
    //Ajax CALL...
    $.ajax({
          url: 'api/maison/' + maisonId,
          type: 'DELETE',
      })
      .done(function() {
          swal("Suppression", "Maison supprimée...", "success");
      })
      .fail(function() {
          swal("error");
      });
    //Remove the tr from Table
    el.closest("tr").remove();
  });
}
</script>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des maisons d'hôtes</div>
                <div class="panel-body table-responsive">
                    <div class="container-fluid" style="padding-bottom: 20px;">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-top: 10px">
                          <form id="search" role="search">
                            <div class="input-group">
                              <input type="search" class="form-control" placeholder="Recherche..." required>
                              <div class="input-group-btn">
                                <button style="border-left:0" class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-top: 10px">
                          <a href="{!! url('/new-house') !!}" class="btn btn-success pull-right">Ajouter une maison</a>
                        </div>
                      </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image principale</th>
                                <th>Nom Complet</th>
                                <th>Ville</th>
                                <th>Date de création</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($maisons as $maison)
                            <tr>
                                <th scope="row">{!! $maison->id !!}</th>
                                <td><img src="{!! $maison->main_picture !!}" width="150"></td>
                                <td>{!! $maison->name !!}</td>
                                <td>{!! $maison->ville->name !!}</td>
                                <td>{!! $maison->created_at !!}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ url('/houses/' . $maison->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ url('/houses/edit/' . $maison->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="deletePopup(this, {!!  $maison->id !!})"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
