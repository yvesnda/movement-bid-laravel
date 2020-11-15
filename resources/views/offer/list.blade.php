<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 15/11/2020
 * Time: 09:14
 */
?>
@extends('layouts.main')
@section('title',__('Create Offer'))
@section('body')
    <div class="col-12">
        @foreach($offers as $offer)
            <div class="col-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Type: {{$offer->type}}</div>
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                <tr><td>Required Date</td><td>{{$offer->required_date}}</td>
                <tr><td>Location</td><td>{{$offer->location}}</td>
                <tr><td>Destination</td><td>{{$offer->destination}}</td>
                <tr><td>Measure</td><td>{{$offer->measure}}</td>
                <tr><td>Mass</td><td>{{$offer->mass}}</td>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a href="{{route('offers.show',['offer'=>$offer->id])}}" class="btn btn-primary">View</a>
        </div>
    </div>
            </div>
        @endforeach
    </div>
@endsection