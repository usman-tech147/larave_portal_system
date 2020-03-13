<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" id="department_modal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="department_form" data-toggle="validator">
                    @csrf {{ method_field('POST')}}
                    <div class="form-group">
                        <label for="School">Select School</label>
                        <select id="school_id" name="school_id" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Department Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Department Name">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hidden_id" id="hidden_id"/>
                        <button type="submit" id="action_btn" class="action btn btn-primary"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>