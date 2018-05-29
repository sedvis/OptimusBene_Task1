<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{trans('task.title')}}</title>
</head>
<body>

<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>{{trans('task.title')}}</strong>
            </a>
        </div>
    </div>
</header>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3 right">
                    <button type="button" class="btn btn-primary btn-lg">{{trans('task.actions.create')}}</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">

                        @foreach($tasks as $task)
                            <div class="card mb-4 box-shadow">
                                <div class="card-body" data-id="{{$task->id}}">
                                    <a href="#show"><h5 class="card-title">{{$task->title}}</h5></a>
                                    <h6 class="card-subtitle mb-2 text-muted">{{trans('task.fields.statuses.'.$task->status)}}</h6>
                                    <p class="card-text">{{$task->description}}</p>
                                    <a href="#edit" class="card-link">{{trans('task.actions.update')}}</a>
                                    <a href="#delete" class="card-link">{{trans('task.actions.delete')}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
@include('partials.task_edit')
</body>
</html>