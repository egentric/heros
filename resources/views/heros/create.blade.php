@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un Héro</h3>

                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('heros.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group mb-4">
                                        <label>Race</label>
                                        <input type="text" name="race" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <fieldset>
                                        <label>Genre:</label>

                                        <div>
                                            <input type="radio" id="masculin" name="gender" value="masculin" checked>
                                            <label for="huey">Masculin</label>
                                        </div>

                                        <div>
                                            <input type="radio" id="feminin" name="gender" value="feminin">
                                            <label for="dewey">Féminin</label>
                                        </div>

                                        <div>
                                            <input type="radio" id="autre" name="gender" value="autre">
                                            <label for="louie">Autre</label>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                        Ajouter un Héro </button>
                    </form>
                    <!-- Fin du formulaire -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection