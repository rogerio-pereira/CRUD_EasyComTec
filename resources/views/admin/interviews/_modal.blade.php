<div class="modal fade" id='interviewModal' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Interview</h5>
                
                {!! Form::button('<i class="fas fa-times-circle" aria-hidden="true"></i>', ['class' => 'btn btn-default', 'id' => 'closeModal', 'data-dismiss' => 'modal',  'aria-label' => 'Close']) !!}
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => 'admin.interviews.store']) !!}
                    {!! Form::hidden('candidate_id', null, ['id' => 'id']) !!}
        
                    @include('admin.interviews._form')

                    <div class='text-right'>
                        {!! Form::button('<i class="fas fa-times" aria-hidden="true"></i> Close', ['class' => 'btn btn-secondary', 'id' => 'closeModal', 'data-dismiss' => 'modal']) !!}
                        {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'save']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>