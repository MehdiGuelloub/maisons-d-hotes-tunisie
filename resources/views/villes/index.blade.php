@extends('layouts.app')

@section('content')
<script>
function deleteVille (el, villeId) {
  swal({
      title: "Suppression",
      text: "Voulez vous vraiment supprimer cette ville?!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d9534f",
      confirmButtonText: "Supprimer",
      closeOnConfirm: false
  },
  function(){
    //Ajax CALL...
    $.ajax({
          url: 'api/ville/' + villeId,
          type: 'DELETE',
      })
      .done(function() {
          swal("Suppression", "Ville supprimée...", "success");
      })
      .fail(function() {
          swal("error");
      });
    //Remove the tr from Table
    el.closest("tr").remove();
  });
}
</script>
<style>
  .fa {
    margin-right: 10px;
  }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom de la ville</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($villes as $ville)
                            <tr>
                                <th scope="row">{!! $ville->id !!}</th>
                                <td>{!! $ville->name !!}</td>
                                <!-- <td>
                                  <a class="btn btn-sm btn-block btn-primary" href=""><i class="fa fa-pencil" aria-hidden="true"></i> Modifier</a>
                                </td> -->
                                <td>
                                  <a class="btn btn-sm btn-block btn-danger" href="javascript:void(0)" onclick="deleteVille(this, {!!  $ville->id !!})"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                              <form method="POST">
                                {{ csrf_field() }}
                                <td colspan="2"><input type="text" class="form-control" name="name" required></td>
                                <td>
                                  <button class="btn btn-sm btn-block btn-success" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une ville</button>
                                </td>
                              </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
