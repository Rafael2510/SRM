@if (session('success') || session('error'))
    <div class="row my-3">
        <div class="col-sm-12">
            <div class="alert alert-{{(session('success') ? 'success' : 'danger')}}">
                @if(isset($icon) && $icon))
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="{{ $iconClass ?? 'tim-icons icon-simple-remove' }}"></i>
                    </button>
                @endif
                <span>{{(session('success') ? session('success') : session('error'))}}</span>
            </div>
        </div>
    </div>
@elseif(isset($messages['success']) && $messages['success'] || isset($messages['error']) && $messages['error'])
    <div class="row my-3">
        <div class="col-sm-12">
            <div class="alert alert-{{($messages['success'] ? 'success' : 'danger')}}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
                <span>{{($messages['success'] ? $messages['success'] : $messages['error'])}}</span>
            </div>
        </div>
    </div>
@endif