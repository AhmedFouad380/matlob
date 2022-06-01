<form method="post" action="{{url('updateReportStates')}}">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <input type="hidden" name="type" value="{{$value}}">
    @if($value == 'pending')
        <div class="form-group">
            <label>معاد الانترفيو</label>
            <input name="interview_date" class="form-control" type="datetime-local" >
        </div>
        @elseif($value == 'rejected')

        <div class="form-group">
            <label>سبب الرفض</label>
            <select name="reason"  class="form-control">
                @foreach(\App\Models\CancelReason::where('is_active','active')->get() as $reason)
                    <option value="{{$reason->reason}}">{{$reason->reason}}</option>
                @endforeach
            </select>
        </div>
    @elseif($value == 'hold')

        <div class="form-group">
            <label>سبب التعليق</label>
            <select name="reason"  class="form-control">
                @foreach(\App\Models\HoldReason::where('is_active','active')->get() as $reason)
                    <option value="{{$reason->reason}}">{{$reason->reason}}</option>
                @endforeach
            </select>
        </div>
    @elseif($value == 'block')

        <div class="form-group">
            <label>سبب الحظر</label>
            <select name="reason"  class="form-control">
                @foreach(\App\Models\BlockReason::where('is_active','active')->get() as $reason)
                    <option value="{{$reason->reason}}">{{$reason->reason}}</option>
                @endforeach
            </select>
        </div>

    @elseif($value == 'repeat')

        <div class="form-group">
            <label>سبب التكرار</label>
            <select name="reason"  class="form-control">
                @foreach(\App\Models\RepeatReason::where('is_active','active')->get() as $reason)
                    <option value="{{$reason->reason}}">{{$reason->reason}}</option>
                @endforeach
            </select>
        </div>
        @endif
    <div class="form-group">
        <label>الملاحظات</label>
        <textarea name="interview_description"  class="form-control" rows="4"></textarea>
    </div>

</form>

