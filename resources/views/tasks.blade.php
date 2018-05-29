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
                    <button type="button" data-target="#task_create_modal" data-toggle="modal"
                            class="btn btn-primary btn-lg">{{trans('task.actions.create')}}</button>
                </div>
            </div>
            <div class="row " id="task_holder">
            </div>
        </div>
    </div>
</main>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@include('partials.task_edit')
@include('partials.task_create')
<script type="text/javascript">
    $(document).ready(function () {
        manageData();
    });


    /* manage data list */
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: '{{route('task.all')}}',
        }).done(function (data) {
            manageRow(data.data);
        });
    }


    /* Get Page Data*/
    function getPageData() {
        $.ajax({
            dataType: 'json',
            url: '{{route('task.all')}}',
        }).done(function (data) {
            if (data.success) {
                manageRow(data.data);
            }
        });
    }


    /* Add new Item table row */
    function manageRow(data) {
        var rows = '';
        $.each(data, function (key, value) {
            rows += '<div class="col-md-4">' +
                '<div class="card mb-4 box-shadow">' +
                '    <div class="card-body" data-id="' + value.id + '">' +
                '        <a href="#show"><h5 class="card-title">' + value.title + '</h5></a>' +
                '        <h6 class="card-subtitle mb-2 text-muted">' + value.status + '</h6>' +
                '        <p class="card-text">' + value.description + '</p>' +
                '        <button data-toggle="modal" data-target="#task_edit_modal" class="btn btn-primary  edit-item">{{trans('task.actions.update')}}</button>' +
                '        <button href="#delete" class="btn btn-primary remove-item">{{trans('task.actions.delete')}}</button>' +
                '    </div>' +
                '</div>' +
                '</div>';
        });

        $("#task_holder").html(rows);
    }

    $(".crud-submit").click(function (e) {
        e.preventDefault();
        var $create_modal = $("#task_create_modal");

        var title = $create_modal.find("input[name='title']").val();
        var description = $create_modal.find("textarea[name='description']").val();
        var status = $create_modal.find("select[name='status']").val();

        if (title !== '' && description !== '') {
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{route('task.store')}}',
                data: {
                    title: title,
                    description: description,
                    status: status,
                    _token: '{{csrf_token()}}'
                }
            }).done(function (data) {
                $create_modal.find("form").trigger('reset');
                getPageData();
                $(".modal").modal('hide');
            });
        } else {
            alert('You are missing title, description or status.')
        }
    });

    $("body").on("click", ".remove-item", function () {
        let id = $(this).parent().data('id');
        var task = $(this).parents("col-md-4");

        $.ajax({
            dataType: 'json',
            type: 'DELETE',
            url: '{{route('task.destroy',0)}}'.replace('0', id),
            data: {
                _token: '{{csrf_token()}}'
            }
        }).done(function (data) {
            if (data.success) {
                task.remove();
                getPageData();
            } else {
                alert(data.message);
            }
        });


    });

    $("body").on("click", ".edit-item", function () {
        var task = $(this).parent(".card-body");
        var $task_modal = $("#task_edit_modal");
        var id = task.data('id');
        var title = task.find('.card-title').text();
        var description = task.find('.card-text').text();
        var status = task.find('.card-subtitle').text();

        $task_modal.find(".edit-id").val(id);
        $task_modal.find("input[name='title']").val(title);
        $task_modal.find("select[name='status']").val(status);
        $task_modal.find("textarea[name='description']").val(description);
    });


    /* Updated new Item */
    $(".crud-submit-edit").click(function (e) {
        e.preventDefault();
        var $task_modal = $("#task_edit_modal");

        var title = $task_modal.find("input[name='title']").val();
        var status = $task_modal.find("select[name='status']").val();
        var description = $task_modal.find("textarea[name='description']").val();

        var id = $task_modal.find(".edit-id").val();

        if (title !== '' && description !== '' && status !== '') {
            $.ajax({
                dataType: 'json',
                type: 'PUT',
                url: '{{route('task.update',0)}}'.replace('0', id),
                data: {
                    title: title,
                    status: status,
                    description: description,
                    _token: '{{csrf_token()}}'
                }
            }).done(function (data) {
                if (data.success) {
                    $task_modal.find("form").trigger('reset');
                    getPageData();
                    $(".modal").modal('hide');
                } else {
                    alert(data.message);
                }
            });
        } else {
            alert('You are missing title or description.')
        }
    });
</script>
</body>
</html>