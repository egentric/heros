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
                        <form method="post" action="{{ route('heros.update', $hero->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="name" class="form-control" value="{{
$hero->name }}">
                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label>Race</label>
                                        <input type="text" name="race" class="form-control" value="{{
$hero->race }}">
                                    </div>
                                </div>

                                <div class="col-sm-4">

                                    <fieldset>
                                        <label>Genre:</label>

                                        <div>                                            
                                            <input type="radio" id="masculin" name="gender" value="masculin" {{ $hero->gender == 'masculin' ? 'checked' : '' }}>
                                            <label for="masculin">Masculin</label>
                                        </div>

                                        <div>
                                           <input type="radio" id="feminin" name="gender" value="feminin" {{ $hero->gender == 'feminin' ? 'checked' : '' }}>
                                            <label for="feminin">Féminin</label>
                                        </div>

                                        <div>
                                        <input type="radio" id="autre" name="gender" value="autre" {{ $hero->gender == 'autre' ? 'checked' : '' }}>
                                            <label for="autre">Autre</label>
                                        </div>

                                        {{--<div>
                                            @if ($hero->gender == 'masculin')
                                            <input type="radio" id="masculin" name="gender" value="masculin" checked>
                                            @else
                                            <input type="radio" id="masculin" name="gender" value="masculin">
                                            @endif
                                            <label for="masculin">Masculin</label>
                                        </div>

                                        <div>
                                            @if ($hero->gender == 'feminin')
                                            <input type="radio" id="feminin" name="gender" value="feminin" checked>
                                            @else
                                            <input type="radio" id="feminin" name="gender" value="feminin">
                                            @endif
                                            <label for="feminin">Féminin</label>
                                        </div>

                                        <div>
                                            @if ($hero->gender == 'autre')
                                            <input type="radio" id="trans" name="gender" value="autre" checked>
                                            @else
                                            <input type="radio" id="trans" name="gender" value="autre">
                                            @endif
                                            <label for="autre">Autre</label>
                                        </div>--}}
                                    </fieldset>
                                </div>
                                <div class="col-sm-4">
                                        <fieldset>
                                        <label>Pouvoir</label>
                                        @foreach ($skills as $skill)
                                        <div>
                                          <input type="checkbox" id="skill_name" name="skills[]" value="{{ $skill->id }}"  {{ $skill->id == $skill->id ? 'checked' : '' }}>
                                          <label for="{{ $skill->name }}">{{ $skill->name }}</label>
                                        </div>
                                    @endforeach
                                    </fieldset>

                                </div>

                            </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="{{
$hero->description }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill
shadow-sm">Mettre à jour</button>
            </form>
            <!-- Fin du formulaire -->
        </div>
    </div>
</div>

@endsection