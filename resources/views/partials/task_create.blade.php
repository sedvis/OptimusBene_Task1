<div class="modal" tabindex="-1" role="dialog" id="task_create_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{trans('task.actions.create')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="task_form" action="{{route('task.store')}}" method="post">
                    <input type="hidden" name="id" class="edit-id">
                    <div class="form-group">
                        <label>{{trans('task.fields.title')}}</label>
                        <input type="text" class="form-control" name="title" placeholder="{{trans('task.fields.title')}}"
                               required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label>{{trans('task.fields.status')}}</label>
                        <select class="form-control" name="status" required>
                            @foreach(\App\Task::$statuses as $key=>$status)
                                <option value="{{$key}}">{{trans('task.fields.statuses.'.$key)}}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label>{{trans('task.fields.description')}}</label>
                        <textarea class="form-control" name="description"
                                  placeholder="{{trans('task.fields.description')}}" rows="3"
                                  required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary crud-submit">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>