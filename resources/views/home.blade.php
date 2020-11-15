<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 15/11/2020
 * Time: 10:15
 */
?>
@extends('layouts.main')
@section('title',__('Home'))
@section('body')
    @include('components.message')
    <form action="{{route('doHome')}}" method="post">
        @csrf
        @include('components.input',['label'=>'Type','type'=>'select','value'=>'type','values'=>['region','local']])
        @include('components.input',['label'=>'Required_date','type'=>'date','value'=>'required_date'])
        @include('components.input',['label'=>'Location','type'=>'text','value'=>'location'])
        @include('components.input',['label'=>'Destination','type'=>'text','value'=>'destination'])
        @include('components.input',['label'=>'Measure','type'=>'text','value'=>'measure'])
        @include('components.input',['label'=>'Mass','type'=>'text','value'=>'mass'])
        @include('components.input',['label'=>'Description','type'=>'text','value'=>'description'])
        <div class="form-group">
            <button class="btn btn-primary">Start</button>
        </div>
    </form>
@endsection
