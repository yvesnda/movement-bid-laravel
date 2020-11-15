<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 15/11/2020
 * Time: 11:17
 */
?>
@extends('layouts.main')
@section('title',__('Create Offer'))
@section('body')
    <table class="table table-striped">
        <tbody>
        <tr><td>Required_date</td><td>{{$offer->required_date}}</td>
        <tr><td>Type</td><td>{{$offer->type}}</td>
        <tr><td>Location</td><td>{{$offer->location}}</td>
        <tr><td>Destination</td><td>{{$offer->destination}}</td>
        <tr><td>Measure</td><td>{{$offer->measure}}</td>
        <tr><td>Mass</td><td>{{$offer->mass}}</td>
        <tr><td>Description</td><td>{{$offer->description}}</td>
        </tbody>

    </table>
    <form action="{{route('doOfferConfirm')}}" method="post">
        @csrf
        <button class="btn btn-primary">Place Offer</button>
    </form>
@endsection
