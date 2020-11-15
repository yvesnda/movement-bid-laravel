<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 15/11/2020
 * Time: 10:12
 */
?>
<div class="form-group @error($value) has-error @enderror">
    <label for="{{$value}}" class="control-label col-md-2">{{$label}}</label>
    <div class="col-md-10">
        @if($type=='select')
            <select name="{{$value}}" class="form-control">
                @foreach($values as $val)
                    <option value="{{$val}}">{{__($val)}}</option>
                @endforeach
            </select>
        @else
        <input type="{{$type}}" name="{{$value}}" value="{{old($value)}}" class="form-control">
        @endif
        @error($value)
        @foreach ($errors->get($value) as $message)
            <span class="help-block">{{$message}}</span>
        @endforeach
        @enderror
    </div>
</div>
