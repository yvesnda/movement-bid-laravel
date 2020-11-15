<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 15/11/2020
 * Time: 09:12
 */
?>
@extends('layouts.main')
@section('title',__('Login'))
@section('body')
    @include('components.message')
    <form action="{{route('doLogin')}}" method="post">
        @csrf
        @include('components.input',['label'=>'Email','type'=>'email','value'=>'email'])
        @include('components.input',['label'=>'Password','type'=>'password','value'=>'password'])
        <div class="form-group">
            <button class="btn btn-primary">Login</button>
        </div>
    </form>
@endsection