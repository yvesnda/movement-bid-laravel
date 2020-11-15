<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 15/11/2020
 * Time: 09:12
 */
?>
@extends('layouts.main')
@section('title',__('Create Offer'))
@section('body')
    @include('components.message')
    <form action="{{route('doRegister')}}" method="post">
        @csrf
        @include('components.input',['label'=>'Name','type'=>'text','value'=>'name'])
        @include('components.input',['label'=>'Email','type'=>'email','value'=>'email'])
        @include('components.input',['label'=>'Password','type'=>'password','value'=>'password'])
        @include('components.input',['label'=>'Re-Password','type'=>'password','value'=>'repassword'])
        @include('components.input',['label'=>'Telephone','type'=>'text','value'=>'telephone'])
        @include('components.input',['label'=>'Role','type'=>'select','value'=>'role','values'=>['client','transporter']])
        @include('components.input',['label'=>'Type','type'=>'select','value'=>'type','values'=>['local','region']])
        <div class="form-group">
            <button class="btn btn-primary">Register</button>
        </div>
    </form>
@endsection