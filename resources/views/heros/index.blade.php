@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des Héros</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Race</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Pouvoir</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($heros as $hero)
                                <tr>
                                    <td>{{$hero->id}}</td>
                                    <td>{{$hero->name}}</td>
                                    <td>{{$hero->gender}}</td>
                                    <td>{{$hero->race}}</td>
                                    <td>{{$hero->description}}</td>
                                    <td>{{--{{$hero->skills->name}}--}}</td>
                                    {{--@dump($hero->skills[0])--}}
                                    {{--SELECT * FROM `heroes`INNER JOIN hero_skills ON heroes.id=hero_skills.hero_id INNER JOIN skills ON skills.id=hero_skills.skills_id;--}}
                                    <td>
                                        <a href="{{ route('heros.edit', $hero->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('heros.destroy', $hero->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection