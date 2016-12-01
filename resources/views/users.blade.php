@extends('layouts.app')

@section('content')
<script>
    function activate_user (userId) {
        $.ajax({
            url: 'api/activate_user/' + userId,
            type: 'POST',
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Gestion des utilisateurs</div>
                <div class="panel-body table-responsive">
                    <div class="container-fluid" style="padding-bottom: 20px;">
                          <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-top: 10px">
                              <form id="search" role="search">
                                <div class="input-group">
                                  <input type="search" class="form-control" placeholder="Recherche..." required>
                                  <div class="input-group-btn">
                                    <button style="border-left:0" class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th></th>
                                <th>Nom Complet</th>
                                <th>Email</th>
                                <th>Statut</th>
                                <th>Date d'inscription</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mobile_users as $mobile_user)
                            <tr>
                                <th scope="row">{!! $mobile_user->id !!}</th>
                                <td><img src="{!! asset('images/default-user.png') !!}" width="30"></td>
                                <td>{!! $mobile_user->name !!}</td>
                                <td>{!! $mobile_user->email !!}</td>
                                <td><input type="checkbox" {!! $mobile_user->activated ? "checked" : ""!!} data-toggle="toggle" data-on="Activé" data-off="Désactivé" data-onstyle="success" data-offstyle="danger" data-size="small" onchange="activate_user({!! $mobile_user->id !!})"></td>
                                <td>{!! $mobile_user->created_at !!}</td>
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
